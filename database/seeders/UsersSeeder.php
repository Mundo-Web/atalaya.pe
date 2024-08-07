<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'root@mundoweb.pe'
        ],[
            'name' => 'Usuario',
            'lastname' => 'Root',
            'email' => 'root@mundoweb.pe',
            'password' => 'r00tme'
        ])->assignRole('Root');
        User::updateOrCreate([
            'email' => 'julio@mundoweb.pe'
        ],[
            'name' => 'Julio',
            'lastname' => 'Izquierdo',
            'email' => 'julio@mundoweb.pe',
            'password' => '12345678'
        ])->assignRole('Root');
    }
}
