<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
    }

    public function repeatFactory(int $count, callable $func)
    {
        for ($i = 0; $i < $count; $i++) {
            $func();
        }
    }
}
