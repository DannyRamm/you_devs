<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

// 2. Importaciones de tu Aplicación (Modelos y Requests)
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Muestra el listado de eventos.
     */
    public function index(): View
    {
        $events = Event::all();

        // Usamos compact() que es más limpio y estándar en Laravel
        return view('events.index', ['events' => $events]);
    }

    /**
     * Guarda un nuevo evento en la base de datos.
     */
    public function store(StoreEventRequest $request): RedirectResponse
    {
        // Al usar StoreEventRequest, es mejor usar validated() en lugar de all()
        // para asegurarte de que SOLO entren los datos que pasaron la validación.
        $validatedData = $request->validated();

        Event::create($validatedData);

        return redirect()->route('events.index');  
    }

    public function update(Request $request, Event $event)
    {

        $event->update($request->all());

        return response()->json($event, 200);
    }
}