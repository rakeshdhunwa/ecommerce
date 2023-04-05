<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Gate;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use DataTables;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(5);
        return view('user.index', compact('users'));
    }

    public function getUser(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function(User $user){
                    $actionBtn = '<a href="'.route('user.edit',$user->id).'" class="edit btn btn-success btn-sm">Edit</a> 
                    <form action="'.route('user.destroy', $user->id).'" method="post" style="background: transparent;width:auto;padding:0;">
                    '.csrf_field().'
                    '.@method_field("DELETE").'
                    <input type="submit" value="DELETE" class="delete btn btn-danger btn-sm">
                </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password'=> 'required|min:6|same:confirm_password'
        ]);

        $userall = $request->all();

        $user = [
            'name' => $userall['name'],
            'email' => $userall['email'],
            'password' => Hash::make($userall['password']),
        ];

        $users = User::create($user);
        // print_r($userall['roles']);
        // die;
        if(isset($userall['roles'])){
            $users->syncRoles($userall['roles']);
        }
        if($request->hasFile('profile_image') && $request->file('profile_image')->isValid()){
            $users->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
        }
        return redirect()->route('user.index')->withSuccess('User Create Successfully...');
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
        $user = User::where('id', $id)->first();
        $roles = Role::all();
        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=> 'required',
            'email' => 'required|unique:users,email,'. $user->id,
        ]);

        $alldata = $request->all();
        $postData = $request->only('name','email','password');

        if($postData['password']){
            $postData['password'] = Hash::make($postData['password']);
        }else{
            unset($postData['password']);
        }
        // print_r($alldata['roles']);
        // die;
        User::where('id', $user->id)->update($postData);

        if($request->hasFile('profile_image') && $request->file('profile_image')->isValid()){
            $user->clearMediaCollection('profile_image');
            $user->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
        }
        if(isset($alldata['roles'])){
            $user->syncRoles($alldata['roles']);
           
            }
        return redirect()->route('user.index')->withSuccess('User UpdateSuccessFully....');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('user.index')->withSuccess('User Delete SuccessFully....');

    }

    /**
     * User login form
     */
    public function login(){
        return view('login.login');
    }

     /**
     * User login a newly created resource in storage.
     */

     public function loginpost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $userData = $request->only('email','password');
        if(Auth::attempt($userData)){
            return redirect()->route('dashboard')->withSuccess('Logged SuccessFully....');
        }else{
            return redirect()->route('login')->withError('Invalid Credentials....');
        }
     }

      /**
     * User Display a form of the resource.
     */

     public function register(){
        return view('register');
     }

       /**
     * User Store a newly created resource in storage.
     */

     public function formpost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|same:confirm_password',
        ]);
        $formData = $request->all();

        $user = [
            'name' => $formData['name'],
            'email' => $formData['email'],
            'password' => Hash::make($formData['password'])
        ];
        User::create($user);
        return view('login.login');
     }
        /**
     * User logout.
     */

     public function logout(){
        Auth::logout();
        return redirect()->route('login')->withSuccess('Logout SuccessFully...');
     }
}
