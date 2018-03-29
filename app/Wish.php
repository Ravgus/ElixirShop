<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Wish
 *
 * @mixin \Eloquent
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
