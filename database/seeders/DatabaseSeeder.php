<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Designer;
use App\Models\Developer;
use App\Models\Employee;
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
        // \App\Models\User::factory(10)->create();
        Company::factory(2)->create();
        //Employee::factory(10)->create();
        Developer::factory(10)->create();
        Designer::factory(10)->create();
    }
}
