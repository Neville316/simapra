<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InstansiCrudTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\RoleSeeder::class);
    }

    public function test_admin_bisa_menambah_data_instansi(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $admin = User::factory()->create(['role_id' => $adminRole->id]);

        $response = $this->actingAs($admin)->post('/admin/instansi', [
            'nama_instansi' => 'PT Test Sukses',
            'kota' => 'Jakarta',
            'bidang_usaha' => 'IT',
            'status_aktif' => 1,
        ]);

        $response->assertRedirect('/admin/instansi');
        $this->assertDatabaseHas('instansi', ['nama_instansi' => 'PT Test Sukses']);
    }
}