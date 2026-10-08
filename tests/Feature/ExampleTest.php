<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_the_landing_page_renders(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Building Resilient');
        $response->assertSee('Support SCDF');
        $response->assertSee('fa-solid', false);
        $response->assertSee('<link rel="canonical" href="https://scdf-bd.org/">', false);
        $response->assertSee('Non-profit foundation in coastal Bangladesh', false);
        $response->assertSee('application/ld+json', false);
    }

    public function test_sitemap_lists_the_homepage(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertOk();
        $response->assertHeader('Content-Type', 'application/xml');
        $response->assertSee('https://scdf-bd.org/', false);
    }

    public function test_donation_demo_confirms_the_gift(): void
    {
        $response = $this->post('/donate', [
            'name' => 'Amina Rahman',
            'email' => 'amina@example.com',
            'amount' => 25,
        ]);

        $response->assertRedirect(route('home').'#donate');
        $response->assertSessionHas('status');
    }

    public function test_donation_requires_a_valid_email(): void
    {
        $response = $this->post('/donate', [
            'name' => 'Amina Rahman',
            'email' => 'not-an-email',
            'amount' => 10,
        ]);

        $response->assertRedirect(route('home').'#donate');
        $response->assertSessionHasErrors('email');
    }
}
