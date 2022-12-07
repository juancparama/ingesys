<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DbInsertLocationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_insert_location()
    {
        $lctnData = array(
            'name'  =>  'Ubicación',
        
        ); 
        $lctn = new  \App\Models\Location($lctnData);
        $this->assertTrue($lctn->save());
    }

}
