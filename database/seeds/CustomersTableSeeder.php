<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(\App\Customer::class)->create();
        factory(\App\Customer::class,100)->create();
        // factory(\App\Company::class,3)->create();
    }
}
