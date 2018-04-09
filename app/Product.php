<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Product
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property string $small_description
 * @property string $description
 * @property float $price
 * @property string $image_menu
 * @property string $image_item
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $category_id
 * @property-read \App\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereImageItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereImageMenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSmallDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Wish $wish
 */
class Product extends Model
{
    //
    use Searchable;

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function wish()
    {
        return $this->hasOne('App\Wish');
    }
}
