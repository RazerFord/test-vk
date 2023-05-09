<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestSeeder extends Seeder
{
    /**
     * Test seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create($this->userFst());
        \App\Models\User::factory()->create($this->userSnd());
        \App\Models\User::factory()->create($this->userTrd());

        \App\Models\Comment::factory()->create($this->messFst());
        \App\Models\Comment::factory()->create($this->messSnd());
        \App\Models\Comment::factory()->create($this->messTrd());
        \App\Models\Comment::factory()->create($this->messFth());
        \App\Models\Comment::factory()->create($this->messFifth());
    }
    private function userFst(): array
    {
        return [
            'name' => 'userfst',
            'email' => 'userfst@vk.ru',
            'password' => Hash::make('pass'),
        ];
    }
    private function userSnd(): array
    {
        return [
            'name' => 'usersnd',
            'email' => 'usersnd@vk.ru',
            'password' => Hash::make('pass'),
        ];
    }
    private function userTrd(): array
    {
        return [
            'name' => 'usertrd',
            'email' => 'usertrd@vk.ru',
            'password' => Hash::make('pass'),
        ];
    }

    private function messFst(): array
    {
        return [
            'text' => 'First message',
            'parent_comment_id' => null,
            'user_id' => 1
        ];
    }

    private function messSnd(): array
    {
        return [
            'text' => 'Second message',
            'parent_comment_id' => 1,
            'user_id' => 2
        ];
    }

    private function messTrd(): array
    {
        return [
            'text' => 'Third message',
            'parent_comment_id' => 2,
            'user_id' => 3
        ];
    }

    private function messFth(): array
    {
        return [
            'text' => 'Fourth text',
            'parent_comment_id' => 3,
            'user_id' => 1
        ];
    }

    private function messFifth(): array
    {
        return [
            'text' => 'Fifth text',
            'parent_comment_id' => 4,
            'user_id' => 1
        ];
    }
}
