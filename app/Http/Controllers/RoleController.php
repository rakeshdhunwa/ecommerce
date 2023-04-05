<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(5);
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $roleData = $request->all();

        $data = [
            'name' => $roleData['name'],
            'guard_name' => 'web'
        ];

       $role = Role::create($data);
       if(isset($roleData['permissions'])){
            $role->syncPermissions($roleData['permissions']);
       }
        return redirect()->route('role.index')->withSuccess('Data Create SuccessFully...');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roles = Role::where('id', $id)->first();
        $permissions = Permission::all();
        return view('role.edit', compact('roles','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $dataall = $request->all();
        $rolesData = $request->only('name');
       
        Role::where('id', $role->id)->update($rolesData);
        if(isset($dataall['permissions'])){
            $role->syncPermissions($dataall['permissions']);
        }
        return redirect()->route('role.index')->withSuccess('Data Update SuccessFully....');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Role::where('id', $id)->delete();

        return redirect()->route('role.index')->withSuccess('Data Delete SuccessFully....');
    }
}
