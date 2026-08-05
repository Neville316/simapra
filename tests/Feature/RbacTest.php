<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RbacTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\RoleSeeder::class);
    }

    public function test_mahasiswa_tidak_bisa_akses_dashboard_admin(): void
    {
        $mhsRole = Role::where('name', 'mahasiswa')->first();
        $user = User::factory()->create(['role_id' => $mhsRole->id]);

        $response = $this->actingAs($user)->get('/admin/dashboard');

        $response->assertStatus(403); // Forbidden
    }

        public function test_admin_bisa_akses_dashboard_admin(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $user = User::factory()->create(['role_id' => $adminRole->id]);

        $response = $this->actingAs($user)->get('/admin/dashboard');

        $response->assertStatus(200);
        // Ubah teks yang dicari menjadi "Total Mahasiswa"
        $response->assertSeeText('Total Mahasiswa');
    }
}