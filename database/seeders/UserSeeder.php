<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission();
        $permission->name = 'create-user';
        $permission->save();

        $role = new Role();
        $role->name = 'admin';
        $role->save();
        $role->permissions()->attach($permission);
        //$permission->roles()->attach($role);

        $permission = new Permission();
        $permission->name = 'create-patient';
        $permission->save();

        $role = new Role();
        $role->name = 'doctor';
        $role->save();
        $role->permissions()->attach($permission);
        //$permission->roles()->attach($role);

        $adminRole = Role::where('name', 'admin')->first();
        $doctorRole = Role::where('name', 'doctor')->first();
        $create_user = Permission::where('name', 'create-user')->first();
        $create_patient = Permission::where('name', 'create-patient')->first();

        $admin = new User();
        $admin->name = 'Admin'; 
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('Password$2024');
        $admin->save();
        $admin->roles()->attach($adminRole);
        $admin->permissions()->attach($create_user);

        $doctor = new User();
        $doctor->name = 'Doctor'; 
        $doctor->email = 'doctor@gmail.com';
        $doctor->password = bcrypt('Password$2024');
        $doctor->save();
        $doctor->roles()->attach($doctorRole);
        $doctor->permissions()->attach($create_patient);
    }
}
