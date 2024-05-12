<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        @vite("resources/css/app.css")
        <title>@yield("title")</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap"
            rel="stylesheet"
        />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
        <header class="container mx-auto flex items-center justify-between p-4">
            <a href="/" class="flex w-fit items-center gap-3">
                <img
                    alt="Logo do site"
                    src="/images/logo.svg"
                    class="w-[40px]"
                />
                <h1 class="text-2xl font-medium">Lara Events</h1>
            </a>
            <nav>
                <ul class="flex items-center gap-4">
                    <li class="text-lg transition-opacity hover:opacity-80">
                        <a href="/">Eventos</a>
                    </li>
                    @auth
                        <li class="text-lg transition-opacity hover:opacity-80">
                            <a href="/events/create">Criar eventos</a>
                        </li>
                        <li class="text-lg transition-opacity hover:opacity-80">
                            <a href="/dashboard">Meus eventos</a>
                        </li>
                        <li class="text-lg transition-opacity hover:opacity-80">
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="/dashboard" onclick="event.preventDefault(); this.closest('form').submit()">Sair</a>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li class="text-lg transition-opacity hover:opacity-80">
                            <a href="/login">Entrar</a>
                        </li>
                        <li class="text-lg transition-opacity hover:opacity-80">
                            <a href="/register">Cadastrar</a>
                        </li>
                    @endguest
                </ul>
            </nav>
        </header>
        <main class="container mx-auto min-h-screen px-4">
            @if (session("message"))
                <div class="flex items-center justify-end">
                    <div
                        class="slide rounded bg-green-300 p-4 text-center shadow-sm"
                    >
                        <span class="text-sm font-medium text-green-800">
                            {{ session("message") }}
                        </span>
                    </div>
                </div>
            @endif

            @yield("content")
        </main>
        <footer class="container mx-auto px-4">
            <ul class="flex justify-end gap-4 p-4">
                <li>
                    <a
                        target="_blank"
                        class="text-lg transition-opacity hover:opacity-80"
                        href="https://github.com/iarlen-reis"
                    >
                        &copy; 2024, Iarlen Reis.
                    </a>
                </li>
            </ul>
        </footer>
        <script
            type="module"
            src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
        ></script>
        <script
            nomodule
            src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
        ></script>
    </body>
</html>
