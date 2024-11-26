<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('user_id', Auth::id())->get();

        return view('events/index', ['events' => $events]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);

        $event = new Event();

        $event->user_id = $request->user()->id;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->start = date("Y-m-d", strtotime($request->start));
        $event->end = date("Y-m-d", strtotime($request->end));

        if ($request->hasFile('cover')) {
            $file = request()->file('cover');
            $filename = time() . '.' . $request->cover->extension();  
            $filePath = 'cover/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $event->cover = $filename;
        } else {
            $event->cover = '';
        }
        
        $event->save();
           
        return redirect('/user/events')
            ->with('success', 'Evento criado com sucesso!');  
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events/edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validatedRequest = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);
          
        if ($request->hasFile('cover')) {
            $file = request()->file('cover');
            $filename = time() . '.' . $request->cover->extension();  
            $filePath = 'cover/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $event->cover = $filename;
       }

        $event->update($validatedRequest);
          
        return redirect('/user/events')
            ->with('success', 'Evento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
           
        return redirect('/user/events')
            ->with('success', 'Evento deletado com sucesso!');
    }
}
