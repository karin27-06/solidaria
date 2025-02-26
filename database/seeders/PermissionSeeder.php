<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Permissions for Laboratory Module
        Permission::create(['name' => 'create doctors']);
        Permission::create(['name' => 'view doctors']);
        Permission::create(['name' => 'edit doctors']);
        Permission::create(['name' => 'delete doctors']);

        Permission::create(['name' => 'create laboratories']);
        Permission::create(['name' => 'view laboratories']);
        Permission::create(['name' => 'edit laboratories']);
        Permission::create(['name' => 'delete laboratories']);

    }
}
