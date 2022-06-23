<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
   
    public function index()
    {
        return Event::all();
    }


    public function store(Request $request)
    {
        Event::create($request->all());
    }

    public function show($id)
    {
        return Event::findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());
    }

    public function destroy($id)
    {
        //
    }
}