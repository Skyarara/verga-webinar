<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $data = [
            "data" => Contact::all(),
        ];
        return view("contact.index", $data);
    }

    public function store(Request $request)
    {
        
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "message" => $request->message,
        ];
        Contact::create($data);

        return redirect()->route("landing");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Contact::find($id);

        return view("contact.detail", ['data' => $data]);
    }

    public function destroy($id)
    {
        Contact::destroy($id);

        return redirect()->route("contact_index");
    }
}
