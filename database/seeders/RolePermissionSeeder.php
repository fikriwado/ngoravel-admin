<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * List of permissions to add.
     */
    private $permissions = [
        'user-list',
        'user-create',
        'user-edit',
        'user-delete',
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'permission-list',
        'permission-create',
        'permission-edit',
        'permission-delete',
        'article-list',
        'article-create',
        'article-edit',
        'article-delete',
        'article-publish'
    ];
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles
        $superAdmin = Role::create(['name' => 'super-admin']);
        $admin      = Role::create(['name' => 'admin']);
        $writer     = Role::create(['name' => 'writer']);

        // Assign permissions to roles
        $superAdmin->givePermissionTo(Permission::all());
        $admin->givePermissionTo([
            'user-list', 'user-create', 'user-edit', 'user-delete',
            'article-list', 'article-create', 'article-edit', 'article-delete', 'article-publish'
        ]);
        $writer->givePermissionTo([
            'article-list', 'article-create', 'article-edit', 'article-delete'
        ]);
    }
}
