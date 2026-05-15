<!DOCTYPE html>
<html>
<body style="font-family:sans-serif;color:#1e293b;padding:32px;max-width:600px;margin:auto;">
    <h2 style="color:#f59e0b;">Nomination Submitted ✓</h2>
    <p>Thank you! Your nomination for <strong>{{ $nomination->name }}</strong> has been received.</p>
    <p>We will review it and be in touch soon.</p>

    @if($nomination->account_action === 'skip')
    <hr style="margin:24px 0;">
    <h3>Your Account Details</h3>
    <p>We created an account so you can track your nomination:</p>
    <p><strong>Email:</strong> {{ $nomination->email }}<br>
    <strong>Password:</strong> (the one you used, or check your registration email)</p>
    <p>Log in at: <a href="{{ url('/login') }}">{{ url('/login') }}</a></p>
    @endif

    <hr style="margin:24px 0;">
    <p style="color:#64748b;font-size:13px;">Awards Platform &mdash; {{ config('app.name') }}</p>
</body>
</html>