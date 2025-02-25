<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_administrador =   Role::create(['name' => 'administrador']);
        $role_vendedor =  Role::create(['name' => 'vendedor']);
        $role_almacen = Role::create(['name' => 'almacen']);
    }
}
