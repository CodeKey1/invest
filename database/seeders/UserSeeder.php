<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User:: create([
            'name'=>'MoHaridy',
            'email'=>'moharidy98@gmail.com',
            'password'=> Hash ::make('1419'),
            'role'=>'super_admin',

        ]);
        $user->assignRole('super_admin');
    }
}
