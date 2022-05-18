<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', 50);
            $table->text('desc')->nullable();
            $table->dateTime('deadl')->nullable();
            $table->integer('prio')->nullable();

            // Pas besoin comme $table->timestamps(); crée déjà la colonne created_at
            // $table->date('dateCrea')->default(now());

            $table->integer('user')->nullable();
            $table->integer('parent')->nullable();
            
            $table->boolean('accomplie')->default(false);
            $table->date('dateFini')->nullable();
            $table->string('resultat', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
