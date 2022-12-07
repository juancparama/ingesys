<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DbEditTicketTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_edit_ticket()
    {
        $ticketData = array(
            'title'  =>  'Ticket',
            'location_id'  =>  '1'
        ); 
        $ticket = new  \App\Models\Ticket($ticketData);
        $this->assertTrue($ticket->save());
        
        $ticketData = ['status' => '2'];
        $this->assertTrue($ticket->update($ticketData));  

    }
}
