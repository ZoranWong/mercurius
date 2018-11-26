<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2018/11/24
 * Time: 下午1:16
 */

namespace App\Models\Traits;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

trait QueryTrait
{
    /**
     * @param Builder $query
     * @param string $column
     * @param mixed $value
     * @return Builder
     * */
    public function scopeWhereContains($query, $column, $value) {
        if (is_array($value) || is_object($value)) {
            $value = json_encode($value);
        }
        return $query->whereRaw("JSON_CONTAINS({$column}, {$value})");
    }

    /**
     * 批量更新
     * @param Builder $query
     * @param array|Collection $items
     * @param string $whereField
     * @return int
     * */
    public function scopeMultiUpdate($query, $items, $whereField = 'id')
    {
        if (!($items instanceof Collection)) {
            $items = Collection::make($items);
        }
        $sql = [];
        $count = $items->count();
        $whereValues = [];
        $sqlStr = [];
        $items->map(function ($item, $index) use(&$sql, $whereField, $count, &$whereValues, &$sqlStr){
            $whereValue = $item[$whereField];
            array_push($whereValues, $whereValue);
            foreach ($item as $key => $value) {
                if(isset($sql[$key])) {
                    $sql[$key] = "SET {$key} = (CASE {$whereField} \n";
                }
                $sql[$key] .= "WHEN {$whereValue} THEN {$value} \n";

                if ($index + 1 === $count) {
                    $sql[$key] .= " END)";
                    array_push($sqlStr, DB::raw($sql[$key]));
                }
            }
        });
        return $query->whereIn($whereField, $whereValues)->update($sqlStr);
    }
}