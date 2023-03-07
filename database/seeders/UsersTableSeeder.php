<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new User())->create([
            'first_name' => 'Admin',
            'last_name'=>'Bayn',
            'phone_code'  => '+92',
            'phone'=>6503430150,
            'email' => 'admin.baynsela@baynsela.com',
            'password' => Hash::make('password'),
            'is_admin' => 1
        ]);

        (new User())->create([
            'first_name' => 'Bayn',
            'last_name'    => 'Sela',
            'email' => 'bsella@gmail.com',
            'password' => Hash::make('password'),
            'phone_code'  => '+92',
            'phone' => +966503532180,
            'client_id'    => 8965745226,
            'company_name' => 'Bayn Sella',
            'country'    => 'Saudi Arabia',
            'city' => 'Jeddah',
            'industry'    => 'Marketing',
            'company_size' => 'Large Scale',
            'annual_marketing_budget'=> '100B',
        ]);

    }
}
