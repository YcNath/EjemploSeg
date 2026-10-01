<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_registration_form_renders_for_guests(): void
    {
        $this->get('/register')->assertSee('Crear cuenta')->assertSee('name="password_confirmation"', false);
    }

    public function test_login_form_renders_for_guests(): void
    {
        $this->get('/login')->assertSee('Iniciar sesión')->assertSee('name="password"', false);
    }

    public function test_registration_creates_user_with_hashed_password_and_authenticates(): void
    {
        $response = $this->post('/register', [
            'name' => 'Ana',
            'email' => 'ana@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasNoErrors()->assertRedirect('/dashboard');
        $this->assertDatabaseHas('users', ['name' => 'Ana', 'email' => 'ana@example.com']);
        $user = User::where('email', 'ana@example.com')->firstOrFail();
        $this->assertTrue(Hash::check('password123', $user->password));
        $this->assertAuthenticatedAs($user);
        $this->get('/dashboard')->assertOk()->assertSee('Ana');
    }

    /** @param array<string, mixed> $changes */
    #[DataProvider('invalidRegistrationData')]
    public function test_invalid_registration_does_not_create_user(array $changes, string $field): void
    {
        $input = array_replace([
            'name' => 'Ana',
            'email' => 'ana@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ], $changes);

        $response = $this->from('/register')->post('/register', $input);

        $response->assertRedirect('/register')->assertSessionHasErrors($field);
        $this->assertDatabaseCount('users', 0);
        $this->assertGuest();
    }

    public static function invalidRegistrationData(): array
    {
        return [
            'missing name' => [['name' => ''], 'name'],
            'non-string name' => [['name' => ['Ana']], 'name'],
            'long name' => [['name' => str_repeat('a', 256)], 'name'],
            'missing email' => [['email' => ''], 'email'],
            'invalid email' => [['email' => 'invalid'], 'email'],
            'non-string email' => [['email' => ['ana@example.com']], 'email'],
            'long email' => [['email' => str_repeat('a', 245).'@example.com'], 'email'],
            'missing password' => [['password' => ''], 'password'],
            'non-string password' => [['password' => ['password123']], 'password'],
            'short password' => [['password' => 'short', 'password_confirmation' => 'short'], 'password'],
            'confirmation mismatch' => [['password_confirmation' => 'different'], 'password'],
        ];
    }

    public function test_duplicate_email_is_rejected(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/register', [
            'name' => 'Ana',
            'email' => $user->email,
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertDatabaseCount('users', 1);
        $this->assertGuest();
    }

    public function test_valid_credentials_authenticate_user(): void
    {
        $user = User::factory()->create(['password' => Hash::make('password123')]);

        $response = $this->post('/login', ['email' => $user->email, 'password' => 'password123']);

        $response->assertSessionHasNoErrors()->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_wrong_password_is_rejected(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', ['email' => $user->email, 'password' => 'wrong-password']);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_registration_escapes_old_input(): void
    {
        $this->withSession(['_old_input' => ['name' => '"><script>alert(1)</script>']])
            ->get('/register')
            ->assertSee('&quot;&gt;&lt;script&gt;alert(1)&lt;/script&gt;', false)
            ->assertDontSee('<script>alert(1)</script>', false);
    }
}
