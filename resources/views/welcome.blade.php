@extends("layouts.main")
@section("title", "Lara Events")

@section("content")
    <section class="flex w-full flex-col gap-14 pb-12">
        <div class="mt-6 flex flex-col gap-4">
            <form
                action="/"
                method="GET"
                class="flex w-fit items-center gap-2 self-end"
            >
                <input
                    type="search"
                    id="search"
                    name="search"
                    placeholder="Pesquisar por evento..."
                    class="rounded border border-gray-500/20 p-2 px-4 placeholder:text-sm"
                />
                <button
                    class="flex items-center justify-center rounded border border-gray-500/20 bg-transparent p-3 transition-all hover:bg-zinc-950/20"
                >
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </form>
            @if (! $search)
                <img
                    alt="banner"
                    src="/images/banner.jpg"
                    class="h-[400px] w-full rounded bg-cover"
                />
            @endif
        </div>
        <div class="flex flex-col gap-6">
            <h2 class="text-2xl">
                @if ($search)
                    Buscando por: {{ $search }}
                @else
                        Próximos eventos
                @endif
            </h2>
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($events as $event)
                    <article
                        class="mx-auto flex w-full max-w-[400px] flex-col gap-2 rounded border border-white/40 pb-2 shadow-md"
                    >
                        <img
                            src="{{ $event->image }}"
                            alt="Imagem do evento"
                            class="h-[340px] w-full rounded-tl rounded-tr object-fill"
                        />
                        <div class="flex flex-col gap-4 p-2">
                            <div class="flex flex-col">
                                <h3>
                                    <a
                                        href="/events/{{ $event->id }}"
                                        class="text-2xl font-medium capitalize transition-colors hover:opacity-85"
                                    >
                                        {{ $event->title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-zinc-400">
                                    {{ date("d M,  Y", strtotime($event->date)) }}
                                </p>
                            </div>
                            <ul class="flex flex-col gap-2">
                                <li class="flex items-center gap-2">
                                    <ion-icon
                                        size="small"
                                        name="location-outline"
                                    ></ion-icon>
                                    {{ $event->city }}
                                </li>
                                <li class="flex items-center gap-2">
                                    <ion-icon
                                        size="small"
                                        name="people-outline"
                                    ></ion-icon>
                                    2 Participantes
                                </li>
                            </ul>
                            <a
                                href="/events/{{ $event->id }}"
                                class="mt-2 w-full rounded bg-zinc-950 p-3 text-center text-white transition-colors hover:opacity-85"
                            >
                                Saiba mais
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
            @if (!$events->count() && $search)
                <div class="flex flex-col gap-4 items-center justify-center">
                    <h2 class="text-2xl text-center">Nenhum evento com o termo <br> <span class="font-bold">{{ $search }}</span> <br> foi encontrado.</h2>
                    <a
                    class="w-[240px] cursor-pointer rounded border border-zinc-400 bg-transparent p-4 text-center text-black transition-all hover:bg-zinc-950 hover:text-white"
                    href="/events/create">
                        Crie um evento
                    </a>
                </div>
            @endif
            @if (!$events->count() && !$search)
                <div class="flex flex-col gap-4 items-center justify-center">
                    <h2 class="text-2xl text-center">Nenhum evento foi encontrado.</h2>
                    <a
                    class="w-[240px] cursor-pointer rounded border border-zinc-400 bg-transparent p-4 text-center text-black transition-all hover:bg-zinc-950 hover:text-white"
                    href="/events/create">
                        Crie um evento
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection
