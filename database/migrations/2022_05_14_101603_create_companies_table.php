<?php

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
        Schema::create('companies', function ($collection) {
             $collection->index('id');
            $collection->integer('country_id');
            $collection->integer('state_id');
            $collection->integer('city_id');
            $collection->string('name');
            $collection->string('phone');
            $collection->string('address');
            $collection->string('cr_number');
            $collection->string('cr_registration');
            $collection->string('cr_expiry');
            $collection->string('vatin_number');
            $collection->string('vatin_registration');
            $collection->string('vatin_expiry');
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
