<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create(){
        return view('contact.create');
    }

    public function store(){
        $data = request()->validate([
            'contactName' => 'required',
            'contactEmail' => 'required | email',
            'contactMessage' => 'required'
        ]);
        Mail::to('test@mail.com')->send(new ContactFormMail($data));
        return redirect('contact')->with('mail', 'Your email has been send.');;
    }
}
