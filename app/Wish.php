<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Wish
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wish whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wish whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wish whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wish whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wish whereUserId($value)
 */
class Wish extends Model
{
    //
    protected $table = 'wishes';

    protected $fillable = [
        'user_id', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
