<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * void
     */

    public function run()
    {
    		$data2 = [
    		[
	    		'title' => 'First Post',
	            'content' => 'AAAAaaaaaaaaaaaaaaaaaaaa',
	            'url' => 'http://google.com',
	            'created_by' => App\Models\User::all()->first()->id,
    		],
    		[
    			'title' => 'Second Post',
	            'content' => 'BBBBBBBBBBBBBBBBBBBBBB',
	            'url' => 'http://google.com',
	            'created_by' => App\Models\User::all()->first()->id,
    		],
    		[
    			'title' => 'Third Post',
	            'content' => 'CCCCCCCCCCCCCCC',
	            'url' => 'http://google.com',
	            'created_by' => App\Models\User::all()->first()->id,
    		],
    		[
    			'title' => 'Fourth Post',
	            'content' => 'DDDDDDDDDDDDDDDDD',
	            'url' => 'http://google.com',
	            'created_by' => App\Models\User::all()->first()->id,
    		],
    		[
    			'title' => 'Fifth Post',
	            'content' => 'EEEEEEEEEEEEEEEEE',
	            'url' => 'http://google.com',
	            'created_by' => App\Models\User::all()->first()->id,
    		],
    		[
    			'title' => 'Sixth Post',
	            'content' => 'FFFFFFFFFF',
	            'url' => 'http://google.com',
	            'created_by' => App\Models\User::all()->first()->id,
    		],
    		[
    			'title' => 'Seventh Post',
	            'content' => 'GGGGGGGGGGGGGGGG',
	            'url' => 'http://google.com',
	            'created_by' => App\Models\User::all()->first()->id,
    		],
    		[
    			'title' => 'Eigth Post',
	            'content' => 'HHHHHHHHHHHHHH',
	            'url' => 'http://google.com',
	            'created_by' => App\Models\User::all()->first()->id,
    		],
    		[
    			'title' => 'Ninth Post',
	            'content' => 'IIIIIIIIIIIIIIII',
	            'url' => 'http://google.com',
	            'created_by' => App\Models\User::all()->first()->id,
    		],
    		[
    			'title' => 'Tenth Post',
	            'content' => 'JJJJJJJJJ',
	            'url' => 'http://google.com',
	            'created_by' => App\Models\User::all()->first()->id,
    		]
    ];
    		foreach($data2 as $post) {
    			App\Models\Post::create($post);
    		}    
    }
}
