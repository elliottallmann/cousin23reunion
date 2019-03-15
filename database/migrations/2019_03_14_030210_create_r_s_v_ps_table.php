<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRSVPsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsvps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("eventId");
            $table->unsignedInteger("userId");
            $table->integer("partySize");
            $table->timestamps();
        });

        Schema::table('rsvps', function(Blueprint $table) {
            $table->foreign("eventId", "eventId")->references("id")->on("events");
            $table->foreign("userId", "userId")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rsvps');
    }
}
