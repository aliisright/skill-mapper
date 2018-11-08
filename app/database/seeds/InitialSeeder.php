<?php

use Illuminate\Database\Seeder;
use App\Models\Score;
use App\Models\Level;
use DB;

class InitialSeeder extends Seeder
{
    protected $scores = ['nul', 'débutant', 'intermédiaire', 'avancé', 'expert'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Scores
        for ($n = 0; $n < 3; $n++) {
            Score::create(['level' => $n]);
        }

        // Levels
        foreach($this->scores as $score) {
            Level::create(['score' => $score]);
        }

        // Skills
        DB::table('skills')->insert(
            [
                'name' => 'HTML',
                'icon_path' => 'http://creersonsiteweb.net/images/html.png',
                'level_id' => 1,
            ],
            [
                'name' => 'CSS',
                'icon_path' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3d/CSS.3.svg/2000px-CSS.3.svg.png',
                'level_id' => 2,
            ],
            [
                'name' => 'PHP',
                'icon_path' => 'http://www.pngall.com/wp-content/uploads/2016/05/PHP-Logo.png',
                'level_id' => 2,
            ],
            [
                'name' => 'Java',
                'icon_path' => 'https://upload.wikimedia.org/wikipedia/fr/thumb/2/2e/Java_Logo.svg/550px-Java_Logo.svg.png',
                'level_id' => 2,
            ],
            [
                'name' => 'Python',
                'icon_path' => 'https://www.softwarehamilton.com/wp-content/uploads/2017/04/python-logo.png',
                'level_id' => 2,
            ],
            [
                'name' => 'JavaScript',
                'icon_path' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/480px-Unofficial_JavaScript_logo_2.svg.png',
                'level_id' => 2,
            ],
            [
                'name' => 'Laravel',
                'icon_path' => 'https://seeklogo.com/images/L/laravel-framework-logo-C10176EC8C-seeklogo.com.png',
                'level_id' => 3,
            ],
            [
                'name' => 'Symfony',
                'icon_path' => 'https://symfony.com/logos/symfony_black_03.png',
                'level_id' => 3,
            ],
            [
                'name' => 'Django',
                'icon_path' => 'http://big.info/wp-content/uploads/2016/07/django.png',
                'level_id' => 3,
            ],
            [
                'name' => 'NodeJS',
                'icon_path' => 'http://lnwebworks.com/sites/default/files/node.png',
                'level_id' => 3,
            ]
        );


    }
}
