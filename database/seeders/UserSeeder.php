<?php

namespace Database\Seeders;

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
            'name' => 'admin User',
            'email' => 'leila.akbari1996@gmail.com',
            'password' => bcrypt('leila')
        ]);
    }
}
