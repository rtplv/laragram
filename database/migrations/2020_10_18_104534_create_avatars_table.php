<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvatarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public.avatars', function (Blueprint $table) {
            $table->id();

            $table->string('storage_path')->nullable();
            $table->string('external_path')->nullable();

            $table->bigInteger('user_id');
            $table->boolean('active')->default(false);

            $table->timestamps();

            $table->index(['user_id', 'active']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public.avatars');
    }
}
