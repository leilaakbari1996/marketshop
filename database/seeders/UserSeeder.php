<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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
        $adminUser = User::query()->create([
            'email' => 'leila.akbari1996@gmail.com',
            'password' => bcrypt('leila'),
            'role_id' => Role::findByTitle('admin')->id
        ]);
    }
}
