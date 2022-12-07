<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DbInsertTicketTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_insert_valid_ticket()
    {
        // $response = \App\Models\Ticket::factory(1)->create();

        $ticketData = array(
            'title'  =>  'Ticket',
            'location_id'  =>  '1'
        ); 
        $ticket = new  \App\Models\Ticket($ticketData);
        $this->assertTrue($ticket->save());
    }

}
