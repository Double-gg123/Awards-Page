<p>Hi {{ $user->name }},</p>

<p>Your nomination was submitted successfully. We've created an account so you can track its progress.</p>

<p><strong>Email:</strong> {{ $user->email }}<br>
<strong>Password:</strong> {{ $rawPassword }}</p>

<p><a href="{{ route('login') }}">Log in to track your nomination →</a></p>

<p style="color:#999;font-size:12px;">
    This is an automated message. Please do not reply to this email.
</p>