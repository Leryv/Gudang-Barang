<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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

        $user = User::factory()->create([
            'name' => 'Black',
            'email' => 'black@gudang.com',
            'password' => bcrypt('gudang')
        ]);
        $user->assignRole('gudang');
        $this->command->newLine();
        $this->command->info('This Your Detail Login Or You Can Check At UserSeeder.php');
        $this->command->warn($user->email);
        $this->command->warn('Password is "gudang"');
        $this->command->newLine();


        $user = User::factory()->create([
            'name' => 'Lynn',
            'email' => 'lynn@penjual.com',
            'password' => bcrypt('penjual')
        ]);
        $user->assignRole('penjual');
        $this->command->newLine();
        $this->command->info('This Your Detail Login Or You Can Check At UserSeeder.php');
        $this->command->warn($user->email);
        $this->command->warn('Password is "penjual"');
        $this->command->newLine();

        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@superadmin.com',
            'password' => bcrypt('superadmin')
        ]);
        $user->assignRole('Super-Admin');
        $this->command->newLine();
        $this->command->info('This Your Detail Login Or You Can Check At UserSeeder.php');
        $this->command->warn($user->email);
        $this->command->warn('Password is "superadmin"');
        $this->command->newLine();

    }
}