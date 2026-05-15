@component('mail::message')
# New Contact Message

You have received a new message via the Briwnet Awards contact form.

**Name:** {{ $contact->name }}
**Email:** {{ $contact->email }}
**Phone:** {{ $contact->phone ?? 'Not provided' }}
**Subject:** {{ ucfirst($contact->subject) }}

---

**Message:**

{{ $contact->message }}

---

@component('mail::button', ['url' => url('/admin/contacts')])
View in Admin Panel
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent