<?php

namespace Tests\Feature;

use App\Concert;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PurchaseTicketsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function costumer_can_purchase_concert_tickets()
    {
        $concert = factory(Concert::class)->create(['ticket_price' => 3250]);

        $this->json('POST', "/concert/{$concert->id}/orders", [
            'email' => 'john@example.com',
            'ticket_quantity' => 3,
            'payment_token' => $paymentGatway->getValidToken(),
        ]);

        $this->assertEquals(9750, $paymentGatway->totalCharges());

        $this->assertTrue($concert->orders->contains(function ($order) {
            return $order->email == 'john@example.com';
        }));

        $order = $concert->orders()->where('email', 'john@example.com')->first();
        $this->assertNotNull($order);
        $this->assertEquals(3, $order->tickets->count());
    }
}
