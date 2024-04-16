<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'dinas',
            'email' => 'dinas@example.com',
            'password' => bcrypt('admin1234'),
            'id_roles' => 2,
        ]);
    }
}
