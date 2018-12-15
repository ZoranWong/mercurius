<?php /** @noinspection ALL */

namespace App\Models;

use App\Models\Traits\QueryTrait;
use App\Traits\AttributesAccessTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as ContractAuthenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as ContractAuthorizable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * App\Models\StoreUser
 *
 * @property int $id
 * @property int $storeId 店铺ID
 * @property string $name 用户名
 * @property string $mobile 注册手机
 * @property string $email 注册邮箱
 * @property string|null $emailVerifiedAt 邮箱认证时间
 * @property string|null $nickname 昵称
 * @property mixed|null $region 区域
 * @property string $sex 性别
 * @property int $vip vip等级
 * @property string $password 密码
 * @property string|null $rememberToken
 * @property \Illuminate\Support\Carbon|null $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @property string|null $deletedAt
 * @property-read \App\Models\Store $store
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser multiUpdate($items, $whereField = 'id')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser whereContains($column, $value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StoreUser whereVip($value)
 * @mixin \Eloquent
 */
class StoreUser extends Model implements ContractAuthorizable, ContractAuthenticatable, Transformable
{
    use TransformableTrait, Authorizable, Authenticatable, AttributesAccessTrait, QueryTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'store_id', 'name', 'mobile', 'nickname', 'region', 'sex', 'vip'
    ];

    public function store():BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

}
