<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * void
     */

    public function run()
    {
    		$data = [
    		[
    			'name' => 'Luis',
    			'email' => 'luis@codeup.com',
    			'password' => Hash::make('scott')
    		],
    		[
    			'name' => 'Cam',
    			'email' => 'Cam@codeup.com',
    			'password' => Hash::make('scott')
    		],
    		[
    			'name' => 'Craig',
    			'email' => 'Craig@codeup.com',
    			'password' => Hash::make('scott')
    		],
    		[
    			'name' => 'Tyoer',
    			'email' => 'Tyoer@codeup.com',
    			'password' => Hash::make('scott')
    		],
    		[
    			'name' => 'TJ',
    			'email' => 'TJ@codeup.com',
    			'password' => Hash::make('scott')
    		],
    		[
    			'name' => 'Will',
    			'email' => 'Will@codeup.com',
    			'password' => Hash::make('scott')
    		],
    		[
    			'name' => 'Anna',
    			'email' => 'Anna@codeup.com',
    			'password' => Hash::make('scott')
    		],
    		[
    			'name' => 'Make',
    			'email' => 'Make@codeup.com',
    			'password' => Hash::make('scott')
    		],
    		[
    			'name' => 'John',
    			'email' => 'John@codeup.com',
    			'password' => Hash::make('scott')
    		],
    		[
    			'name' => 'Ernesto',
    			'email' => 'Ernesto@codeup.com',
    			'password' => Hash::make('scott')
    		]
    ];
    		foreach($data as $user) {
    			App\Models\User::create($user);
    		}    
    }
}
