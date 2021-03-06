<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_from');
            $table->dateTime('date_to');
            $table->string('description');
            $table->string('type');
            $table->boolean('is_confirmed')->default(false);
            $table->timestamp('confirmed_at')->nullable();
            $table->unsignedBigInteger('requester_id');
            $table->unsignedBigInteger('responser_id');
            $table->unsignedBigInteger('team_id');
            $table->timestamps();
        });

        Schema::table('requests', function (Blueprint $table){
            $table->foreign('requester_id')
            ->references('id')->on('users')->onDelete('cascade');
            
            $table->foreign('responser_id')
                ->references('id')->on('users')->onDelete('cascade');

            $table->foreign('team_id')
            ->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropForeign(['requester_id']);
            $table->dropForeign(['responser_id']);
            $table->dropForeign(['team_id']);
            $table->dropColumn('requester_id');
            $table->dropColumn('responser_id');
            $table->dropColumn('team_id');
        });

        Schema::dropIfExists('requests');
    }
}
