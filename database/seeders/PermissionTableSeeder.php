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

           'team-list',
           'team-create',
           'team-edit',
           'team-delete',

           'department-list',
           'department-create',
           'department-edit',
           'department-delete',

           'specialitie-list',
           'specialitie-create',
           'specialitie-edit',
           'specialitie-delete',

           'faq-list',
           'faq-create',
           'faq-edit',
           'faq-delete',

           'appointment-list',
           'appointment-edit',
           'appointment-delete',
           
           'testimonial-list',
           'testimonial-create',
           'testimonial-edit',
           'testimonial-delete',

           'blog-list',
           'blog-create',
           'blog-edit',
           'blog-delete',
        ];
        
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
