@component('mail::message')
# Welcome, {{ $user->name }}!

Your nomination was submitted successfully. We've created an account for you.

**Email:** {{ $user->email }}  
**Password:** {{ $password }}

@component('mail::button', ['url' => url('/login')])
Login to Your Account
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent