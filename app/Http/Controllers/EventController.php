<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

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
        $user = auth()->user();

        Event::create([
            'city' => $request->city,
            'title' => $request->title,
            'private' => $request->private,
            'description'=> $request->description,
            'image' => $uploadedFileUrl,
            'items' => $request->items,
            'date' => $request->date,
            'user_id'=> $user->id,
        ]);

        return redirect('/')
            ->with('message', 'Seu evento foi criado com sucesso!');
    }

    public function show($id) {
        $event = Event::findOrFail($id);

        return view('events.show', [
            'event' => $event,
        ]);
    }

    public function dashboard() {
        $user = auth()->user();

        $events = $user->events;

        return view('events.dashboard', [
            'events'=> $events,
        ]);
    }

    public function destroy($id) {
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')
            ->with('message', 'Evento foi excluído com sucesso!');
    }
}
