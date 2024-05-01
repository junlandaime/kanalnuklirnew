<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $teacherRole = Role::create([
            'name' => 'teacher'
        ]);

        $studentRole = Role::create([
            'name' => 'student'
        ]);

        $userAdmin = User::create([
            'name' => 'Administrator',
            'email' => 'Admin@kanalnuklir.id',
            'password' => bcrypt('secret')
        ]);

        $userAdmin->assignRole($adminRole);
    }
}
