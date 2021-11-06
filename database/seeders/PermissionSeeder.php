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
            'title' => 'update-category',
            'lable' => 'ویرایش دسته بندی'
        ],[
            'title' => 'delete-category',
            'lable' => 'حذف دسته بندی'
        ],[
            'title' => 'create-category',
            'lable' => 'ایجاد دسته بندی'
        ],[
            'title' => 'select-category-special',
            'lable' => 'انتخاب دسته بندی ویژه'
        ]]
        );
        /* Brands Permissions */
        Permission::query()->insert([[
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
            'title' => 'update-product',
            'lable' => 'ویرایش محصول'
        ],[
            'title' => 'delete-product',
            'lable' => 'حذف محصول'
        ],[
            'title' => 'create-product',
            'lable' => 'ایجاد محصول'
        ],[
            'title' => 'select-products-special',
            'lable' => 'انتخاب محصولات ویژه'
        ],[
            'title' => 'select-products-propesal',
            'lable' => 'انتخاب محصولات پیشنهادی'
        ]]
        );
        /**Offer Product Permissions */
        Permission::query()->insert([[
            'title' => 'update-offer',
            'lable' => 'ویرایش تخفیف محصول'
        ],[
            'title' => 'delete-offer',
            'lable' => 'حذف تخفیف محصول'
        ],[
            'title' => 'create-offer',
            'lable' => 'ایجاد تخفیف محصول'
        ]]);
        /*PropertyGroup Permissions */
        Permission::query()->insert([[
            'title' => 'update-property-group',
            'lable' => 'ویرایش گروه ویژگی'
        ],[
            'title' => 'delete-property-group',
            'lable' => 'حذف گروه ویژگی'
        ],[
            'title' => 'create-property-group',
            'lable' => 'ایجاد گروه ویژگی'
        ]
        ]);
        /*Property Permissions */
        Permission::query()->insert([[
            'title' => 'update-property',
            'lable' => 'ویرایش ویژگی'
        ],[
            'title' => 'delete-property',
            'lable' => 'حذف ویژگی'
        ],[
            'title' => 'create-property',
            'lable' => 'ایجاد ویژگی'
        ]
        ]);
        /*slider Permissions */
        Permission::query()->insert([[
            'title' => 'update-slider',
            'lable' => 'ویرایش اسلایدر'
        ],[
            'title' => 'delete-slider',
            'lable' => 'حذف اسلایدر'
        ],[
            'title' => 'create-slider',
            'lable' => 'ایجاد اسلایدر'
        ]
        ]);
         /*user Permissions */
         Permission::query()->insert([[
            'title' => 'read-user',
            'lable' => 'مشاهده کاربران'
        ]
             ,[
            'title' => 'update-user',
            'lable' => 'ویرایش نقش کاربر'
        ],[
            'title' => 'delete-user',
            'lable' => 'حذف کاربر'
        ]
        ]);
        /*comment Permissions */
        Permission::query()->insert([
            'title' => 'comment-suported',
            'lable' => 'پشتیبانی کامنت ها'
        ]
        );
        /* pictures Permissions */
        Permission::query()->insert([[
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
        /* discount Permissions */
        Permission::query()->insert([[
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
