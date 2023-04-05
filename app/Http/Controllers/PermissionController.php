<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::paginate(5);
        return view('permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Permission $prermission)
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $permissions = $request->all();

        $data = [
            'name' => $permissions['name'],
            'guard_name' => 'web',
        ];

        $permission = Permission::create($data);

        return redirect()->route('permission.index')->withSuccess('Data Create SuccessFully...');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permissions = Permission::where('id', $id)->first();
        return view('permission.edit', compact('permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
        ]);
       
        $permissionData = $request->only('name');
        $perData = Permission::where('id', $id)->update($permissionData);
        return redirect()->route('permission.index')->withSuccess('User UpdateSuccessFully....');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Permission::where('id', $id)->delete();

        return redirect()->route('permission.index')->withSuccess('Data Delete SuccessFully....');
    }
}
