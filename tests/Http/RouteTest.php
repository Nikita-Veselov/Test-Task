<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_main()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get_dashboard()
    {
        $user = User::factory()->make([
            'name' => 'test_manager',
            'password' => 'password',
            'email' => 'test_manager@test_manager.com',
            'role' => 'manager',
        ]);

        $response = $this->actingAs($user)
                         ->get('dashboard');

        $response->assertStatus(200);
    }

    public function test_get_claim_form()
    {
        $user = User::factory()->make([
            'name' => 'test_client',
            'password' => 'password',
            'email' => 'test_client@test_client.com',
            'role' => 'client',
        ]);

        $response = $this->actingAs($user)
                         ->get('claim_form');

        $response->assertStatus(200);
    }

    public function test_post_claim_form()
    {
        $user = User::factory()->make([
            'name' => 'test_client',
            'password' => 'password',
            'email' => 'test_client@test_client.com',
            'role' => 'client',
        ]);

        $response = $this->actingAs($user)
                        ->post('claim_post', [
                                'email' => 'test_claim@test_claim.com',
                                'message' => 'test',
                        ]);

        $response->assertRedirect('/')->with('success', 'Обращение отправлено');
    }

    public function test_a_main_view_can_be_rendered_with_errors()
    {
        $view = $this->withViewErrors([
            'test' => ['Test error']
        ])->view('main');

        $view->assertSee('Test error');
    }




}
