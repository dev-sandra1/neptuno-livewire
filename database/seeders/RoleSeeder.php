<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'description' => 'Administrador del sistema',
            'is_active' => true,
        ]);

        Role::create([
            'name' => 'member',
            'description' => 'Miembro del sistema',
            'is_active' => true,
        ]);
    }
}
