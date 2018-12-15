<?php /** @noinspection ALL */

namespace App\Models;

use App\Models\Traits\QueryTrait;
use App\Traits\AttributesAccessTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * App\Models\Region
 *
 * @property int $id
 * @property string $code 行政编码
 * @property int $parentId 上级行政ID
 * @property string $name 行政区域名称
 * @property string $firstWord 首字母
 * @property string $englishName 英文名称
 * @property \Illuminate\Support\Carbon|null $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @property string|null $deletedAt
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Region[] $children
 * @property-read \App\Models\Region $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region multiUpdate($items, $whereField = 'id')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereContains($column, $value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereEnglishName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereFirstWord($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Region extends Model implements Transformable
{
    use TransformableTrait, AttributesAccessTrait, QueryTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'code', 'parent_id', 'name', 'first_name', 'english_name'
    ];

    public function parent (): BelongsTo
    {
        return $this->belongsTo(Region::class, 'parent_id', 'id');
    }

    public function children():HasMany
    {
        return $this->hasMany(Region::class, 'parent_id', 'id');
    }

}
