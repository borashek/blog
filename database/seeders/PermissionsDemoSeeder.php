<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'make posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'make cats']);
        Permission::create(['name' => 'edit cats']);
        Permission::create(['name' => 'delete cats']);
        Permission::create(['name' => 'make advs']);
        Permission::create(['name' => 'edit advs']);
        Permission::create(['name' => 'delete advs']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'make works']);
        Permission::create(['name' => 'edit works']);
        Permission::create(['name' => 'delete works']);

        $role1 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create roles and assign existing permissions
        $role2 = Role::create(['name' => 'user']);
        $role2->givePermissionTo('make works');
        $role2->givePermissionTo('edit works');
        $role2->givePermissionTo('delete works');


        // create demo users
        $user = \App\Models\User::factory()->create
        ([
            'name'     => 'Example Super-Admin User',
            'email'    => 'borashek@inbox.ru',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create
        ([
            'name' => 'Example User',
            'email' => 'test@example.com',
        ]);
        $user->assignRole($role2);
    }
}
