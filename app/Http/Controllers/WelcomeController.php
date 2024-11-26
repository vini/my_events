<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class WelcomeController extends Controller
{

    function index(){
        $getEvents = Event::get(['id', 'title', 'start', 'end']);

        $events = [];
        foreach($getEvents as $e) {
            $events[] = [
                'id' => $e->id,
                'title' => $e->title,
                'start' => $e->start,
                'end' => $e->end
            ];
        }

        return view('welcome', ['events' => $events]);
    }
    
}