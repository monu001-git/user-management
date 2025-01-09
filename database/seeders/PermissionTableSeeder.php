<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',

           'menu-list',
           'menu-create',
           'menu-edit',
           'menu-delete',

           'banner-list',
           'banner-create',
           'banner-edit',
           'banner-delete',

           'org-list',
           'org-create',
           'org-edit',
           'org-delete',

           'content-list',
           'content-create',
           'content-edit',
           'content-delete',

           'gallery-list',
           'gallery-create',
           'gallery-edit',
           'gallery-delete',
        ];
        
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
