<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('icon_path')->nullable();
            $table->integer('level_id')->unsigned();
            $table->integer('parent_id')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('parent_id')->references('id')->on('skills');           
        });

        // DB::table('skills')->insert(
        //     [
        //         'name' => 'HTML',
        //         'icon_path' => 'http://creersonsiteweb.net/images/html.png',
        //         'level_id' => 1,
        //     ],
        //     [
        //         'name' => 'CSS',
        //         'icon_path' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3d/CSS.3.svg/2000px-CSS.3.svg.png',
        //         'level_id' => 2,
        //     ],
        //     [
        //         'name' => 'PHP',
        //         'icon_path' => 'http://www.pngall.com/wp-content/uploads/2016/05/PHP-Logo.png',
        //         'level_id' => 2,
        //     ],
        //     [
        //         'name' => 'Java',
        //         'icon_path' => 'https://upload.wikimedia.org/wikipedia/fr/thumb/2/2e/Java_Logo.svg/550px-Java_Logo.svg.png',
        //         'level_id' => 2,
        //     ],
        //     [
        //         'name' => 'Python',
        //         'icon_path' => 'https://www.softwarehamilton.com/wp-content/uploads/2017/04/python-logo.png',
        //         'level_id' => 2,
        //     ],
        //     [
        //         'name' => 'JavaScript',
        //         'icon_path' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/480px-Unofficial_JavaScript_logo_2.svg.png',
        //         'level_id' => 2,
        //     ],
        //     [
        //         'name' => 'Laravel',
        //         'icon_path' => 'https://seeklogo.com/images/L/laravel-framework-logo-C10176EC8C-seeklogo.com.png',
        //         'level_id' => 3,
        //     ],
        //     [
        //         'name' => 'Symfony',
        //         'icon_path' => 'https://symfony.com/logos/symfony_black_03.png',
        //         'level_id' => 3,
        //     ],
        //     [
        //         'name' => 'Django',
        //         'icon_path' => 'http://big.info/wp-content/uploads/2016/07/django.png',
        //         'level_id' => 3,
        //     ],
        //     [
        //         'name' => 'NodeJS',
        //         'icon_path' => 'http://lnwebworks.com/sites/default/files/node.png',
        //         'level_id' => 3,
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
        Schema::dropIfExists('skills');
    }
}
