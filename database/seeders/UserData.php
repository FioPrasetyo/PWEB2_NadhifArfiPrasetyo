<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'=>'admin',
            "password"=>Hash::make('admin'),
            'level'=>'admin',
        ]);
        User::create([
            'username'=>'manager',
            "password"=>Hash::make('manager'),
            'level'=>'manager',
        ]);
        


    }
        
    
}
