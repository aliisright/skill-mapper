<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_goals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('skill_id')->unsigned();
            $table->timestamps();

            $table->foreign('skill_id')->references('id')->on('skills');
        });

        // DB::table('skill_goals')->insert(
        //     [
        //         'name' => 'premier goal HTML',
        //         'skill_id' => 1,
        //     ],
        //     [
        //         'name' => 'premier goal CSS',
        //         'skill_id' => 2,
        //     ],
        //     [
        //         'name' => '2e goal HTML',
        //         'skill_id' => 1,
        //     ]
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill_goals');
    }
}
