<?php

namespace App\Services;

use App\Models\Role;
use App\Services\StatusService;
use App\Services\SlugService;

class RoleService
{
    /**
     *  Get all active roles.
     */
    public static function roles()
    {
        $status = StatusService::active();

        $roles = Role::where('status_id', $status->id)->paginate(5);
        
        return $roles;
    }

    /**
     *  Store a new role
     */
    public static function store($validated)
    {
        $slug = SlugService::make($validated['name']);

        $status = StatusService::active();

        $roleData = [
            'name' => $validated['name'],
            'slug' => $slug,
            'status_id' => "$status->id"
        ];

        $role = Role::create($roleData);

        session()->flash('success', 'Role has been stored.');

        return $role;
    }

    /**
     *  Search for a role by name
     */
    public static function search($validated)
    {
        $name = $validated['name'];

        $role = Role::where('name', 'LIKE', "%$name%")->first();

        return $role;
    }

    /**
     *  Search for a product by slug
     */
    public static function searchBySlug($slug)
    {
        $role = Role::where('slug', $slug)->first();

        return $role;
    }

    /**
     *  Update an existing role
     */
    public static function update($validated, $slug)
    {
        $role = self::searchBySlug($slug);

        $slug = SlugService::make($validated['name']);

        $validated['slug'] = $slug;

        $role->update($validated);

        return $role;
    }

    /**
     *  Find a role by its id
     */
    public static function find($id)
    {
        $role = Role::find($id);

        return $role;
    }

    /**
     *  Delete a role from DB
     */
    public static function delete($slug)
    {
        $role = RoleService::searchBySlug($slug);

        $role->delete();

        session()->flash('success', 'Role deleted.');

        return true;
    }
}