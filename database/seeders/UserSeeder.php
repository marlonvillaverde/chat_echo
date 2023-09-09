<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {

        $superusuario = User::create([
            'name' => 'Ernesto',
            'email' => 'ernestochapon@gmail.com',
            'password' => Hash::make('12345678'),           
            'email_verified_at' => date('Y-m-d', strtotime('2022-01-30')),
            'remember_token' => Str::random(10),            
        ]);


        $superusuario = User::create([
            'name' => 'Marlon',
            'email' => 'mdjva75@gmail.com',
            'password' => Hash::make('12345678'),           
            'email_verified_at' => date('Y-m-d', strtotime('2023-01-01')),
            'remember_token' => Str::random(10),            

        ]);


        $administrador = User::create([
            'name' => 'Anaida',
            'email' => 'anaidachapon@gmail.com',
            'password' => Hash::make('12345678'),           
            'email_verified_at' => date('Y-m-d', strtotime('2022-01-30')),
            'remember_token' => Str::random(10),                                    
        ]);

        $funcionario = User::create([
            'name' => 'Ernesto S.',
            'email' => 'ernestoschapon@gmail.com',
            'password' => Hash::make('12345678'),           
            'email_verified_at' => date('Y-m-d', strtotime('2022-01-30')),
            'remember_token' => Str::random(10),                                    
        ]);

        $fiscal = User::create([
            'name' => 'Macyris',
            'email' => 'macyrischapon@gmail.com',
            'password' => Hash::make('12345678'),           
            'email_verified_at' => date('Y-m-d', strtotime('2022-01-30')),
            'remember_token' => Str::random(10),                                    
        ]);

        $sujeto1 = User::create([
            'name' => 'Laura',
            'email' => 'laurachapon@gmail.com',
            'password' => Hash::make('12345678'),           
            'email_verified_at' => date('Y-m-d', strtotime('2022-01-30')),
            'remember_token' => Str::random(10),                                    
        ]);

        $sujeto2 = User::create([
            'name' => 'Emilia',
            'email' => 'emiliachapon@gmail.com',
            'password' => Hash::make('12345678'),           
            'email_verified_at' => date('Y-m-d', strtotime('2022-01-30')),
            'remember_token' => Str::random(10),                                    
        ]);
    }
}
