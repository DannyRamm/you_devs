<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use Carbon\Carbon;

class DeleteEventTest extends TestCase
{
    use RefreshDatabase;
    public function test_example(): void
    {
        //arrange
        $event = Event::create([
            'name' => 'Evento a ser eliminado',
            'featured' => 'meme.png',
            'date' => Carbon::now(),
            'time' => '20:00:00',
            'location' => 'Ubicación sin Eliminar',
        ]);

        //act
        $response = $this->delete('/events/'. $event->id);
        
        //assert
        $response->assertStatus(204); //esperamos un status 204 No Content después de eliminar
        $this->assertDatabaseMissing('events', ['id' => $event->id]);
    }
}
