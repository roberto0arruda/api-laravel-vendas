<?php

use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    private $table;

    public function __construct()
    {
        $this->table = (new User())->getTable();
    }

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cep');
            $table->string('street');
            $table->string('number');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new User();

        $user->name         = 'Administrador';
        $user->email        = 'admin@admin.com.br';
        $user->password     = bcrypt('123456');
        $user->cep          = '69093805';
        $user->street       = 'Rua Teste';
        $user->number       = '100';
        $user->neighborhood = 'Bairro Teste';
        $user->city         = 'Manaus';
        $user->state        = 'AM';
        $user->save();
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
