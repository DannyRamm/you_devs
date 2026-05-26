<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use Carbon\Carbon;
class UpdateEventTest extends TestCase
{
    use RefreshDatabase;

    protected $event;

    public function setUp(): void
    {
        parent::setUp();

        // Aquí puedes configurar cualquier cosa que necesites antes de cada prueba
        $this->event = Event::create([
            'name' => 'Evento a ser actualizado',
            'featured' => 'evento3.png',
            'date' => Carbon::now(),
            'time' => '21:00:00',
            'location' => 'Ubicación sin Actualizar',
        ]);
    }

    public function test_update_display_list_of_events(): void
    {
        /*arrange*/

        $updatedData = [
            'name' => 'Evento Actualizado',
        ];
        
        //act

        $response = $this->put("/events/{$this->event->id}", $updatedData);
        
        //assert

        $response->assertStatus(200);
        $this->assertDatabaseHas('events', $updatedData); // Redirección después de la actualización
    }
}
