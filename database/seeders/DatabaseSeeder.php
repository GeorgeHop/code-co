<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'root',
            'email' => 'root@root.root',
            'email_verified_at' => now(),
            'password' => Hash::make('root'),
            'is_admin' => true,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
