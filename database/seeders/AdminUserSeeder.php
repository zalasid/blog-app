<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->create([
                'email' => env('ADMIN_EMAIL', 'admin@blog.com'),
                'activated' => 1,
                'is_admin' => 1,
            ]);
    }
}
