<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class RBACSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $roles = Role::insert([
            ['name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'editor', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Create permissions
        $permissions = Permission::insert([
            ['name' => 'create-post', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'edit-post', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'delete-post', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'view-post', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Create users
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);

        $editor = User::create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'password' => Hash::make('password123'),
        ]);

        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Fetch roles and permissions for relationships
        $adminRole = Role::where('name', 'admin')->first();
        $editorRole = Role::where('name', 'editor')->first();
        $userRole = Role::where('name', 'user')->first();

        $createPost = Permission::where('name', 'create-post')->first();
        $editPost = Permission::where('name', 'edit-post')->first();
        $deletePost = Permission::where('name', 'delete-post')->first();
        $viewPost = Permission::where('name', 'view-post')->first();

        // Attach roles to users
        $admin->roles()->attach($adminRole);
        $editor->roles()->attach($editorRole);
        $user->roles()->attach($userRole);

        // Attach permissions to roles
        $adminRole->permissions()->attach([$createPost->id, $editPost->id, $deletePost->id, $viewPost->id]);
        $editorRole->permissions()->attach([$createPost->id, $editPost->id, $viewPost->id]);
        $userRole->permissions()->attach([$viewPost->id]);
    }
}