<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DbDeleteTicketTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete_ticket()
    {
        $ticketData = array(
            'title'  =>  'Ticket',
            'location_id'  =>  '1'
        ); 

        $ticket = new  \App\Models\Ticket($ticketData);
        $this->assertTrue($ticket->save());

        $this->assertTrue($ticket->delete());

    }
}
