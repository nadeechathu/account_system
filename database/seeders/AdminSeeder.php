<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Thiwanka Senarath',
            'email' => 'vishwajithsena@gmail.com',
            'user_type' => 'exofficers',
            'password' => bcrypt(12345678),
        ]);

        $exofficers = User::create([
            'name' => 'Indika Anura',
            'email' => 'Indikaanura34@gmail.com',
            'user_type' => 'exofficers',
            'password' => bcrypt(12345678),
        ]);

        /** Executive officers **/
        $exofficers = User::create([
            'name' => 'Tharindu Dilshan',
            'email' => 'tharindudilshan62@gmail.com',
            'user_type' => 'exofficers',
            'password' => bcrypt(12345678),
        ]);

        $exofficers = User::create([
            'name' => 'Visuka Gayashan',
            'email' => 'visukagayashan9@gmail.com',
            'user_type' => 'exofficers',
            'password' => bcrypt(12345678),
        ]);

        $developer = User::create([
            'name' => 'Developer',
            'email' => 'onemaxweb@gmail.com',
            'user_type' => '',
            'password' => bcrypt(12345678),
        ]);

        /** Directors **/
        $directors = User::create([
            'name' => 'Uditha Chandana',
            'email' => 'udithaudugoda@gmail.com',
            'user_type' => 'director',
            'password' => bcrypt(12345678),
        ]);

        $directors = User::create([
            'name' => 'Sampath Rajakaruna',
            'email' => 'copsampath@gmail.com',
            'user_type' => 'director',
            'password' => bcrypt(12345678),
        ]);

        $directors = User::create([
            'name' => 'N.Deraniyagala',
            'email' => 'ppcnderaniyagala@gmail.com',
            'user_type' => 'director',
            'password' => bcrypt(12345678),
        ]);

        $exofficers = User::create([
            'name' => 'Iresha Roshini',
            'email' => 'iresha93420@gmail.com',
            'user_type' => '',
            'password' => bcrypt(12345678),
        ]);


        $admin_role = Role::create(['name' => 'admin']);
        $developer_role = Role::create(['name' => 'developer']);
        $director_role = Role::create(['name' => 'director']);
        $exofficers_role = Role::create(['name' => 'exofficers']);

        $permission = Permission::create(['name' => 'Center access']);
        $permission = Permission::create(['name' => 'Center edit']);
        $permission = Permission::create(['name' => 'Center create']);
        $permission = Permission::create(['name' => 'Center delete']);

        $permission = Permission::create(['name' => 'Member access']);
        $permission = Permission::create(['name' => 'Member edit']);
        $permission = Permission::create(['name' => 'Member create']);
        $permission = Permission::create(['name' => 'Member delete']);

        $permission = Permission::create(['name' => 'Loans Category access']);
        $permission = Permission::create(['name' => 'Loans Category edit']);
        $permission = Permission::create(['name' => 'Loans Category create']);
        $permission = Permission::create(['name' => 'Loans Category delete']);

        $permission = Permission::create(['name' => 'Loans access']);
        $permission = Permission::create(['name' => 'Loans edit']);
        $permission = Permission::create(['name' => 'Loans create']);
        $permission = Permission::create(['name' => 'Loans delete']);

        $permission = Permission::create(['name' => 'Collections access']);
        $permission = Permission::create(['name' => 'Collections edit']);
        $permission = Permission::create(['name' => 'Collections create']);
        $permission = Permission::create(['name' => 'Collections delete']);

        $permission = Permission::create(['name' => 'Role access']);
        $permission = Permission::create(['name' => 'Role edit']);
        $permission = Permission::create(['name' => 'Role create']);
        $permission = Permission::create(['name' => 'Role delete']);

        $permission = Permission::create(['name' => 'User access']);
        $permission = Permission::create(['name' => 'User edit']);
        $permission = Permission::create(['name' => 'User create']);
        $permission = Permission::create(['name' => 'User delete']);

        $permission = Permission::create(['name' => 'Permission access']);
        $permission = Permission::create(['name' => 'Permission edit']);
        $permission = Permission::create(['name' => 'Permission create']);
        $permission = Permission::create(['name' => 'Permission delete']);

       /*** Report Area Permission ***/
       $permission = Permission::create(['name' => 'Member Report']);
       $permission = Permission::create(['name' => 'Loan Report']);
       $permission = Permission::create(['name' => 'Collection Report']);
       $permission = Permission::create(['name' => 'Singal Member Report']);
       $permission = Permission::create(['name' => 'Collection']);
       $permission = Permission::create(['name' => 'Profit & Loss']);
       $permission = Permission::create(['name' => 'Bulk Collection']);

       /*** Button Area & Fileds Area Permission Sets ***/
       $permission = Permission::create(['name' => 'Loan Status Area']);

       $admin->assignRole($admin_role);
       $developer->assignRole($developer_role);

       $exofficers->assignRole($director_role);
       $developer->assignRole($exofficers_role);

       $admin_role->givePermissionTo(Permission::all());
       $developer->givePermissionTo(Permission::all());

    }
}
