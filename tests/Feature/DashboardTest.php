<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_guests_are_redirected_to_login(): void
    {
        $this->get('/dashboard')->assertRedirect('/login');
    }

    public function test_authenticated_user_sees_counts_from_existing_tables(): void
    {
        $user = User::factory()->create(['name' => 'Ana']);
        DB::table('personas')->insert([
            ['nombre' => 'Persona A', 'email' => 'a@example.com'],
            ['nombre' => 'Persona B', 'email' => 'b@example.com'],
            ['nombre' => 'Persona C', 'email' => 'c@example.com'],
        ]);
        DB::table('interes')->insert([
            ['nombre' => 'Lectura'],
            ['nombre' => 'Deporte'],
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertOk()
            ->assertViewHas('totalPersonas', 3)
            ->assertViewHas('totalIntereses', 2)
            ->assertViewHas('totalUsuarios', 1)
            ->assertSee('Ana')
            ->assertSee('Total de Personas')
            ->assertSee('Total de Intereses')
            ->assertSee('Total de Usuarios')
            ->assertSee('Cerrar sesión');
    }

    public function test_dashboard_renders_with_no_people_or_interests(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertOk()
            ->assertViewHas('totalPersonas', 0)
            ->assertViewHas('totalIntereses', 0)
            ->assertViewHas('totalUsuarios', 1);
    }

    public function test_dashboard_escapes_user_name(): void
    {
        $user = User::factory()->create(['name' => '<script>alert(1)</script>']);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;', false)
            ->assertDontSee('<script>alert(1)</script>', false);
    }

    public function test_logout_ends_authenticated_session(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }
}
