<?php

use Illuminate\Database\Seeder;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Todo::class)->create(); - Creates one instance of TodoFactory aka creates one todo
        //factory(App\Todo::class, 5)->create(); - Creates multiple todos, in this case 5
        factory(App\Todo::class, 5)->create();
    }
}
