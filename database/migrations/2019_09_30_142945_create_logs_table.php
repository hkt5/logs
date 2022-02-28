<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user');
            $table->text('base_path')->nullable(false);
            $table->text('client_ip')->nullable(false);
            $table->text('host')->nullable(false);
            $table->text('query_string')->nullable(false);
            $table->text('request_uri')->nullable(false);
            $table->text('user_info')->nullable(false);
            $table->text('message')->nullable(false);
            $table->text('reason')->nullable(false);
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
        Schema::dropIfExists('logs');
    }
}
