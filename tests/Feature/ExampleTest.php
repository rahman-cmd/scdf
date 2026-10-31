<?php

namespace Tests\Feature;

use App\Models\Donation;
use App\Models\User;
use Database\Seeders\SiteContentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(SiteContentSeeder::class);
    }

    public function test_the_landing_page_renders(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Building Resilient');
        $response->assertSee('Support SCDF');
        $response->assertSee('images/scdf.png', false);
        $response->assertSee('images/logo_w.png', false);
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
            'amount' => 500,
            'payment_method' => 'bkash',
            'transaction_id' => '8N7A2XYZ1',
        ]);

        $response->assertRedirect(route('home').'#donate');
        $response->assertSessionHas('status');
        $this->assertDatabaseHas('donations', [
            'email' => 'amina@example.com',
            'amount' => 500,
            'payment_method' => 'bkash',
            'transaction_id' => '8N7A2XYZ1',
            'currency' => 'BDT',
            'status' => 'new',
        ]);
        $this->assertSame(1, Donation::query()->count());
    }

    public function test_donation_requires_a_valid_email(): void
    {
        $response = $this->post('/donate', [
            'name' => 'Amina Rahman',
            'email' => 'not-an-email',
            'amount' => 500,
            'payment_method' => 'bkash',
            'transaction_id' => '8N7A2XYZ1',
        ]);

        $response->assertRedirect(route('home').'#donate');
        $response->assertSessionHasErrors('email');
    }

    public function test_donation_requires_a_payment_method_and_trx_id(): void
    {
        $response = $this->post('/donate', [
            'name' => 'Amina Rahman',
            'email' => 'amina@example.com',
            'amount' => 500,
        ]);

        $response->assertRedirect(route('home').'#donate');
        $response->assertSessionHasErrors(['payment_method', 'transaction_id']);
    }

    public function test_admin_panel_redirects_guests_to_login(): void
    {
        $response = $this->get('/admin');

        $response->assertRedirect('/admin/login');
    }

    public function test_admin_user_can_open_the_dashboard(): void
    {
        $user = User::query()->where('email', 'admin@scdf-bd.org')->firstOrFail();

        $response = $this->actingAs($user)->get('/admin');

        $response->assertOk();
    }
}
