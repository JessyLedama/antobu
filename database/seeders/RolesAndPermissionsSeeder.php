<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\RoleService;
use App\Models\Permission;
use App\Models\Role;
use App\Services\SlugService;
use App\Services\StatusService;
use App\Services\PermissionService;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = RoleService::roles();

        $permissions = Permission::all();

        if($roles->isEmpty())
        {
            $roleDatas = [
                ['name' => 'admin'],
                ['name' => 'internal user'],
                ['name' => 'portal user']
            ];

            foreach($roleDatas as $validated)
            {
                RoleService::store($validated);
            }
        }

        if($permissions->isEmpty())
        {
            $permissions = [
                ['name' => 'create-model'], 
                ['name' => 'edit-model'], 
                ['name' => 'delete-model'], 
                ['name' => 'export-model'], 
                ['name' => 'view-model']
            ];

            foreach ($permissions as $validated) {

                $perm = PermissionService::store($validated);
                
                $adminRole = RoleService::searchBySlug('admin');
                $adminRole->permissions()->attach($perm);
            }
        }
    }
}
