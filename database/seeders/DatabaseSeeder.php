<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(2)->create();
        // $this->call(BrandSeeder::class);
        // $this->call(KategoriSeeder::class);
        // $this->call(SatuanSeeder::class);

        // Role And Permission Seeder di Render terlebih dahulu agar user seeder tidak ada error
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(UserSeeder::class);
    }
}