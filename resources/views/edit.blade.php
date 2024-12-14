@extends("layouts.app")

@section("title", "Edit Contact")

@section("content")
    <div class="flex h-full justify-center items-center">
        <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid gap-4 w-96">
                <div class="grid gap-4 w-96">
                    <div class="flex flex-col">
                        <label for="name" class="text-indigo-800 font-semibold">Nome:</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name', $contact->name) }}" 
                            class="rounded-sm p-2 outline-none bg-indigo-300/20 border border-indigo-200"
                            required
                        >
                    </div>
        
                    <div class="flex flex-col">
                        <label for="contact" class="text-indigo-800 font-semibold">Contato:</label>
                        <input type="text"
                            id="contact"
                            name="contact"
                            value="{{ old('contact', $contact->contact) }}"
                            class="rounded-sm p-2 outline-none bg-indigo-300/20 border border-indigo-200"
                            required
                        >
                    </div>
        
                    <div class="flex flex-col">
                        <label for="email" class="text-indigo-800 font-semibold">E-mail:</label>
                        <input type="text"
                            id="email" name="email" value="{{ old('email', $contact->email) }}"
                            class="rounded-sm p-2 outline-none bg-indigo-300/20 border border-indigo-200"
                            required
                        >
                    </div>
        
                    <button type="submit" class="bg-indigo-800 p-2 rounded-md text-white">Salvar contato</button>
                </div>
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