<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            array(
                'name'=>'Basant Raj Joshi',
                'email'=>'admin123@gmail.com',
                'password'=>Hash::make('admin123'),
                'role'=>'admin',
                'gender'=>'male'
            ),
            array(
                'name'=>' vivek vindra',
                'email'=>'motivation@gmail.com',
                'password'=>Hash::make('motivation123'),
                 'role'=>'passenger',
                'gender'=>'male'
            )
        ];
        DB::table('users')->insert($data);
    }
}
