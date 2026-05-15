@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#FDFCF7] py-24">
    <div class="max-w-3xl mx-auto px-6">
        <div class="text-center mb-16">
            <h1 class="text-5xl font-black text-slate-900 tracking-tighter">Cookie Policy</h1>
            <p class="text-slate-500 mt-4"> </p>
        </div>

        <div class="prose prose-slate max-w-none leading-relaxed text-slate-700 space-y-10">
            
            <p class="text-lg">This Cookie Policy explains how Briwnet Awards uses cookies and similar technologies to enhance your experience on our platform.</p>

            <h2 class="text-2xl font-semibold text-slate-900">I. What Are Cookies?</h2>
            <p>Cookies are small text files that are stored on your device when you visit a website. They help websites remember your preferences and improve functionality.</p>

            <h2 class="text-2xl font-semibold text-slate-900">II. Cookies We Use</h2>
            <ul class="list-disc pl-6 space-y-3">
                <li><strong>Essential Cookies:</strong> These are necessary for the website to function properly (e.g., login sessions, form submissions).</li>
                <li><strong>Performance & Analytics Cookies:</strong> Help us understand how visitors interact with our site so we can improve it.</li>
                <li><strong>Functional Cookies:</strong> Remember your preferences such as language or theme settings.</li>
            </ul>

            <h2 class="text-2xl font-semibold text-slate-900">III. How We Use Cookies</h2>
            <p>We use cookies to:</p>
            <ul class="list-disc pl-6 space-y-2">
                <li>Keep you signed in during your visit</li>
                <li>Remember your preferences</li>
                <li>Analyze site traffic and usage patterns</li>
                <li>Ensure the security of our platform</li>
            </ul>

            <h2 class="text-2xl font-semibold text-slate-900">IV. Managing Your Cookie Preferences</h2>
            <p>You can control and manage cookies through your browser settings. Most browsers allow you to block or delete cookies. Please note that disabling essential cookies may affect the functionality of the website.</p>

            <h2 class="text-2xl font-semibold text-slate-900">V. Third-Party Cookies</h2>
            <p>We may use services from third parties (such as Google Analytics) that set their own cookies. These are used for analytics and performance measurement.</p>

            <div class="pt-10 border-t border-slate-200 text-center text-sm text-slate-500">
                <p>For any questions about our Cookie Policy, please contact us at <strong>webmaster@briwnetawards.com</strong></p>
            </div>
        </div>
    </div>
</div>
@endsection