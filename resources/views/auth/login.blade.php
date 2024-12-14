<!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Contact Manager - Login</title>

      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

      @vite('resources/css/app.css')
  </head>
  <body>
    <main>
      <div class="flex flex-col h-full justify-center items-center">
      <h2 class="text-2xl mb-4">Contact Manager Login</h2>

      @if ($errors->any())
        <div class="mt-4 text-red-500 text-center">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
  
      <form action="{{ route('login.submit') }}" method="POST">
          @csrf
        
          <div class="grid gap-4 w-96">
            <div class="flex flex-col">
              <label for="email" class="text-indigo-800 font-semibold">E-mail:</label>
              <input type="text" id="email" name="email" class="rounded-sm p-2 outline-none bg-indigo-300/20 border border-indigo-200" required>
            </div>
      
            <div class="flex flex-col">
              <label for="password" class="text-indigo-800 font-semibold">Senha:</label>
              <input type="text" id="password" name="password" class="rounded-sm p-2 outline-none bg-indigo-300/20 border border-indigo-200" required>
            </div>
      
            <button type="submit" class="bg-indigo-800 p-2 rounded-md text-white">Entrar</button>
          </div>
      </form>
    </div>
    </main>
  </body>
</html>