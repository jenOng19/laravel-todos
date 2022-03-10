<?php

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
        //this calls the run method in the TodosSeeder class
        $this->call(TodosSeeder::class);
    }
}
