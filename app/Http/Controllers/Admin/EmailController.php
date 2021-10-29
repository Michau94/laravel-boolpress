<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;
use App\Lead;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function contact()
    {
        return view('guests.contatti');
    }

    public function handleContact(Request $request)
    {
        $data = $request->all();
        $lead = new Lead();
        $lead->name = $data['name'];
        $lead->email = $data['email'];
        $lead->message = $data['message'];
        $lead->save();

        Mail::to($request->email)->send(new SendNewMail($lead));
        return redirect()->route('admin.contact.thank')->with('customer_name', $lead->name);
    }

    public function thank()
    {
        return view('guests.thank');
    }
}
