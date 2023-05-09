<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Seeders\TestSeeder;


class CommentTest extends TestCase
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
        $response = $this->postJson('/api/comment');

        $response->assertStatus(401);
    }

    /**
     * Test create comment.
     */
    public function test_create_comment(): void
    {
        $headers = $this->getHeaders('userfst@vk.ru', 'pass');
        $response = $this->withHeaders($headers)->postJson('/api/comment', ['text' => 'New comment']);
        $response->assertStatus(200);
        $ret = $response->getData()?->data?->id;
        $this->assertEquals(6, $ret);
    }

    /**
     * Test contains in comment.
     */
    public function test_contains_comment(): void
    {
        $url = '/api/comment';
        $text = 'New comment';
        $headers = $this->getHeaders('userfst@vk.ru', 'pass');
        $response = $this->withHeaders($headers)->postJson($url, ['text' => $text,]);
        $response->assertStatus(200);
        $id = $response->getData()?->data?->id;
        $response = $this->withHeaders($headers)->getJson($url . '/' . $id);
        $response->assertStatus(200);
        $retText = $response->getData()?->data?->text;
        $this->assertEquals($text, $retText);
    }

    /**
     * Test upate comment.
     */
    public function test_update_comment(): void
    {
        $headers = $this->getHeaders('userfst@vk.ru', 'pass');
        $text = 'New comment';
        $response = $this->withHeaders($headers)->postJson('/api/comment', ['text' => $text,]);
        $response->assertStatus(200);
        $id = $response->getData()?->data?->id;
        $newText = 'New text yes';
        $response = $this->withHeaders($headers)->putJson('/api/comment/' . $id, ['text' => $newText]);
        $response->assertStatus(200);
        $id = $response->getData()?->data?->id;
        $response = $this->withHeaders($headers)->getJson('/api/comment/' . $id);
        $response->assertStatus(200);
        $retText = $response->getData()?->data?->text;
        $this->assertEquals($newText, $retText);
    }

    /**
     * Test delete comment.
     */
    public function test_delete_comment(): void
    {
        $headers = $this->getHeaders('userfst@vk.ru', 'pass');
        $response = $this->withHeaders($headers)->deleteJson('/api/comment/' . 1);
        $response->assertStatus(200);
        $response = $this->withHeaders($headers)->deleteJson('/api/comment/' . 2);
        $response->assertStatus(200);
        $response = $this->withHeaders($headers)->deleteJson('/api/comment/' . 200);
        $response->assertStatus(404);
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
