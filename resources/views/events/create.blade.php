@extends("layouts.main")
@section("title", "Criar eventos | Lara Events")

@section("content")
    <div class="mt-6 flex flex-col gap-6">
        <h1 class="text-2xl">Criar Eventos</h1>
        <form
            class="flex flex-col gap-6"
            action="/events"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <fieldset class="flex flex-col gap-2 text-sm">
                <label for="title">Nome do evento</label>
                <input
                    id="title"
                    type="text"
                    name="title"
                    placeholder="Nome do evento"
                    class="rounded border border-gray-500/20 p-4"
                />
            </fieldset>
            <fieldset class="flex flex-col gap-2 text-sm">
                <label for="file">Imagem do evento</label>
                <input
                    id="file"
                    type="file"
                    name="file"
                    placeholder="Imagem do evento"
                    class="rounded border border-gray-500/20 p-4"
                />
            </fieldset>
            <fieldset class="flex flex-col gap-2 text-sm">
                <label for="city">Local do evento</label>
                <input
                    id="city"
                    type="text"
                    name="city"
                    placeholder="Local do evento"
                    class="rounded border border-gray-500/20 p-4"
                />
            </fieldset>
            <fieldset class="flex flex-col gap-2 text-sm">
                <label for="private">Tipo do evento</label>
                <select
                    name="private"
                    id="private"
                    class="rounded border border-gray-500/20 bg-transparent p-4 text-gray-500"
                >
                    <option value="">Selecione o tipo de evento</option>
                    <option value="1">Privado</option>
                    <option value="0">Público</option>
                </select>
            </fieldset>
            <fieldset class="flex flex-col gap-2 text-sm">
                <label for="description">Descrição do evento</label>
                <textarea
                    id="description"
                    name="description"
                    cols="30"
                    rows="10"
                    class="rounded border border-gray-500/20 p-4"
                ></textarea>
            </fieldset>
            <div class="flex justify-end">
                <input
                    type="submit"
                    value="Criar evento"
                    class="w-[240px] cursor-pointer rounded bg-zinc-950 p-4 text-center text-white transition-all hover:opacity-85"
                />
            </div>
        </form>
    </div>
@endsection
