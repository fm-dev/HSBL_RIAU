<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\datMenuParent;
use App\Models\datMenuChild;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bersihkan data lama
        datMenuParent::truncate();
        datMenuChild::truncate();

        // Create Parent Menus untuk roleId = 1 (Super Admin)
        $masterData1 = datMenuParent::create([
            'labelMenu' => 'Master Data',
            'path' => '#',
            'roleId' => 1,
        ]);

        $admin1 = datMenuParent::create([
            'labelMenu' => 'Admin',
            'path' => '#',
            'roleId' => 1,
        ]);

        $user1 = datMenuParent::create([
            'labelMenu' => 'User',
            'path' => '#',
            'roleId' => 1,
        ]);

        $kompetisi1 = datMenuParent::create([
            'labelMenu' => 'Kompetisi',
            'path' => '#',
            'roleId' => 1,
        ]);

        $events1 = datMenuParent::create([
            'labelMenu' => 'Events',
            'path' => '#',
            'roleId' => 1,
        ]);

        $eventsScore1 = datMenuParent::create([
            'labelMenu' => 'Events Score',
            'path' => '#',
            'roleId' => 1,
        ]);

        // Create Child Menus - Master Data (roleId = 1)
        datMenuChild::create([
            'labelMenu' => 'Manage User Admin',
            'path' => '/admin/manage_admin',
            'parentId' => $masterData1->id,
            'roleId' => 1,
        ]);

        datMenuChild::create([
            'labelMenu' => 'Manage Roles',
            'path' => '/admin/manage_roles',
            'parentId' => $masterData1->id,
            'roleId' => 1,
        ]);

        // Create Child Menus - Admin (roleId = 1)
        datMenuChild::create([
            'labelMenu' => 'Profile Admin',
            'path' => '/portal/admin/profile',
            'parentId' => $admin1->id,
            'roleId' => 1,
        ]);

        datMenuChild::create([
            'labelMenu' => 'Data Admin',
            'path' => '/portal/admin/dataAdmin',
            'parentId' => $admin1->id,
            'roleId' => 1,
        ]);

        // Create Child Menus - User (roleId = 1)
        datMenuChild::create([
            'labelMenu' => 'Data Users',
            'path' => '/portal/admin/useralldata',
            'parentId' => $user1->id,
            'roleId' => 1,
        ]);

        // Create Child Menus - Kompetisi (roleId = 1)
        datMenuChild::create([
            'labelMenu' => 'Team List',
            'path' => '/portal/admin/team/list',
            'parentId' => $kompetisi1->id,
            'roleId' => 1,
        ]);

        // Create Child Menus - Events (roleId = 1)
        datMenuChild::create([
            'labelMenu' => 'Seasons',
            'path' => '/portal/admin/events/listseasons',
            'parentId' => $events1->id,
            'roleId' => 1,
        ]);

        datMenuChild::create([
            'labelMenu' => 'Kompetisi',
            'path' => '/portal/admin/events/listkompetisi',
            'parentId' => $events1->id,
            'roleId' => 1,
        ]);

        datMenuChild::create([
            'labelMenu' => 'Series',
            'path' => '/portal/admin/events/listSeries',
            'parentId' => $events1->id,
            'roleId' => 1,
        ]);

        datMenuChild::create([
            'labelMenu' => 'Sekolah',
            'path' => '/portal/admin/events/listSekolah',
            'parentId' => $events1->id,
            'roleId' => 1,
        ]);

        // Create Child Menus - Events Score (roleId = 1)
        datMenuChild::create([
            'labelMenu' => 'Histori Pertandingan',
            'path' => '/portal/admin/events/listScore',
            'parentId' => $eventsScore1->id,
            'roleId' => 1,
        ]);

        // ===== MENU UNTUK roleId = 2 (Admin) =====
        $masterData2 = datMenuParent::create([
            'labelMenu' => 'Master Data',
            'path' => '#',
            'roleId' => 2,
        ]);

        $admin2 = datMenuParent::create([
            'labelMenu' => 'Admin',
            'path' => '#',
            'roleId' => 2,
        ]);

        $user2 = datMenuParent::create([
            'labelMenu' => 'User',
            'path' => '#',
            'roleId' => 2,
        ]);

        $kompetisi2 = datMenuParent::create([
            'labelMenu' => 'Kompetisi',
            'path' => '#',
            'roleId' => 2,
        ]);

        $events2 = datMenuParent::create([
            'labelMenu' => 'Events',
            'path' => '#',
            'roleId' => 2,
        ]);

        // Child Menus untuk roleId = 2
        datMenuChild::create([
            'labelMenu' => 'Profile Admin',
            'path' => '/portal/admin/profile',
            'parentId' => $admin2->id,
            'roleId' => 2,
        ]);

        datMenuChild::create([
            'labelMenu' => 'Data Admin',
            'path' => '/portal/admin/dataAdmin',
            'parentId' => $admin2->id,
            'roleId' => 2,
        ]);

        datMenuChild::create([
            'labelMenu' => 'Data Users',
            'path' => '/portal/admin/useralldata',
            'parentId' => $user2->id,
            'roleId' => 2,
        ]);

        datMenuChild::create([
            'labelMenu' => 'Team List',
            'path' => '/portal/admin/team/list',
            'parentId' => $kompetisi2->id,
            'roleId' => 2,
        ]);

        datMenuChild::create([
            'labelMenu' => 'Seasons',
            'path' => '/portal/admin/events/listseasons',
            'parentId' => $events2->id,
            'roleId' => 2,
        ]);

        datMenuChild::create([
            'labelMenu' => 'Kompetisi',
            'path' => '/portal/admin/events/listkompetisi',
            'parentId' => $events2->id,
            'roleId' => 2,
        ]);

        datMenuChild::create([
            'labelMenu' => 'Series',
            'path' => '/portal/admin/events/listSeries',
            'parentId' => $events2->id,
            'roleId' => 2,
        ]);

        // ===== MENU UNTUK roleId = 3 (User) =====
        $user3 = datMenuParent::create([
            'labelMenu' => 'User',
            'path' => '#',
            'roleId' => 3,
        ]);

        datMenuChild::create([
            'labelMenu' => 'My Profile',
            'path' => '/myevent',
            'parentId' => $user3->id,
            'roleId' => 3,
        ]);
    }
}
