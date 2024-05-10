<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index() {
        $events = Event::all();

        return view('welcome', ['events' => $events]);
    }

    public function create() {
        return view('events.create');
    }

    public function store(Request $request) {
        $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();

        Event::create([
            'city' => $request->city,
            'title' => $request->title,
            'private' => $request->private,
            'description'=> $request->description,
            'image' => $uploadedFileUrl,
        ]);

        return redirect('/')
            ->with('message', 'Seu evento foi criado com sucesso!');
    }
}
