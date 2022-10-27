<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            '_id' => "1",
            'username' => 'manager1',
            'email' => 'manager1@gmail.com',
            'password' => bcrypt('12345678'),
            'last_login' => date('Y-m-d H:i:s'),
            'is_active' => true,
            'role'=> 'manager'
        ]);
        User::create([
            '_id' => "2",
            'username' => 'agent1',
            'email' => 'agent1@gmail.com',
            'password' => bcrypt('12345678'),
            'last_login' => date('Y-m-d H:i:s'),
            'is_active' => true,
            'role'=> 'agent'
        ]);
        User::create([
            '_id' => "3",
            'username' => 'agent2',
            'email' => 'agent2@gmail.com',
            'password' => bcrypt('12345678'),
            'last_login' => date('Y-m-d H:i:s'),
            'is_active' => true,
            'role'=> 'agent'
        ]);
    }
}
