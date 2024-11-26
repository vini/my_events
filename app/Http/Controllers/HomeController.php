<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    function index(){
        $getEvents = Event::where('user_id', Auth::id())->get([
            'id', 
            'title', 
            'start', 
            'end'
        ]);

        $events = [];
        foreach($getEvents as $e) {
            $events[] = [
                'id' => $e->id,
                'title' => $e->title,
                'start' => $e->start,
                'end' => $e->end
            ];
        }

        return view('users/home', ['events' => $events]);
    }
    
}