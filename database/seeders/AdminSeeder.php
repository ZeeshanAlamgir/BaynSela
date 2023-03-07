<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        (new User())->create([
            'first_name' => 'Admin1',
            'last_name'=>'Bayn',
            'phone_code'  => '+92',
            'phone'=>6503430151,
            'email' => 'admin1.baynsela@baynsela.com',
            'password' => Hash::make('password'),
            'is_admin' => 1
        ]);

        (new User())->create([
            'first_name' => 'Admin2',
            'last_name'=>'Bayn',
            'phone_code'  => '+92',
            'phone'=>6503430152,
            'email' => 'admin2.baynsela@baynsela.com',
            'password' => Hash::make('password'),
            'is_admin' => 1
        ]);
    }
}
