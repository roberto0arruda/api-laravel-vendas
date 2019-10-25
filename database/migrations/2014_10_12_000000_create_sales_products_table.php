<?php

use App\Product;
use App\Sale;
use App\SaleProduct;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    private $table;
    private $tableProducts;
    private $tableSales;

    public function __construct()
    {
        $this->table = (new SaleProduct())->getTable();
        $this->tableProducts = (new Product())->getTable();
        $this->tableSales = (new Sale())->getTable();
    }

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('id_sale')
                ->index('id_sale')
                ->foreign('id_sale', 'id_sale_fk')
                ->references('id')
                ->on($this->tableSales);

            $table->unsignedInteger('id_product')
                ->index('id_product')
                ->foreign('id_product', 'id_product_fk')
                ->references('id')
                ->on($this->tableProducts);

            $table->integer('quant');
            $table->decimal('sale_price');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
