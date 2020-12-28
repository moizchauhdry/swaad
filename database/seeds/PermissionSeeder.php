<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Permission;
use App\AdminPermission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            ['name'=>'Manage Admin Users',
            'slug'=>'manage-admin-users',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            ],
            ['name'=>'Manage Customers',
            'slug'=>'manage-customers',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            ],
            ['name'=>'Manage Categories',
            'slug'=>'manage-categories',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            ],
            ['name'=>'Manage Products',
            'slug'=>'manage-products',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            ],
            ['name'=>'Manage Orders',
            'slug'=>'manage-orders',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            ],
        ]);

        for ($i=1; $i <= 5 ; $i++) { 
            AdminPermission::insert([
                ['admin_id'=>'1',
                'permission_id'=>$i,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
                ],
            ]);
        }
    }
}
