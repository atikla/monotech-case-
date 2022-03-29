<?php

use App\Models\Promotion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('code', Promotion::CODE_LENGTH)->unique()->index();
            $table->double('amount')->unsigned();
            $table->integer('quota')->unsigned();
            $table->integer('remained_quota')->unsigned();
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
};
