<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('index', compact("contacts"));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5',
            'contact' => 'required|digits:9|unique:contacts,contact',
            'email' => 'required|email|unique:contacts,email',
        ]);
    
        Contact::create($validated);
    
        return redirect()->route('contacts.index')->with('success', 'Contato cadastrado com sucesso!');
    }

    public function show(Contact $contact)
    {
        return view("show", compact("contact"));
    }

    public function edit(Contact $contact)
    {
        return view("edit", compact("contact"));
    }

    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5',
            'contact' => 'required|digits:9|unique:contacts,contact,' . $contact->id,
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
        ]);
    
        try {
            $contact->update($validated);
        } catch (\Exception $e) {
            return redirect()->route('contacts.edit', $contact->id)
            ->withErrors(['error' => 'Erro ao atualizar o contato: ' . $e->getMessage()]);
        }

        return redirect()->route('contacts.index')->with('success', 'Contato atualizado com sucesso!');
    }
    
    public function destroy(Contact $contact)
    {
        $contact->delete();
    
        return redirect()->route('contacts.index')->with('success', 'Contato deletado com sucesso!');
    }
}
