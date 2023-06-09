<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Seeders\TestSeeder;


class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;
    /**
     * Run a specific seeder before each test.
     *
     * @var string
     */
    protected $seeder = TestSeeder::class;

    /**
     * Test fail auth user.
     */
    public function test_query(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => 'fail@vk.ru',
            'password' => 'pass'
        ]);

        $response->assertStatus(401);
    }

    /**
     * Test success auth user.
     */
    public function test_auth_user(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => 'userfst@vk.ru',
            'password' => 'pass'
        ]);
        $response->assertStatus(200);
    }

    /**
     * Test register and auth user.
     */
    public function test_auth_register_and_auth(): void
    {
        $response = $this->postJson('/api/register', [
            'name' => 'new',
            'email' => 'new@vk.ru',
            'password' => 'pass'
        ]);
        $response->assertStatus(200);
        $headers = $this->getHeaders('new@vk.ru', 'pass');
        $response = $this->withHeaders($headers)->get('/api/me');
        $response->assertStatus(200);
    }

    /**
     * Test log out user.
     */
    public function test_log_out_user(): void
    {
        $headers = $this->getHeaders('userfst@vk.ru', 'pass');
        $response = $this->withHeaders($headers)->getJson('/api/logout');
        $response->assertStatus(200);
        $response = $this->withHeaders($headers)->getJson('/api/me');
        $response->assertStatus(401);
    }

    private function getHeaders(string $email, string $pass): array
    {
        return ['Authorization' => 'Bearer ' . $this->getToken($email, $pass),];
    }

    private function getToken(string $email, string $pass): string | null
    {
        $response = $this->postJson('/api/login', [
            'email' => $email,
            'password' => $pass,
        ]);
        $response->assertStatus(200);
        return $response->getData()?->data?->access_token;
    }
}
