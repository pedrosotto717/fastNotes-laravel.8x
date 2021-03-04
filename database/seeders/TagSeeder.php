<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$arr = [
    		'Frontend',
    		'Backend',
    		'Javascript',
    		'CSS3',
    		'HTML5',
    		'PHP',
    		'Python',
    		'Vue',
    		'Laravel',
    		'React',
    		'Framework',
    		'library',
    		'Life',
    		'Health',
    		'Science'
    	];

    	foreach ($arr as $key) {
    		\App\Models\Tag::create([
                'name' => $key
    		]);
    	}

        // \App\Models\Tag::factory(15)->create();
    }
}
