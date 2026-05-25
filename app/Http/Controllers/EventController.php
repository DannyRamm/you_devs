<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $evenData = $request->all();

        Event::create($evenData);
        return redirect()->route('events.index');  
    }
}
