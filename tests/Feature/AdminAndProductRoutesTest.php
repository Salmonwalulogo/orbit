<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAndProductRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_dashboard_route_is_available(): void
    {
        $admin = User::factory()->create();
        $admin->forceFill(['role' => 'admin'])->save();

        $this->actingAs($admin)
            ->get('/admin/dashboard')
            ->assertOk()
            ->assertSee('css/admin.css')
            ->assertSee('admin-hero-cube')
            ->assertSee('admin-stat-card');
    }

    public function test_product_can_be_created_with_empty_description(): void
    {
        $admin = User::factory()->create();
        $admin->forceFill(['role' => 'admin'])->save();

        $response = $this->actingAs($admin)->post('/products', [
            'name' => 'Laptop',
            'category' => 'Elektronik',
            'description' => '',
            'price' => 2500000,
            'stock' => 10,
            'is_active' => 1,
        ]);

        $response->assertRedirect('/products');
        $this->assertDatabaseHas('products', [
            'name' => 'Laptop',
        ]);
    }

    public function test_non_admin_cannot_manage_products(): void
    {
        $customer = User::factory()->create();
        $customer->forceFill(['role' => 'customer'])->save();

        $this->actingAs($customer)
            ->get('/products')
            ->assertForbidden();
    }

    public function test_cashier_cannot_access_admin_routes(): void
    {
        $cashier = User::factory()->create();
        $cashier->forceFill(['role' => 'cashier'])->save();

        $this->actingAs($cashier)
            ->get('/admin/dashboard')
            ->assertForbidden();

        $this->get('/admin/users')->assertForbidden();
        $this->get('/admin/data')->assertForbidden();
        $this->get('/admin/settings')->assertForbidden();
        $this->get('/products')->assertForbidden();
    }
}
