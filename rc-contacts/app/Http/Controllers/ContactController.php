<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
   public function index()
    {
        $items = Contact::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);

        $item = Contact::create($request->all());

        return response()->json($item, 201);
    }

    public function show($contactId)
    {
        $contact = Contact::find($contactId);

        return response()->json($contact);
    }

    public function update(Request $request, $contactId)
    {
        $request->validate([
            'name' => 'max:255',
            'email' => 'max:255',
        ]);

        $contact = Contact::find($contactId);

        $contact->update($request->all());

        return response()->json($contact);
    }

    public function destroy($contactId)
    {
        $contact = Contact::find($contactId);

        $contact->delete();

        return response()->json(null, 204);
    }
}
