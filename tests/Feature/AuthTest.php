<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\RoleSeeder::class);
    }

    public function test_halaman_login_bisa_diakses(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSeeText('SIMAPRA');
    }

    public function test_mahasiswa_bisa_register_dan_mendapat_username(): void
    {
        $response = $this->post('/register', [
            'name' => 'Budi Test',
            'email' => 'budi@test.com',
            'nim' => '1234567890',
            'program_studi' => 'Teknik Informatika',
            'angkatan' => '2023',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHas('registered_username');
        
        $this->assertDatabaseHas('users', ['email' => 'budi@test.com', 'name' => 'Budi Test']);
        $this->assertDatabaseHas('mahasiswa', ['nim' => '1234567890']);
    }

    public function test_user_bisa_login_dan_redirect_sesuai_role(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $user = User::factory()->create(['role_id' => $adminRole->id]);

        $response = $this->post('/login', [
            'username' => $user->username,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/admin/dashboard');
    }
}