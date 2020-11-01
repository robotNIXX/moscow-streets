<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
            'name' => 'admin',
        ]);

        $admin = User::create([
            'name' => 'admin',
            'password' => Hash::make('admin')
        ]);

        $admin->assignRole($adminRole);

        $departmentManager = Role::create([
            'name' => 'department manager',
        ]);

        $manager = User::create([
            'name' => 'manager',
            'password' => Hash::make('admin')
        ]);

        $manager->assignRole($departmentManager);

        $executorRole = Role::create([
            'name' => 'executor',
        ]);

        $executor = User::where('name', 'user')->first();
        if (!$executor) {
            $executor = User::create([
                'name' => 'user',
                'password' => Hash::make('admin')
            ]);
        }

        $executor->assignRole($executorRole);
    }
}
