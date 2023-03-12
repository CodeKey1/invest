<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        //site permissions
        $arrayOfPermissionsNames =[
            'investment.create','investment.edit','investment.index',
            'import.create','import.index','import.edit','home',
            'export.create','export.index','export.edit','other.search',
            'auction.create','auction.index','auction.edit','report.report',
            'roles.create','roles.index','roles.edit',
            'section.create','section.index','section.edit',
            'side.create','side.index','side.edit',
            'user.create','user.index','user.edit',

        ];
        $permissions = collect($arrayOfPermissionsNames)->map(function($permissions){
            return ['name'=>$permissions , 'guard_name'=>'web'];
        });
        Permission :: insert ($permissions->toArray());
        $role = Role::create(['name'=>'super_admin'])
        ->givePermissionTo($arrayOfPermissionsNames);
    }
}
