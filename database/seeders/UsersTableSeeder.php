<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role=Role::create([
            'name'=>'Admin'
        ]);


        User::create([
            'role_id'=>$role->id,
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'status'=>'Active',
            'password'=>bcrypt('123')]
        );
    }
}
