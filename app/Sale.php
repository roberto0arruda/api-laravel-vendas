<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sale
 * @package App
 * @property int id
 * @property int number_sales
 * @property int id_user
 * @property float total_price
 * @property \DateTime created_at
 * @property \DateTime updated_at
 */

class Sale extends Model
{
    protected $table = 'sales';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number_sales', 'id_user', 'total_price',
    ];
}
