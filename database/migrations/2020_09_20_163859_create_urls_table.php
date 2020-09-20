<?php

use App\Models\Url;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new Url())->getTable(), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('original_url');
            $table->string('short_url', 10)->unique();
            $table->unsignedBigInteger('transitions')->default(0);
            $table->date('expires_at')->nullable();
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
        Schema::dropIfExists((new Url())->getTable());
    }
}
