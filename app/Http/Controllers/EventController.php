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
        $user = User::findOrFail(auth()->user()->id);

        $events = $user->events;

        $userEvents = $user->eventsAsParticipant()->get();

        return view('events.dashboard', [
            'events'=> $events,
            'userEvents' => $userEvents,
        ]);
    }

    public function destroy($id) {
        $user = auth()->user();
        $event = Event::findOrFail($id);

        if ($event->user_id != $user->id) {
            return redirect("/");
        }

        $event->users()->detach();
        $event->delete();

        return redirect('/dashboard')
            ->with('message', 'Evento foi excluído com sucesso!');
    }

    public function update(Request $request, $id) {
        $event = Event::findOrFail($id);

        $event->update($request->all());

        return redirect("/events/".$id)
            ->with("message","Evento atualizado com sucesso!");
    }

    public function edit($id) {
        $event = Event::findOrFail($id);

        $user = auth()->user();

        if ($event->user_id != $user->id) {
            return redirect("/");
        }

        return view("events.edit", [
            "event"=> $event,
        ]);
    }

    public function joinEvent($id) {
        User::findOrFail(auth()
            ->user()
            ->id)
            ->eventsAsParticipant()
            ->attach($id);

        return redirect("/events/".$id)
            ->with("message","Sua presença foi confirmada!");
    }

    public function leaveEvent($id) {
        User::findOrFail(auth()
            ->user()
            ->id)
            ->eventsAsParticipant()
            ->detach($id);

        return redirect("/events/".$id)
            ->with("message","Sua presença foi removida!");
    }
}
