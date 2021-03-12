<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEndorsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endorsers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('farm');
            $table->string('email')->unique();
            $table->string('contact')->unique();
            $table->string('address');
            $table->text('image')->nullable();
            $table->string('fb')->nullable();
            $table->string('ig')->nullable();
            $table->text('achievements')->nullable();
            $table->boolean('national')->default(true);
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
        Schema::dropIfExists('endorsers');
    }
}
