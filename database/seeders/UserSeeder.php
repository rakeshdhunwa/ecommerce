<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            'name' => 'rakesh',
            'email' => 'rd@gmail.com',
            'password' => Hash::make('123456'),
        ];

        $roleData = User::create($data);
        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $roleData->assignRole($role->name);


        $faker = Faker::create();
        for($i=1; $i<=50; $i++){
        $user = new User;
        $user->name = $faker->name;
        $user->email = $faker->email;
        $user->password = Hash::make($faker->password);
        $user->save();
        }
    }
}
