<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\RoleService;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleDatas = [
            [
                'name' => 'Admin'
            ],

            [
                'name' => 'Internal User'
            ],

            [
                'name' => 'Portal User'
            ],
        ];

        $roles = RoleService::roles();

        if($roles->isEmpty())
        {
            foreach($roleDatas as $roleData)
            {
                $role = RoleService::store($roleData);
            }
        }
    }
}
