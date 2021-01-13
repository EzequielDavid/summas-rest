<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Designer;
use App\Models\Developer;
use App\Models\Employee;
use App\Models\User;
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
        User::create(
            [
                'name'=>'Ryften',
                'email'   => 'admin@admin.com',
                'password'=> bcrypt('123456')

            ]
        );

        Company::create(
            [
                'name'=>'summas-rest',
                'email'=>'summas-rest@gmail.com',
                'telephone'=> 1165228512
            ]
        );
        Employee::factory(10)->create();
        Developer::factory(10)->create();
        Designer::factory(10)->create();
    }
}
