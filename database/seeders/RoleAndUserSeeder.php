<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //buat role
        $admin = Role::firstorCreate(['name' => 'admin']);
        $petugas = Role::firstorCreate(['name' => 'petugas']);

        //buat user admin
        $adminUser = User::firstorCreate([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $adminUser->assignRole($admin);

        //buat user petugas
        $petugasUser = User::firstorCreate([
            'name' => 'Petugas',
            'email' => 'petugas@example.com',
            'password' => bcrypt('password'),
        ]);
        $petugasUser->assignRole($petugas);

        $this->command->info('Roles dan users telah dibuat');
    }
}
