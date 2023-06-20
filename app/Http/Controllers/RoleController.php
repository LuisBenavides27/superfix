<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:roles.index');
      //  $this->middleware('can:reportes.edit')->only('edit','update');
       // $this->middleware('can:reportes.destroy')->only('destroy');
      
    }
     

    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role =  Role::create($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.edit', $role)->with('info', 'Se ha creado el rol ');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        $selectedPermissions = $role->permissions()->pluck('id')->toArray();

        return view('roles.edit', compact('role', 'permissions', 'selectedPermissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role->update($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.edit', $role)->with('info', 'Se han actulizado los permisos de este rol ');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('info','El rol fue elimnado con exito');
    }
}
