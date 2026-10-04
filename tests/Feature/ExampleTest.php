<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('flight-journey')
            ->assertSee('flight-aircraft')
            ->assertSee('Gulir untuk memulai perjalanan')
            ->assertSee('hero-visual')
            ->assertSee('Hal kecil yang membuat belanja terasa lebih mudah.')
            ->assertSee('market-stack-section')
            ->assertSee('Belanja mudah,')
            ->assertSee('Gulir untuk melihat pilihan')
            ->assertSee('Layanan')
            ->assertSee('Keunggulan')
            ->assertSee('Tentang Kami')
            ->assertSee('site-footer')
            ->assertSee('primary-navigation');
    }
}
