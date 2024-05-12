@extends("layouts.main")
@section("title", "Editar evento | Lara Events")

@section("content")
    <div class="mt-6 flex flex-col gap-6">
        <h1 class="text-2xl">Editar Evento</h1>
        <form
            class="flex flex-col gap-6"
            action="/events/edit/{{ $event->id }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')
            <fieldset class="flex flex-col gap-2 text-sm">
                <img
                alt="image preview"
                src="{{ $event->image }}"
                class="h-[100px] w-[100px] rounded-tl rounded-tr"
                >
                <label for="file">Imagem do evento</label>
                <input
                    id="file"
                    type="file"
                    name="file"
                    placeholder="Imagem do evento"
                    value="{{ $event->image }}"
                    class="rounded border border-gray-500/20 p-4"
                />
            </fieldset>
            <fieldset class="flex flex-col gap-2 text-sm">
                <label for="title">Nome do evento</label>
                <input
                    id="title"
                    type="text"
                    name="title"
                    value="{{ $event->title }}"
                    placeholder="Nome do evento"
                    class="rounded border border-gray-500/20 p-4"
                />
            </fieldset>
            <fieldset class="flex flex-col gap-2 text-sm">
                <label for="date">Data do evento</label>
                <input
                    id="date"
                    type="date"
                    name="date"
                    value="{{ date('Y-m-d', strtotime($event->date)) }}"
                    class="rounded border border-gray-500/20 p-4"
                />
            </fieldset>
            <fieldset class="flex flex-col gap-2 text-sm">
                <label for="city">Local do evento</label>
                <input
                    id="city"
                    type="text"
                    name="city"
                    value="{{ $event->city }}"
                    placeholder="Local do evento"
                    class="rounded border border-gray-500/20 p-4"
                />
            </fieldset>
            <fieldset class="flex flex-col gap-2 text-sm">
                <label for="private">Tipo do evento</label>
                <select
                    name="private"
                    id="private"
                    value="{{ $event->private }}"
                    class="rounded border border-gray-500/20 bg-transparent p-4 text-gray-500"
                >
                    <option value="">Selecione o tipo de evento</option>
                    <option value="1" {{ $event->private ? 'selected' : '' }} >Privado</option>
                    <option value="0" {{ !$event->private ? 'selected' : '' }}>Público</option>
                </select>
            </fieldset>
            <fieldset class="flex flex-col gap-2 text-sm">
                <label for="description">Itens de infraestrutura</label>
                <div
                    class="grid grid-cols-3 gap-4 rounded border border-gray-500/20 p-4"
                >
                    <div class="flex items-center gap-2">
                        <input
                            type="checkbox"
                            name="items[]"
                            id="cadeiras"
                            value="cadeiras"
                        />
                        <label class="text-sm capitalize" for="cadeiras">Cadeiras</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input
                            type="checkbox"
                            name="items[]"
                            id="mesas"
                            value="mesas"
                        />
                        <label class="text-sm capitalize" for="mesas">Mesas</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input
                            type="checkbox"
                            name="items[]"
                            id="banheiros"
                            value="banheiros"
                        />
                        <label class="text-sm capitalize" for="banheiros">banheiros</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input
                            type="checkbox"
                            name="items[]"
                            id="agua"
                            value="agua"
                        />
                        <label class="text-sm capitalize" for="agua">Água</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input
                            type="checkbox"
                            name="items[]"
                            id="palco"
                            value="palco"
                        />
                        <label class="text-sm capitalize" for="palco">Palco</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input
                            type="checkbox"
                            name="items[]"
                            id="open"
                            value="open"
                        />
                        <label class="text-sm capitalize" for="open">Open bar</label>
                    </div>
                </div>
            </fieldset>
            <fieldset class="flex flex-col gap-2 text-sm">
                <label for="description">Descrição do evento</label>
                <textarea
                    id="description"
                    name="description"
                    cols="30"
                    rows="10"
                    class="rounded border border-gray-500/20 p-4"
                >{{ $event->description }}</textarea>
            </fieldset>
            <div class="flex justify-end">
                <input
                    type="submit"
                    value="Editar evento"
                    class="w-[240px] cursor-pointer rounded bg-zinc-950 p-4 text-center text-white transition-all hover:opacity-85"
                />
            </div>
        </form>
    </div>
@endsection
