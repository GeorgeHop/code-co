<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => 'test@test.test',
            'is_admin' => true,
        ]);
        User::factory()->count(20)->create();
        Post::factory()->count(20)->create();
        Course::factory()->count(5)->create();
    }
}
