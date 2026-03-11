<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // affichage des contacts 
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    // affichage de le formulaie où en va creer un contact 
    public function create()
    {
        return view('contacts.create');
    }

    // creer un contact 
    public function store(Request $request)
    {
        Contact::create($request->all());
        return redirect()->route('contacts.index');
    }

    // affichage de formulare où en va editer un contact
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    // update un contact 
    public function update(Request $request, Contact $contact)
    {
        $contact->update($request->all());
        return redirect()->route('contacts.index');
    }

    // supprimer un contact
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}