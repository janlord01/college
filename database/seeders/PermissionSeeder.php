<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //create permissions


        $arrayOfPermissionNames = [
          
        'college-view-profile','college-create-profile','college-update-profile','college-delete-profile','college-search-profile','college-scanner',

        ];
       $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
           return ['name' => $permission, 'guard_name' => 'web'];
       });

      Permission::insert($permissions->toArray());


        $role = Role::create(['name' => 'college-super-admin'])
            ->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'college-student'])
            ->givePermissionTo(['college-view-profile','college-update-profile']);

        

        $role = Role::create(['name' => 'college-cashier'])
            ->givePermissionTo(['college-view-profile','college-update-profile']);

        $role = Role::create(['name' => 'college-teacher'])
        ->givePermissionTo(['college-view-profile','college-update-profile']);

        $role = Role::create(['name' => 'college-employee'])
        ->givePermissionTo(['college-view-profile','college-update-profile']);

        $role = Role::create(['name' => 'college-registrar'])
        ->givePermissionTo(['college-view-profile','college-update-profile']);

        $role = Role::create(['name' => 'college-parent'])
        
        ->givePermissionTo(['college-view-profile','college-update-profile']);

        $role = Role::create(['name' => 'college-scanner'])
        ->givePermissionTo([
          'college-scanner',
        ]);
    }
}
