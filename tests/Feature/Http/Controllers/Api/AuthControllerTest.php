<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    public function test_register_creates_user_and_returns_201_with_token(): void
    {
        $payload = [
            'name' => 'Mahyar',
            'email' => 'mahyar@example.com',
            'password' => 'password123',
        ];

        $response = $this->postJson('/api/register', $payload);

        $response->assertCreated()
            ->assertJsonPath('user.email', 'mahyar@example.com')
            ->assertJsonStructure(['user' => ['id', 'name', 'email'], 'token']);

        $this->assertDatabaseHas('users', ['email' => 'mahyar@example.com']);
        $this->assertTrue(Hash::check('password123', User::where('email', 'mahyar@example.com')->firstOrFail()->password));
    }

    public function test_register_rejects_duplicate_email_with_422(): void
    {
        User::factory()->create(['email' => 'taken@example.com']);

        $response = $this->postJson('/api/register', [
            'name' => 'Another',
            'email' => 'taken@example.com',
            'password' => 'password123',
        ]);

        $response->assertUnprocessable()->assertJsonValidationErrors('email');
    }

    public function test_login_returns_token_for_valid_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'composer@example.com',
            'password' => 'secret1234',
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'composer@example.com',
            'password' => 'secret1234',
        ]);

        $response->assertOk()
            ->assertJsonPath('user.id', $user->id)
            ->assertJsonStructure(['token']);
    }

    public function test_login_returns_422_for_incorrect_password(): void
    {
        User::factory()->create([
            'email' => 'wrong@example.com',
            'password' => 'correct-password',
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'wrong@example.com',
            'password' => 'bad-password',
        ]);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors('email');
    }

    public function test_logout_revokes_the_current_token(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('test-token');

        $response = $this->withToken($token->plainTextToken)->postJson('/api/logout');

        $response->assertNoContent();
        $this->assertDatabaseCount('personal_access_tokens', 0);
    }

    public function test_protected_routes_return_401_without_a_token(): void
    {
        $this->getJson('/api/categories')->assertUnauthorized();
        $this->getJson('/api/tasks')->assertUnauthorized();
    }

    public function test_protected_routes_return_401_even_without_a_json_accept_header(): void
    {
        $this->get('/api/categories')->assertUnauthorized();
    }
}
