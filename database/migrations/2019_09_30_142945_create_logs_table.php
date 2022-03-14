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
            $table->string('user')->nullable()->default(null);
            $table->text('base_path')->nullable()->default(null);
            $table->text('client_ip')->nullable(true)->default('127.0.0.1');
            $table->text('host')->nullable()->default(null);
            $table->text('query_string')->nullable()->default(null);
            $table->text('request_uri')->nullable()->default(null);
            $table->text('user_info')->nullable()->default(null);
            $table->text('message')->nullable()->default(null);
            $table->text('reason')->nullable()->default(null);
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
