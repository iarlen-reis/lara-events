<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index() {
        $search = request('search');
        $events = Event::where([
            ['title', 'ilike', '%'.$search.'%'],
        ])->get();

        return view('welcome', ['events' => $events, 'search'=> $search]);
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
            'items' => $request->items,
            'date' => $request->date,
        ]);

        return redirect('/')
            ->with('message', 'Seu evento foi criado com sucesso!');
    }

    public function show($id) {
        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
    }
}
