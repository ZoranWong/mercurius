<?php /** @noinspection ALL */

namespace App\Models;

use App\Models\Traits\QueryTrait;
use App\Traits\AttributesAccessTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as ContractAuthenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as ContractAuthorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name 用户名
 * @property string $mobile 注册手机
 * @property string $email 注册邮箱
 * @property string|null $emailVerifiedAt 邮箱认证时间
 * @property string|null $nickname 昵称
 * @property array|null $region 区域
 * @property string $sex 性别
 * @property int $vip vip等级
 * @property string $password 密码
 * @property string|null $rememberToken
 * @property \Illuminate\Support\Carbon|null $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @property string|null $deletedAt
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User multiUpdate($items, $whereField = 'id')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User role($roles)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereContains($column, $value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereVip($value)
 * @mixin \Eloquent
 */
class User extends Model implements ContractAuthenticatable, ContractAuthorizable, Transformable
{
    use TransformableTrait, Authenticatable, Authorizable, QueryTrait, AttributesAccessTrait, HasRoles;

    protected $casts = [
        'region' => 'json'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'password', 'mobile', 'email', 'nickname', 'email_verified_at', 'sex', 'vip', 'region'
    ];

}
