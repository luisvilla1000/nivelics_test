<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserAuthTest extends TestCase
{
    /** @test */
    public function a_user_to_login()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('api/auth',[
            'username' => 'manager1',
            'password' => '12345678'
        ]);

        $response->assertOk();
        $user = User::where('username', 'manager1')->first();
        $this->assertEquals($user->email, 'manager1@gmail.com');
    }
}