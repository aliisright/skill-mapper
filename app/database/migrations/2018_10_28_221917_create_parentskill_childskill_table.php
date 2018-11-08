<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentskillChildskillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parentskill_childskill', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('skills');        
        });

        // DB::table('parentskill_childskill')->insert(
        //     [
        //         'parentskill_id' => 1,
        //         'childskill_id' => 2,
        //     ],
        //     [
        //         'parentskill_id' => 1,
        //         'childskill_id' => 10,
        //     ],
        //     [
        //         'parentskill_id' => 1,
        //         'childskill_id' => 11,
        //     ],
        //     [
        //         'parentskill_id' => 1,
        //         'childskill_id' => 13,
        //     ],
        //     [
        //         'parentskill_id' => 1,
        //         'childskill_id' => 14,
        //     ],
        //     [
        //         'parentskill_id' => 10,
        //         'childskill_id' => 15,
        //     ],
        //     [
        //         'parentskill_id' => 10,
        //         'childskill_id' => 16,
        //     ],
        //     [
        //         'parentskill_id' => 13,
        //         'childskill_id' => 17,
        //     ],
        //     [
        //         'parentskill_id' => 14,
        //         'childskill_id' => 18,
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
        Schema::dropIfExists('parentskill_childskill');
    }
}
