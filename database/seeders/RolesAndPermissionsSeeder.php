<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create system parameters']);
        Permission::create(['name' => 'edit system parameters']);
        Permission::create(['name' => 'view system parameters']);
        Permission::create(['name' => 'delete system parameters']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'ADMIN'])->givePermissionTo(Permission::all());
        $role = Role::create(['name' => 'Eksekutif'])->givePermissionTo(Permission::all());
        $role = Role::create(['name' => 'Pengguna PBT'])->givePermissionTo(Permission::all());

        User::create(
            [
                'name' => 'SYAIDAHTUL BADRIYAH AZIZ',
                'identity_no' => '910521615020',
                'email' => 'syaidahtul.aziz@sabah.gov.my',
                'password' => Hash::make('accteam01'),
                'current_pbt' => 'KKTP',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        )->assignRole('ADMIN');

        User::create(
            [
                'name' => 'NANCY D LOJIUM',
                'identity_no' => '641206125440',
                'email' => 'NancyD.Lojium@sabah.gov.my',
                'password' => Hash::make('accteam01'),
                'current_pbt' => 'KKTP',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        )->assignRole('Eksekutif');
    }
}