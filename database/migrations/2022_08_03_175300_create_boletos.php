<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBoletos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_transaccion')
                ->nullable()
                ->cascadeOnUpdate()
                ->nullOnDelete()
                ->constrained('transaccions');
            $table->boolean('habilitado')
                ->default(0);
            $table->tinyInteger('concurso');
            $table->integer('serie');
            $table->string('hasher', 100);
            $table->string('hasher2', 100);
            $table->string('hash', 200);
            $table->string('md5hash', 32);
            $table->json('numeros');
            for ($i = 1; $i <= env('QTY_JUGADAS'); $i++) {
                $name = 'contador' . $i;
                $table->tinyInteger($name)
                    ->default(15);
            }
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
        Schema::dropIfExists('boletos');
    }
}
