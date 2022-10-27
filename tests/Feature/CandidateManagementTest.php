<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CandidateManagementTest extends TestCase
{
    protected function makeToken(){
        $credentials = ['username' => 'manager1', 'password' => '12345678'];
        $token = auth()->attempt($credentials);
        return $token;
    }

    /** @test */
    public function an_manager_listing_all_candidates()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('api/leads', ['token' => $this->makeToken()]);

        $response->assertSuccessful();
    }

    /** @test */
    public function an_manager_creating_a_candidate()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('api/lead',[
                "name"      => "usuario de prueba",
                "source"    => "Fotocasa132",
                "owner"     => "3",
                "created_by" => "1"
            ], ['token' => $this->makeToken()]);

        $response->assertStatus(201);
    }

    /** @test */
    public function an_manager_consulting_a_candidate()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('api/lead/635a9c07dd09b902970cfec2', ['token' => $this->makeToken()]);

        $response->assertStatus(401);
    }
    
}
