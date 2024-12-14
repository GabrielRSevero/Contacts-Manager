@extends("layouts.app")

@section("title", "Contact Manager")

@section("content")
    <div class="flex h-full justify-center items-center">
        <div class="bg-white rounded grid gap-2">
            <h1 class="bg-indigo-800 text-white p-2 rounded-md text-lg text-center">
                Informações do contato
            </h1>
            <div class="grid gap-2 p-2">
                <div class="border-b py-2">
                    id: #{{ $contact->id }}
                </div>
                <div class="border-b py-2">
                    Nome: {{ $contact->name }}
                </div>
                <div class="border-b py-2">
                    Contato: {{ $contact->contact }}
                </div>
                <div class="border-b py-2">
                    E-mail: {{ $contact->email }}
                </div>
                <div class="py-2">
                    Cadastrado em: {{ $contact->created_at }}
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <a href="{{ route('contacts.edit', $contact->id) }}" class="text-amber-500 text-center bg-amber-500/50 border border-amber-500 rounded-md p-2"><i class="fa-solid fa-pen"></i></a>
                    <button class="text-red-500 text-center bg-red-500/50 border border-red-500 rounded-md p-2" onclick="openModal({{ $contact->id }})">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>

        <x-confirm-modal id="{{ $contact->id }}" />
    </div>
@endsection