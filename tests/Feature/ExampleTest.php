<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomersTest extends TestCase
{
    /** @test */
    public function only_loggedin_users_can_see_the_customers_list(){
        $response = $this->get('/customer')->assertRedirect('/login');
    }



















//     /**
//      * A basic test example.
//      *
//      * @return void
//      */
//     public function testBasicTest()
//     {
//         $response = $this->get('/');

//         $response->assertStatus(200);
//     }
}
