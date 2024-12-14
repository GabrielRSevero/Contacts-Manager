<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Contact Manager')</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        @vite('resources/css/app.css')
    </head>

    <body class="antialiased bg-slate-200 flex flex-col items-center">

      <header class="bg-indigo-800 text-white p-4 w-full">
        <nav class="flex justify-between">
          <div>
            <a href="{{ route('contacts.index') }}" class="text-white hover:text-gray-200"><i class="fa-solid fa-house-chimney"></i></a>
          </div>
          @if (Auth::user())
            <div class="flex gap-2">
                <div>
                  Bem vindo, {{ Auth::user()->name }}!
                </div>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                  @csrf
                  <button type="submit" class="px-2 bg-red-500 rounded-md">Sair <i class="fa-solid fa-arrow-right-from-bracket"></i></button>
                </form>
              </div>
            @else
              <a href="{{ route("login") }}">Fazer login</a>
            @endif
        </nav>
      </header>

      <main class="w-full">
        @yield("content")
      </main>

      <footer class="bg-gray-800 text-white p-4 text-center w-full">
        <p>&copy; 2024 Contact Manager. Todos os direitos reservados.</p>
      </footer>

    </body>
</html>
