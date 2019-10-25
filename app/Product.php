<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App
 * @property int id
 * @property string cod_product
 * @property string name
 * @property float price
 * @property \DateTime created_at
 * @property \DateTime updated_at
 */

class Product extends Model
{
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cod_product', 'name', 'price',
    ];
}
