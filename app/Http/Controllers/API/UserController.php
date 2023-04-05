<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response($users, 201);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //   print_r($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        if (!$validator->fails()) {
            
            $user = User::create($request->only('name', 'email', 'password'));

            $responseData = [
                "status" => true,
                "message" => "User created successfully...",
                "data" => $user
            ];
            return response($responseData, 201);
        } else {
            return response(['status' => false, 'message' => 'validation failed...'], 200);
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // print_r($request->all());
        $user->update($request->all());
        $responseData = [
            "status" => true,
            "message" => "User Updated successfully...",
            "data" => $user,
        ];
        return response($responseData, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response(
            [
                'status' => true,
                'message' => 'User deleted...'
            ],
            200
        );
    }
}
