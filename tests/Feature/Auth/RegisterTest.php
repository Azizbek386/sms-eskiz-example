<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   
    
     public function test_user_can_register_with_valid_data()
{
    $response = $this->postJson('/api/v1/auth/register', [
        'name' => 'Aziz',
        'last_name' => 'Bazarbaev',
        'phone' => '998931123387',
    ]);

    $response->assertStatus(200)
             ->assertJson([
                 'success' => true,
                 'message' => 'Successfully registered',
             ]);
}

    }

