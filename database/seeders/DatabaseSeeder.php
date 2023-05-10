<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        $this->repeatFactory(10, function () {
            \App\Models\Comment::factory(1)->create();
        });
        \App\Models\User::factory(1)->create([
            'name' => 'test',
            'email' => 'test@vk.ru',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
            'token' => Str::random(100),
        ]);
    }

    public function repeatFactory(int $count, callable $func)
    {
        for ($i = 0; $i < $count; $i++) {
            $func();
        }
    }
}
