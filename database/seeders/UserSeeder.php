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
        $user->jenis_kelamin = 'Perempuan';
        $user->alamat_asal = 'Lhokseumawe';
        $user->telp = '0822637623';
        $user->password = Hash::make('123');
        $user->role = 'user';
        $user->save();

        $manager = new User();
        $manager->namecode = '1234';
        $manager->name = 'Silvia Nanda';
        $manager->jenis_kelamin = 'Perempuan';
        $manager->alamat_asal = 'Lhokseumawe';
        $manager->telp = '0823232';
        $manager->password = Hash::make('1234');
        $manager->role = 'manager';
        $manager->save();
        
        $developer = new User();
        $developer->namecode = "sit";
        $developer->name = "Risfan Yani";
        $developer->jenis_kelamin = "Laki-Laki";
        $developer->alamat_asal = "Lhokseumawe";
        $developer->telp = "082264779534";
        $developer->password = bcrypt('12');
        $developer->role = 'sit';
        $developer->save();        
    }
}
