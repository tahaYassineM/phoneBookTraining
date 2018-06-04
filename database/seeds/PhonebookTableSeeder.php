<?php

use Illuminate\Database\Seeder;

class PhonebookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Phonebook::class, 5)->create();
    }
}
