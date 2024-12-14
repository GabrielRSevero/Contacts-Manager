@extends("layouts.app")

@section("title", "Contact Manager")

@section("content")
    <div class="flex justify-end bg-white py-2 px-4">
        <a href="{{ route("contacts.create") }}" class="bg-indigo-800 rounded-md p-2 text-white">+ Adicionar contato</a>
    </div>
    <div class="py-2 px-4">Filtrar por <i class="fa-solid fa-chevron-up text-sm rotate-180"></i></div>
    <table class="min-w-full bg-white border border-gray-200 overflow-hidden">
        <thead class="">
            <tr>
                <th class="px-4 py-2 text-left w-20">ID</th>
                <th class="px-4 py-2 text-left">Nome</th>
                <th class="px-4 py-2 text-left">Contato</th>
                <th class="px-4 py-2 text-left">E-mail</th>
                <th class="px-4 py-2 text-left">Data de cadastro</th>
                <th class="px-4 py-2 text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">#{{ $contact->id }}</td>
                    <td class="px-4 py-2">{{ $contact->name }}</td>
                    <td class="px-4 py-2">{{ $contact->contact }}</td>
                    <td class="px-4 py-2">{{ $contact->email }}</td>
                    <td class="px-4 py-2">{{ $contact->created_at }}</td>
                    <td class="px-4 py-2 text-center flex justify-center items-center gap-4">
                        <a href="{{ route('contacts.show', $contact->id) }}" class="text-blue-600 hover:text-blue-800">
                            <i class="fa-regular fa-eye"></i>
                        </a>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="text-amber-700 hover:text-blue-800">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <button class="text-red-500 hover:text-red-700" onclick="openModal({{ $contact->id }})">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>

                <x-confirm-modal id="{{ $contact->id }}" />
            @endforeach
        </tbody>
    </table>
@endsection