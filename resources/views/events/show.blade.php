@extends("layouts.main")
@section("title", "Lara Events | $event->title")

@section("content")
    <div class="mt-12 grid grid-cols-1 gap-6 pb-12 md:grid-cols-2">
        <img
            src="{{ $event->image }}"
            alt="Imagem do evento {{ $event->title }}"
            class="h-full w-full rounded"
        />
        <div class="flex flex-col gap-8">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-1.5">
                    <h1 class="text-3xl font-bold">{{ $event->title }}</h1>
                    <span
                        class="flex items-center gap-2 text-base capitalize text-zinc-400"
                    >
                        <ion-icon name="star-outline" size="small"></ion-icon>
                        {{ $event->user->name }}
                    </span>
                </div>
                <ul class="flex flex-col gap-2">
                    <li class="flex items-center gap-1.5">
                        <ion-icon
                            name="location-outline"
                            size="small"
                        ></ion-icon>
                        {{ $event->city }}
                    </li>
                    <li class="flex items-center gap-1.5">
                        <ion-icon name="people-outline" size="small"></ion-icon>
                        {{ count($event->users) }} participantes
                    </li>
                </ul>
                <div class="flex flex-col gap-2">
                    <h2 class="text-2xl font-bold">Infraestrutura</h2>
                    @if ($event->items)
                        <ul class="grid grid-cols-3 gap-4">
                            @foreach ($event->items as $item)
                                <li class="flex items-center gap-1.5">
                                    <ion-icon
                                        name="checkmark-done-outline"
                                    ></ion-icon>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                @if (!$event->users->contains(auth()->user()) && auth()->user())
                    <form
                        method="POST"
                        action="/events/join/{{ $event->id }}"
                        class="mt-4"
                    >
                        @csrf
                        <a
                            href="/events/join/{{ $event->id }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="w-[240px] cursor-pointer rounded border border-zinc-400 bg-transparent p-4 text-center text-black transition-all hover:bg-zinc-950 hover:text-white"
                        >
                            Confirmar presença
                        </a>
                    </form>
                @endif
                @if ($event->users->contains(auth()->user()) && auth()->user())
                <form
                    method="POST"
                    action="/events/leave/{{ $event->id }}"
                    class="mt-4"
                >
                    @csrf
                    @method("DELETE")
                    <a
                        href="/events/leave/{{ $event->id }}"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="w-[240px] cursor-pointer rounded border border-red-400 bg-transparent p-4 text-center text-red-400 transition-all hover:bg-red-400 hover:text-white"
                    >
                        Remover presença
                    </a>
                </form>
                @endif
            </div>
            <div class="flex flex-col gap-2">
                <h2 class="text-2xl font-bold">Descricão do evento</h2>
                <pre class="whitespace-pre-line text-zinc-600">
                    {{ $event->description }}
                </pre>
            </div>
        </div>
    </div>
@endsection
