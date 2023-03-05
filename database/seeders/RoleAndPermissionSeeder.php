<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create stock barang']);

        Permission::create(['name' => 'edit brands']);
        Permission::create(['name' => 'delete brands']);
        Permission::create(['name' => 'create brands']);

        Permission::create(['name' => 'edit kategoris']);
        Permission::create(['name' => 'delete kategoris']);
        Permission::create(['name' => 'create kategoris']);

        Permission::create(['name' => 'edit satuans']);
        Permission::create(['name' => 'delete satuans']);
        Permission::create(['name' => 'create satuans']);

        Permission::create(['name' => 'approve transaksis']);
        Permission::create(['name' => 'delete transaksis']);
        Permission::create(['name' => 'create permintaan stock']);



        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'gudang']);
        $role1->givePermissionTo('edit brands', 'edit kategoris', 'edit satuans');
        $role1->givePermissionTo('delete brands', 'delete kategoris', 'delete satuans');
        $role1->givePermissionTo('create brands', 'create kategoris', 'create satuans', 'create stock barang');
        $role1->givePermissionTo('approve transaksis');

        $role2 = Role::create(['name' => 'penjual']);
        $role2->givePermissionTo('create permintaan stock');
        $role2->givePermissionTo('delete transaksis');

        // gets all permissions via Gate::before rule; see AuthServiceProvider
        $role3 = Role::create(['name' => 'Super-Admin']);
        $role3->givePermissionTo(Permission::all());



    }
}