<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Exercise;

class ExerciseControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_rest()
    {
        $item = Rest::factory()->create();
        $response = $this->get('/api/v1/exercise');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'message' => $item->message,
            'url' => $item->url
        ]);
    }
    public function test_store_rest()
    {
        $data = [
            'message' => 'exercise',
            'url' => 'exercise@example.com',
        ];
        $response = $this->post('/api/v1/exercise', $data);
        $response->assertStatus(201);
        $response->assertJsonFragment($data);
        $this->assertDatabaseHas('exercises', $data);
    }
     public function test_show_rest()
    {
        $item = Rest::factory()->create();
        $response = $this->get('/api/v1/exercise/' . $item->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'message' => $item->message,
            'url' => $item->url
        ]);
    }
    public function test_update_rest()
    {
        $item = Rest::factory()->create();
        $data = [
            'message' => 'exercise_update',
            'url' => 'exercise_update@example.com',
        ];
        $response = $this->put('/api/v1/exercise/' . $item->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('exercises', $data);
    }
    public function test_destroy_rest()
    {
        $item = Rest::factory()->create();
        $response = $this->delete('/api/v1/exercise/' . $item->id);
        $response->assertStatus(200);
        $this->assertDeleted($item);
    }
}
