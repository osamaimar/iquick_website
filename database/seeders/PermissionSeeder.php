<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $permissions = [
            'theme-list',
            'roles',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            
            'packages',
            'package-list',
            'package-create',
            'package-edit',
            'package-delete',
            'package-deleteService',
            'package-getService',
           
            'services',
            'service-list',
            'service-create',
            'service-edit',
            'service-delete',
            
            'abouts',
            'about-list',
            'about-create',
            'about-edit',
            
            'assignedtasks',
            'assignedtask-list',
            'assignedtask-create',
            'assignedtask-delete',
            'assignedtask-allAssign',
            
            'calendar',
            'calendar-list',
            'calendar-create',
            'calendar-edit',
            'calendar-delete',
            'calendar-export',
            
            'status',
            'status-list',
            'status-create',
            'status-edit',
            'status-delete',
            'status-effective',
            
            'contacts',
            'contact-list',
            'contact-create',
            'contact-delete',
            
            'email',
            'emailTo-create',
            
            'events',
            'event-list',
            'event-create',
            'event-edit',
            'event-delete',
            'event-export',
            
            'orders',
            'order-list',
            'order-create',
            'order-edit',
            'order-delete',
            'order-listOrder',
            'order-export',
            'order-listOrderExport',
            'packageArchive-create',
            'order-show',
            
            'pages',
            'page-list',
            'page-create',
            'page-edit',
            'page-delete',

            'sliders',
            'slider-list',
            'slider-create',
            'slider-edit',
            'slider-delete',
            
            'profiles',
            'profile-list',
            'profile-create',
            'profile-edit',
            'profile-delete',
            'profile-storeAttach',
            'profile-getorderUser',
            'profile-profileExport',
            
            'settings',
            'setting-list',
            'setting-create',
            'setting-edit',
            
            'users',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-getProfileUser',
            'user-getOrderUser',
            'user-getProfileHistory',
            'user-changeUserStatus',
            'user-orderToUser',
            'user-export',
          
            'download',
            'download-file',
            
            'order_stocks',
            'stock-list',
            'stock-delete',
           
            'attachments',
            'attachment-list',
            'attachment-create',
            'attachment-edit',
            'attachment-delete',
           
            'sections',
            'section-list',
            'section-create',
            'section-edit',
            'section-delete',
            
            'chat',
            'chat-list',
            'chat-chatReply',
            
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
            
       }
    }
}