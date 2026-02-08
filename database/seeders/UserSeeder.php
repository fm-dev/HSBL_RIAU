<?php

namespace Database\Seeders;

use App\Models\datrefrole;
use App\Models\datuser;
use App\Models\datWilayah;
use App\Models\datMenuParent;
use App\Models\datMenuChild;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        datrefrole::create([
            'nama_role' => "Super Admin",
            'createdby' => "AUTO",
            'modby' => "AUTO",
        ]);
        datrefrole::create([
            'nama_role' => "Admin",
            'createdby' => "AUTO",
            'modby' => "AUTO",
        ]);
        datrefrole::create([
            'nama_role' => "User",
            'createdby' => "AUTO",
            'modby' => "AUTO",
        ]);
        datuser::create([
            'username' => 'admin',
            'password' => bcrypt('password123'),
            'email' => 'admin@example.com',
            'phone' => '123456789',
            'role' => 1,
            'status' => 'active',
            'alamat' => 'Jl. Admin No.1',
            'createdby' => 1,
        ]);
        datuser::create([
            'username' => 'AdminPekanbaru',
            'password' => bcrypt('password123'),
            'email' => 'admin@example.com',
            'phone' => '123456789',
            'role' => 2,
            'status' => 'active',
            'alamat' => 'Jl. Pekanbaru No.1',
            'wilayah' => 1,
            'createdby' => 1,
        ]);
        datuser::create([
            'username' => 'UserPekanbaru',
            'password' => bcrypt('password123'),
            'email' => 'admin@example.com',
            'phone' => '123456789',
            'role' => 3,
            'status' => 'active',
            'alamat' => 'Jl. Pekanbaru No.1',
            'wilayah' => 1,
            'createdby' => 1,
        ]);
        datWilayah::create([
            'namaWilayah' => 'Pekanbaru',
        ]);
        datWilayah::create([
            'namaWilayah' => 'Dumai',
        ]);
        datMenuParent::create([
            'labelMenu' => "Managed User Admin",
            'path' => "/dataAdmin/list",
            'roleId' => 1
        ]);
        datMenuParent::create([
            'labelMenu' => "Master Data",
            'path' => "",
            'roleId' => 1
        ]);
        datMenuChild::create([
            'labelMenu' => "Data Wilayah",
            'path' => "/listDataWilayah/list",
            'parentId' => 2,
            'roleId' => 2
        ]);
        datMenuParent::create([
            'labelMenu' => "Managed user",
            'path' => "/dataUser/list",
            'roleId' => 2
        ]);
        
    }
}
