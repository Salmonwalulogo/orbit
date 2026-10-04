<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CashierAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_sent_to_login_before_opening_cashier(): void
    {
        $this->get(route('cashier.index'))
            ->assertRedirect(route('login'));
    }

    public function test_customer_cannot_open_cashier(): void
    {
        $customer = User::factory()->create();

        $this->actingAs($customer)
            ->get(route('cashier.index'))
            ->assertForbidden();
    }

    public function test_cashier_can_open_cashier(): void
    {
        $cashier = User::factory()->create();
        $cashier->forceFill(['role' => 'cashier'])->save();

        $this->actingAs($cashier)
            ->get(route('cashier.index'))
            ->assertOk();
    }

    public function test_admin_cannot_access_cashier_routes(): void
    {
        $admin = User::factory()->create();
        $admin->forceFill(['role' => 'admin'])->save();

        $this->actingAs($admin)
            ->get(route('cashier.index'))
            ->assertForbidden()
            ->assertSee('Akses tidak diizinkan')
            ->assertSee('cube-wrap');

        $this->post(route('cashier.store'), [])
            ->assertForbidden();
    }

    public function test_cashier_is_redirected_to_cashier_after_login(): void
    {
        $cashier = User::factory()->create([
            'password' => 'password',
        ]);
        $cashier->forceFill(['role' => 'cashier'])->save();

        $this->post(route('login'), [
            'email' => $cashier->email,
            'password' => 'password',
        ])->assertRedirect(route('cashier.index'));
    }
}
