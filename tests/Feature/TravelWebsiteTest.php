<?php

namespace Tests\Feature;

use App\Models\BookingInquiry;
use App\Models\ContactMessage;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TravelWebsiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_and_tour_listing_are_available(): void
    {
        $tour = $this->createTour();

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Uganda is')
            ->assertSee($tour->title);

        $this->get(route('tours.index'))
            ->assertOk()
            ->assertSee($tour->destination);
    }

    public function test_tours_can_be_filtered_by_trip_style(): void
    {
        $gorillaTour = $this->createTour();
        $gorillaTour->update(['category' => 'Gorilla trekking']);
        $this->createTour([
            'title' => 'Jinja Nile Adventure',
            'slug' => 'jinja-nile-adventure',
            'destination' => 'Jinja, Uganda',
            'category' => 'Adventure',
        ]);

        $this->get(route('tours.index', ['category' => 'Gorilla trekking']))
            ->assertOk()
            ->assertSee($gorillaTour->title)
            ->assertDontSee('Jinja Nile Adventure');
    }

    public function test_customer_can_register_and_view_their_account(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Travel Guest',
            'email' => 'guest@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(route('account'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['email' => 'guest@example.com', 'is_admin' => false]);
    }

    public function test_signed_in_customer_can_send_a_booking_inquiry(): void
    {
        $user = User::factory()->create();
        $tour = $this->createTour();

        $this->actingAs($user)->post(route('inquiries.store', $tour), [
            'travel_date' => now()->addMonth()->toDateString(),
            'travelers' => 2,
            'message' => 'We are celebrating an anniversary.',
        ])->assertRedirect(route('account'));

        $this->assertDatabaseHas('booking_inquiries', [
            'user_id' => $user->id,
            'tour_id' => $tour->id,
            'travelers' => 2,
            'status' => 'pending',
        ]);
    }

    public function test_contact_form_saves_valid_messages(): void
    {
        $this->post(route('contact.store'), [
            'name' => 'A Guest',
            'email' => 'guest@example.com',
            'subject' => 'Safari plans',
            'message' => 'I would like to learn about your safari trips.',
        ])->assertRedirect();

        $this->assertDatabaseHas('contact_messages', ['email' => 'guest@example.com', 'subject' => 'Safari plans']);
        $this->assertSame(1, ContactMessage::count());
    }

    public function test_only_admin_users_can_open_admin_dashboard(): void
    {
        $this->actingAs(User::factory()->create())
            ->get(route('admin.dashboard'))
            ->assertForbidden();

        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Admin dashboard');
    }

    public function test_tour_with_inquiries_cannot_be_deleted(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $customer = User::factory()->create();
        $tour = $this->createTour();

        BookingInquiry::create([
            'user_id' => $customer->id,
            'tour_id' => $tour->id,
            'travel_date' => now()->addMonth()->toDateString(),
            'travelers' => 1,
            'status' => 'pending',
        ]);

        $this->actingAs($admin)
            ->delete(route('admin.tours.destroy', $tour))
            ->assertSessionHasErrors('tour');

        $this->assertDatabaseHas('tours', ['id' => $tour->id]);
    }

    private function createTour(array $overrides = []): Tour
    {
        return Tour::create(array_merge([
            'title' => 'Murchison Falls Safari',
            'slug' => 'murchison-falls-safari',
            'destination' => 'Murchison Falls, Uganda',
            'category' => 'Safari',
            'duration' => '4 days',
            'price' => 1200,
            'currency' => 'USD',
            'image_url' => 'https://example.com/safari.jpg',
            'summary' => 'A thoughtful Uganda safari journey.',
            'description' => 'Explore Murchison Falls with a local guide.',
            'is_published' => true,
        ], $overrides));
    }
}
