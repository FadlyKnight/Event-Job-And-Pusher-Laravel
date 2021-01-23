<?php

namespace Tests\Feature\Http\Controllers;

use App\Jobs\DeletePayments;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class PaymentControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker;
    use WithoutMiddleware; // use this trait
    
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_get_data()
    {
        $response = $this->get(route('get.payments', 50));
        $response->assertStatus(200);
    }

    public function test_insert_data()
    {
        $this->withoutMiddleware();
        $response = $this->postJson(route('insert.payments'), [
            'name' => $this->faker->words(10, true),
            ] );
        $response
            ->assertStatus(200);
    }

    public function test_delete()
    {
        $this->withoutMiddleware();

        $response = $this->json('delete',route('delete.payments'), [
            'data_id' => [1,2,3,4]
        ]);
        
        $response->assertStatus(200);
    }

}
