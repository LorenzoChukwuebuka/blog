<?php

namespace App\Http\Controllers;
use App\Mail\contactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Contactform extends Controller
{
    public function create(){
        return view('contact.create');
    }

    public function store(){
       // dd(request()->all());

       $data = request()->validate([
           'name'=> 'required',
            'email'=>'required|email',
            'message'=>'required',
       ]); 

       Mail::to('test@test.com')->send(new contactFormMail($data));

       return redirect('contact');
    }
}
