<?php

use Illuminate\Database\Seeder;
use App\Topic;
// use FollowerTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call('FollowerTableSeeder');
        $this->command->info('Follower table seeded!');

    	// DB::table('topics')->insert([
    	// [
     //    	'topic' => 'Engineering'
     //    ],
     //    [
    	// 	'topic' => 'Science'
     //    ],
     //    [
    	// 	'topic' => 'Mathematics'
     //    ],
     //    [
    	// 	'topic' => 'Software'
     //    ],
     //    [
     //        'topic' => 'Hardware'
     //    ],
     //    [
     //        'topic' => 'News'
     //    ],
     //    [
     //        'topic' => 'Movies'
     //    ],
     //    [
     //        'topic' => 'Games'
     //    ],
    	// ]);

    }
}
