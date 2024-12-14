@extends("layouts.app")

@section("title", "Create Contact")

@section("content")
    <div class="flex justify-center items-center h-full">
        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            
            <div class="grid gap-4 w-96">
                <div class="flex flex-col">
                    <label for="name" class="text-indigo-800 font-semibold">Nome:</label>
                    <input type="text" id="name" name="name" class="rounded-sm p-2 outline-none bg-indigo-300/20 border border-indigo-200" required>
                </div>
    
                <div class="flex flex-col">
                    <label for="contact" class="text-indigo-800 font-semibold">Contato:</label>
                    <input type="text" id="contact" name="contact" class="rounded-sm p-2 outline-none bg-indigo-300/20 border border-indigo-200" required>
                </div>
    
                <div class="flex flex-col">
                    <label for="email" class="text-indigo-800 font-semibold">E-mail:</label>
                    <input type="text" id="email" name="email" class="rounded-sm p-2 outline-none bg-indigo-300/20 border border-indigo-200" required>
                </div>
    
                <button type="submit" class="bg-indigo-800 p-2 rounded-md text-white">Salvar novo contato</button>
            </div>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection