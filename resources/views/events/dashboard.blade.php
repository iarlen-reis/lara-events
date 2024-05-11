@extends("layouts.main")
@section("title", "Lara Events | Dashboard")

@section("content")
    <div class="flex w-full flex-col gap-6">
        <div class="mt-6">
            <h1 class="text-3xl">Dashboard</h1>
            <p class="text-lg text-zinc-400">
                Faça o gerenciamento dos seus eventos
            </p>
        </div>
        @if (count($events) > 0)
            <table class="w-full table-auto">
                <thead class="rounded border border-gray-500/60">
                    <tr>
                        <th class="px-4 py-2 text-start">Nome do evento</th>
                        <th class="py-2 text-start">Data do evento</th>
                        <th class="py-2 text-start">Participantes</th>
                        <th class="py-2 text-start">Deletar</th>
                        <th class="py-2 text-start">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td class="px-4 py-5 capitalize">
                                {{ $event->title }}
                            </td>
                            <td>
                                {{ date("d M, Y", strtotime($event->date)) }}
                            </td>
                            <td>12</td>
                            <td>
                                <form
                                    action="/events/{{ $event->id }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <ion-icon
                                            name="trash-outline"
                                            class="size-6 rounded p-2 text-red-500 hover:bg-zinc-950/20 transition-all"
                                        ></ion-icon>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="#">
                                    <ion-icon
                                        name="pencil-outline"
                                        class="size-6 rounded p-2 text-blue-500 hover:bg-zinc-950/20 transition-all"
                                    ></ion-icon>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if (count($events) === 0)
            <div class="mt-20 flex flex-col items-center justify-center gap-2">
                <h2 class="text-2xl font-semibold">
                    Nenhum evento encontrado.
                </h2>
                <a
                    href="/events/create"
                    class="w-[220px] rounded bg-zinc-950 p-4 text-center text-white transition-all hover:opacity-85"
                >
                    Criar eventos
                </a>
            </div>
        @endif
    </div>
@endsection
