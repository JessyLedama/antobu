<?php

namespace App\Services;

use App\Models\Permission;
use App\Services\StatusService;
use App\Services\SlugService;

class PermissionService
{
    /**
     *  Get all active Permissions.
     */
    public static function permissions()
    {
        $status = StatusService::active();

        $permissions = Permission::where('status_id', $status->id)->paginate(5);
        
        return $permissions;
    }

    /**
     *  Store a new Permission
     */
    public static function store($validated)
    {
        $slug = SlugService::make($validated['name']);

        $status = StatusService::active();

        $permissionData = [
            'name' => $validated['name'],
            'slug' => $slug,
            'status_id' => "$status->id"
        ];

        $permission = Permission::create($permissionData);

        session()->flash('success', 'Permission has been stored.');

        return $permission;
    }

    /**
     *  Search for a Permission by name
     */
    public static function search($validated)
    {
        $name = $validated['name'];

        $permission = Permission::where('name', 'LIKE', "%$name%")->first();

        return $permission;
    }

    /**
     *  Search for a product by slug
     */
    public static function searchBySlug($slug)
    {
        $permission = Permission::where('slug', $slug)->first();

        return $permission;
    }

    /**
     *  Update an existing Permission
     */
    public static function update($validated, $slug)
    {
        $permission = self::searchBySlug($slug);

        $slug = SlugService::make($validated['name']);

        $validated['slug'] = $slug;

        $permission->update($validated);

        return $permission;
    }

    /**
     *  Find a Permission by its id
     */
    public static function find($id)
    {
        $permission = Permission::find($id);

        return $permission;
    }

    /**
     *  Delete a Permission from DB
     */
    public static function delete($slug)
    {
        $permission = PermissionService::searchBySlug($slug);

        $permission->delete();

        session()->flash('success', 'Permission deleted.');

        return true;
    }
}