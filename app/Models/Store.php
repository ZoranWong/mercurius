<?php /** @noinspection ALL */

namespace App\Models;

use App\Models\Traits\QueryTrait;
use App\Traits\AttributesAccessTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * App\Models\Store
 *
 * @property int $id
 * @property string $name 店铺名称
 * @property int $isChainStore 是否连锁店铺
 * @property string $type 店铺类型
 * @property \Illuminate\Support\Carbon|null $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @property string|null $deletedAt
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StoreUser[] $storeUsers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store multiUpdate($items, $whereField = 'id')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereContains($column, $value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereIsChainStore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Store extends Model implements Transformable
{
    use TransformableTrait, AttributesAccessTrait, QueryTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'is_chain_store', 'type'
    ];

    public function storeUsers():HasMany
    {
        return $this->hasMany(StoreUser::class, 'store_id', 'id');
    }
}
