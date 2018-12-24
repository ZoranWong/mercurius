<?php
/**
 * Created by PhpStorm.
 * User: wangzaron
 * Date: 2018/12/12
 * Time: 11:39 AM
 */

namespace App\Utils;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

/**
 * 使用 snowflake 算法生成递增的分布式唯一ID.
 * 该算法支持 15 条业务线，4 个数据中心，每个数据中心最多 128 台机器，每台机器每毫秒可生成 4096 个不重复ID.
 */
class SnowFlake
{
    const SEQUENCE_BITS         = 12;
    const MILLISECOND_BITS      = 39;
    const BUSINESS_ID_BITS      = 4;
    const DATA_CENTER_ID_BITS   = 2;
    const MACHINE_ID_BITS       = 7;
    const TWEPOCH                = 1544594590000;
    /**
     * @var int 7bit 毫秒内序列号
     */
    protected $sequence;
    /**
     * @var int 39bit 毫秒数,最后一次生成的时间戳
     */
    protected $lastTimeStamp;
    /**
     * @var int 4bit 业务线标识
     */
    protected $businessId;
    /**
     * @var int 2bit 机房标识,仅支持4个数据中心
     */
    protected $dataCenterId;
    /**
     * @var int 7bit 机器标识，
     */
    protected $machineId;

    /**
     * Snowflake constructor.
     * @param int $businessId 业务线标识，必须大于0小于等于15
     * @param int $dataCenterId 数据中心标识，必须大于0小于等于4
     * @param int $machineId 机器标识，必须大于0小于等于128
     * @throws \Exception
     */
    public function __construct(int $businessId, int $dataCenterId, int $machineId)
    {
        if($businessId <= 0 || $businessId > $this->maxBusinessId()){
            throw new \Exception('Business Id can\'t be greater than 15 or less than 0');
        }
        if($dataCenterId <=0 || $dataCenterId > $this->maxDataCenterId()){
            throw new \Exception('DataCenter Id can\'t be greater than 4 or less than 0');
        }
        if($machineId <= 0 || $machineId > $this->maxMachineId()){
            throw new \Exception('Machine Id can\'t be greater than 128 or less than 0');
        }
        mt_srand($this->getTimestamp());
        $this->sequence = mt_rand(0, $this->maxSequence());
        if($this->sequence <= 0 || $this->sequence > $this->maxSequence()){
            throw new \Exception('Sequence can\'t be greater than 4096 or less than 0');
        }
        $this->businessId = $businessId;
        $this->dataCenterId = $dataCenterId;
        $this->machineId = $machineId;
    }

    /**
     * @return float 获取当前毫秒数
     */
    public function getTimestamp()
    {
        return floatval(microtime(true) * 1000);
    }

    protected function nextMillisecond($lastTimestamp)
    {
        $timestamp = $this->getTimestamp();
        while ($timestamp <= $lastTimestamp) {
            $timestamp = $this->getTimestamp();
        }
        return $timestamp;
    }

    private function maxMachineId()
    {
        return -1 ^ (-1 << self::MACHINE_ID_BITS);
    }

    private function maxDataCenterId()
    {
        return -1 ^ (-1 << self::DATA_CENTER_ID_BITS);
    }
    private function maxBusinessId()
    {
        return -1 ^ (-1 << self::BUSINESS_ID_BITS);
    }
    private function maxSequence()
    {
        return -1 ^ (-1 << self::SEQUENCE_BITS);
    }
    private function mintId64($timestamp, $businessId, $dataCenterId, $machineId, $sequence)
    {
        return (string)$timestamp | $businessId |  $dataCenterId | $machineId | $sequence;
    }

    private function timestampLeftShift()
    {
        return self::SEQUENCE_BITS + self::MACHINE_ID_BITS + self::DATA_CENTER_ID_BITS + self::BUSINESS_ID_BITS;
    }
    private function businessIdLeftShift()
    {
        return self::SEQUENCE_BITS + self::MACHINE_ID_BITS + self::DATA_CENTER_ID_BITS ;
    }

    private function dataCenterIdShift()
    {
        return self::SEQUENCE_BITS + self::MACHINE_ID_BITS;
    }
    private function machineIdShift()
    {
        return self::SEQUENCE_BITS;
    }
    protected function nextSequence()
    {
        return $this->sequence++;
    }

    public function getLastTimestamp()
    {
        return $this->lastTimeStamp;
    }
    public function getDataCenterId()
    {
        return $this->dataCenterId;
    }

    public function getMachineId()
    {
        return $this->machineId;
    }
    public function getBusinessId()
    {
        return $this->businessId;
    }

    public function getNextId()
    {
        $timestamp = $this->getTimestamp();
        if ($timestamp < $this->lastTimeStamp) {
            throw new InvalidSystemClockException(sprintf("Clock moved backwards. Refusing to generate id for %d milliseconds", ($this->lastTimestamp - $timestamp)));
        }
        if ($timestamp == $this->lastTimeStamp) {
            $this->lastTimeStamp = $this->nextMillisecond($this->lastTimeStamp);
        } else {
            $this->lastTimeStamp = $timestamp;
        }
        $sequence = $this->nextSequence();
        $t = floor($timestamp - self::TWEPOCH) << $this->timestampLeftShift();
        $b = $this->getBusinessId() << $this->businessIdLeftShift();
        $dc = $this->getDataCenterId() << $this->dataCenterIdShift();
        $worker = $this->getMachineId() << $this->machineIdShift();
        $uuid = $this->mintId64($t, $b, $dc, $worker, $sequence);
        return $uuid;
    }

    public function timestamp(int $uuid)
    {
        return $uuid >> $this->timestampLeftShift() + self::TWEPOCH;
    }

    public function date(int $uuid)
    {
        return Carbon::createFromTimestamp($this->timestamp($uuid) / 1000);
    }
}
