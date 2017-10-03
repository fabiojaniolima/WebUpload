<?php

use App\Models\Preferencia;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('preferencia', 25)->unique();
            $table->string('valor', 30);
            $table->timestamps();
        });
        
        Preferencia::create([
            'preferencia' => 'auto_registro',
            'valor' => 'ativo'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preferencias');
    }
}
