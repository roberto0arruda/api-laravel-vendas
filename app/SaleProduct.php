<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SaleProduct
 * @package App
 * @property int id
 * @property int id_sale
 * @property int id_product
 * @property int quant
 * @property float sale_price
 * @property \DateTime created_at
 * @property \DateTime updated_at
 */

class SaleProduct extends Model
{
    protected $table = 'sale_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_sale', 'id_product', 'quant', 'sale_price',
    ];

    public function sale()
    {
        return $this->hasOne(Sale::class, 'id','id_sale');
    }
}
