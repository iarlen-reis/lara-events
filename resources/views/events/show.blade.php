@extends("layouts.main")
@section("title", "Lara Events | $event->title")

@section("content")
    <div class="mt-12 grid grid-cols-1 gap-6 md:grid-cols-2 pb-12">
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
                        class="flex items-center gap-2 text-sm capitalize text-zinc-400"
                    >
                        <ion-icon name="star-outline" size="small"></ion-icon>
                        Iarlen Santos Reis
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
                        23 participantes
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
                <a
                    href="#"
                    class="w-[240px] cursor-pointer rounded border border-zinc-400 bg-transparent p-4 text-center text-black transition-all hover:bg-zinc-950 hover:text-white"
                >
                    Confirmar presença
                </a>
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
