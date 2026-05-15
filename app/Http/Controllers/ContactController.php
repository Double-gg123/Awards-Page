<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('events.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Save to database
        $contact = Contact::create($request->only('name', 'email', 'phone', 'subject', 'message'));

        // Notify admin — wrapped so a mail failure never breaks the form
        try {
            Mail::to(config('mail.admin_address', 'info@briwnet.co.ke'))
                ->send(new ContactFormMail($contact));
        } catch (\Exception $e) {
            \Log::error('Contact notification mail failed: ' . $e->getMessage());
        }

        return back()->with('contact_success', 'Your message has been sent! We\'ll get back to you within 24 hours.');
    }
}