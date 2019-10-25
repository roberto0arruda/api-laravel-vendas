<?php

use App\Sale;
use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    private $table;
    private $tableUsers;

    public function __construct()
    {
        $this->table = (new Sale())->getTable();
        $this->tableUsers = (new User())->getTable();
    }

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('number_sales');

            $table->unsignedInteger('id_user')
                ->index('id_user')
                ->foreign('id_user', 'id_user_fk')
                ->references('id')
                ->on($this->tableUsers);

            $table->decimal('total_price', 10, 2);

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
