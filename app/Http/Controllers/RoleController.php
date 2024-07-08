<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = RoleService::roles();

        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'unique:roles', 'max:20']
        ]);

        $role = RoleService::store($validated);

        return redirect()->route('admin.role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $role = RoleService::searchBySlug($slug);

        return view('admin.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $role = RoleService::searchBySlug($slug);

        return view('admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'name' => ['required']
        ]);

        $role = RoleService::update($validated, $slug);

        return redirect()->route('admin.role.show', $slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $role = RoleService::delete($slug);

        return redirect()->route('admin.role.index');
    }
}
