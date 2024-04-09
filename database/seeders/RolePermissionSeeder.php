<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    
    public function run(): void
    {
        Role::create(['name'=>'dinas']);
        Role::create(['name'=>'kelompok_tani']);

        $roleDinas = Role::findByName('dinas');
        $roleKelompoktani = Role::findByName('kelompok_tani');
        
    }
}
