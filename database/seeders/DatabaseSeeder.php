<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Organization::create([
        	'name' => 'Default Organization',
        	'description' => 'This is the default organization. This is for initialization data only to be able to create a user from the start.'
        ]);
    }
}
