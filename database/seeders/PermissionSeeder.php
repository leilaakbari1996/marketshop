<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Categories Permissions */
        Permission::query()->insert([[
            'title' => 'read-category',
            'lable' => 'مشاهده دسته بندی'
        ],[
            'title' => 'update-category',
            'lable' => 'ویرایش دسته بندی'
        ],[
            'title' => 'delete-category',
            'lable' => 'حذف دسته بندی'
        ],[
            'title' => 'create-category',
            'lable' => 'ایجاد دسته بندی'
        ]]
        );
        /* Brands Permissions */
        Permission::query()->insert([[
            'title' => 'read-brand',
            'lable' => 'مشاهده برند'
        ],[
            'title' => 'update-brand',
            'lable' => 'ویرایش برند'
        ],[
            'title' => 'delete-brand',
            'lable' => 'حذف برند'
        ],[
            'title' => 'create-brand',
            'lable' => 'ایجاد برند'
        ]]
        );
         /* offers Permissions */
         Permission::query()->insert([[
            'title' => 'read-offer',
            'lable' => 'مشاهده تخفیف'
        ],[
            'title' => 'update-offer',
            'lable' => 'ویرایش تخفیف'
        ],[
            'title' => 'delete-offer',
            'lable' => 'حذف تخفیف'
        ],[
            'title' => 'create-offer',
            'lable' => 'ایجاد تخفیف'
        ]]
        );
        /* products Permissions */
        Permission::query()->insert([[
            'title' => 'read-product',
            'lable' => 'مشاهده محصول'
        ],[
            'title' => 'update-product',
            'lable' => 'ویرایش محصول'
        ],[
            'title' => 'delete-product',
            'lable' => 'حذف محصول'
        ],[
            'title' => 'create-product',
            'lable' => 'ایجاد محصول'
        ]]
        );

         /* roles Permissions */
        Permission::query()->insert([[
            'title' => 'read-role',
            'lable' => 'مشاهده نقش'
        ],[
            'title' => 'update-role',
            'lable' => 'ویرایش نقش'
        ],[
            'title' => 'delete-role',
            'lable' => 'حذف نقش'
        ],[
            'title' => 'create-role',
            'lable' => 'ایجاد نقش'
        ]]
        );
        /* pictures Permissions */
        Permission::query()->insert([[
            'title' => 'read-picture',
            'lable' => 'مشاهده گالری'
        ],[
            'title' => 'update-picture',
            'lable' => 'ویرایش گالری'
        ],[
            'title' => 'delete-picture',
            'lable' => 'حذف گالری'
        ],[
            'title' => 'create-picture',
            'lable' => 'ایجاد گالری'
        ]
        ]);
        /* discount Permissions */
        Permission::query()->insert([[
            'title' => 'read-discount',
            'lable' => 'مشاهده کد تخفیف'
        ],[
            'title' => 'update-discount',
            'lable' => 'ویرایش کد تخفیف'
        ],[
            'title' => 'delete-discount',
            'lable' => 'حذف کد تخفیف'
        ],[
            'title' => 'create-discount',
            'lable' => 'ایجاد کد تخفیف'
        ]
        ]);
         /* view-dashbord Permissions */
         Permission::query()->insert([
            'title' => 'read-view-dashbord',
            'lable' => 'مشاهده پنل مدیریت'
         ]);
         Permission::query()->insert([
             'title' => 'suported',
             'lable' => 'پشتیبان سایت'
         ]);
    }
}
