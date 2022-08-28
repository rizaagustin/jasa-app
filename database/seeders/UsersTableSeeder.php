<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// untuk menambahkan hash pada password
use Illuminate\Support\Facades\Hash;
// use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Crap4j;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = 
            [
                [
                    'name'      =>'John Dae',
                    'email'     =>'john@gmail.com',
                    'password'  =>Hash::make('admin'),
                    'created_at'=>date('Y-m-d h:i:s'),
                    'updated_at'=>date('Y-m-d h:i:s')
                ],
                [
                    'name'      =>'Jane Dae',
                    'email'     =>'jane@gmail.com',
                    'password'  =>Hash::make('admin'),
                    'created_at'=>date('Y-m-d h:i:s'),
                    'updated_at'=>date('Y-m-d h:i:s')
                ]
            ];

            User::insert($users);
    }
}
