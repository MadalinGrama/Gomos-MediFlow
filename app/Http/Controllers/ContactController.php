<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Contact::all();
        return view('admin.contact.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required|max:500'
        ]);

        $message = new Contact();
        $message->name  = $validatedData['name'];
        $message->email = $validatedData['email'];
        $message->subject = $validatedData['subject'];
        $message->message = $validatedData['message'];
        $message->save();
        return redirect('/contact')->with('success', 'The message was sent successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $messages = Contact::findOrFail($id);
            return view('admin.contact.show', compact('messages'));
        } catch (ModelNotFoundException $e) {
            // Mesajul nu a fost găsit în baza de date
            return redirect()->route('admin.contact.index')->with('error', 'Message not found.');
        } catch (\Exception $e) {
            // Alte erori neașteptate
            return redirect()->route('admin.contact.index')->with('error', 'An unexpected error occurred.');
        }
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contact.index')->with('success', 'Message deleted successfully!');
    }
}
