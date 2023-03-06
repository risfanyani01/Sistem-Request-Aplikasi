<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //membuat sample user
        $user = new User();
        $user->namecode = '123';
        $user->name = 'Silvia Nanda';
        $user->password = Hash::make('123');
        $user->role = 'user';
        $user->save();

        $manager = new User();
        $manager->namecode = '1234';
        $manager->name = 'Silvia Nanda';
        $manager->password = Hash::make('1234');
        $manager->role = 'manager';
        $manager->save();
        
        $developer = new User();
        $developer->namecode = "sit";
        $developer->name = "Silvia Nanda";
        $developer->password = bcrypt('12');
        $developer->role = 'sit';
        $developer->save();        
    }
}
