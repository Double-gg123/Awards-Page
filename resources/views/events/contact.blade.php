@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#0A0F1E] relative overflow-hidden pt-20">

    {{-- Background Auras --}}
    <div class="absolute top-[-10%] left-[-5%] w-[45%] h-[55%] bg-red-900/10 rounded-full blur-[140px] pointer-events-none"></div>
    <div class="absolute bottom-[-15%] right-[-5%] w-[45%] h-[55%] bg-amber-900/8 rounded-full blur-[140px] pointer-events-none"></div>
    <div class="absolute top-[40%] left-[50%] w-[30%] h-[30%] bg-blue-900/8 rounded-full blur-[100px] pointer-events-none"></div>

    {{-- Hero Header --}}
    <section class="relative pt-20 pb-12 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-slate-800/50 border border-white/5 mb-8 shadow-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400">Get In Touch</span>
            </div>
            <h1 class="text-6xl md:text-8xl font-black text-white tracking-tighter leading-none uppercase">
                CONTACT <span class="font-serif italic text-transparent bg-clip-text bg-gradient-to-r from-yellow-600 to-amber-400">US</span>
            </h1>
            <div class="mt-4 h-px w-24 bg-gradient-to-r from-amber-500 to-transparent"></div>
        </div>
    </section>

    {{-- Main Two-Column Layout --}}
    <section class="relative z-10 pb-32 px-6">
        <div class="max-w-6xl mx-auto grid lg:grid-cols-[1fr_1.4fr] gap-8 lg:gap-16 items-start">

            {{-- LEFT: Info Panel --}}
            <div class="space-y-10 lg:sticky lg:top-32">

                <p class="text-slate-400 text-base font-medium leading-relaxed max-w-sm">
                    Have questions about the 2026 nominations? Our dedicated team is ready to assist you every step of the way.
                </p>

                {{-- Contact Details --}}
                <div class="space-y-6">
                    <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-600">Direct Contact</p>

                    <a href="mailto:info@briwnet.co.ke" class="contact-item group">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[9px] uppercase tracking-widest text-slate-600 font-bold mb-0.5">Email</p>
                            <p class="text-white font-semibold text-sm group-hover:text-amber-400 transition-colors duration-300">info@briwnet.co.ke</p>
                        </div>
                    </a>

                    <a href="tel:+254700000000" class="contact-item group">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[9px] uppercase tracking-widest text-slate-600 font-bold mb-0.5">Phone</p>
                            <p class="text-white font-semibold text-sm group-hover:text-amber-400 transition-colors duration-300">+254 742 831 859</p>
                        </div>
                    </a>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[9px] uppercase tracking-widest text-slate-600 font-bold mb-0.5">Location</p>
                            <p class="text-white font-semibold text-sm">Juja, Kenya</p>
                            <p class="text-slate-500 text-xs mt-0.5">Juja City Mall, Thika Highway.</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[9px] uppercase tracking-widest text-slate-600 font-bold mb-0.5">Office Hours</p>
                            <p class="text-white font-semibold text-sm">Mon – Fri: 9am – 9pm</p>
                            <p class="text-slate-500 text-xs mt-0.5">EAT (UTC+3)</p>
                        </div>
                    </div>
                </div>

                {{-- Divider --}}
                <div class="h-px bg-gradient-to-r from-white/5 via-white/10 to-transparent"></div>

                {{-- Social Links --}}
                <div class="space-y-4">
                    <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-600">Follow Us</p>
                    <div class="flex flex-wrap gap-3">

                        <a href="https://web.facebook.com/briwnet" target="_blank" class="social-pill group">
                            <svg class="w-4 h-4 text-slate-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            <span>Facebook</span>
                        </a>

                        <a href="https://twitter.com/briwnetawards" target="_blank" class="social-pill group">
                            <svg class="w-4 h-4 text-slate-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                            <span>Twitter / X</span>
                        </a>

                        <a href="https://instagram.com/briwnetawards" target="_blank" class="social-pill group">
                            <svg class="w-4 h-4 text-slate-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                            </svg>
                            <span>Instagram</span>
                        </a>

                        <a href="https://ke.linkedin.com/in/brian-wachira-a44770129" target="_blank" class="social-pill group">
                            <svg class="w-4 h-4 text-slate-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                            <span>LinkedIn</span>
                        </a>

                        <a href="https://youtube.com/@briwnetawards" target="_blank" class="social-pill group">
                            <svg class="w-4 h-4 text-slate-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                            <span>YouTube</span>
                        </a>

                        <a href="https://www.tiktok.com/@briwnet" target="_blank" class="social-pill group">
                            <svg class="w-4 h-4 text-slate-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                            </svg>
                            <span>TikTok</span>
                        </a>

                    </div>
                </div>

            </div>

            {{-- RIGHT: Contact Form --}}
            <div class="bg-[#1E293B]/40 backdrop-blur-xl border border-white/5 p-8 md:p-12 rounded-[2.5rem] shadow-2xl">

                <div class="mb-10">
                    <h2 class="text-2xl font-black text-white uppercase tracking-tight">Send a Message</h2>
                    <p class="text-slate-500 text-sm mt-1">We'll respond within 24 hours.</p>
                </div>

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="field-label">Full Name</label>
                            <input type="text" name="name" placeholder="John Doe" class="field-input" required>
                        </div>
                        <div class="space-y-2">
                            <label class="field-label">Email Address</label>
                            <input type="email" name="email" placeholder="john@example.com" class="field-input" required>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="field-label">Phone (Optional)</label>
                        <input type="tel" name="phone" placeholder="+254 700 000 000" class="field-input">
                    </div>

                    <div class="space-y-2">
                        <label class="field-label">Subject</label>
                        <select name="subject" class="field-input" required>
                            <option value="" disabled selected>Select Inquiry Type</option>
                            <option value="nomination">Nomination Inquiry</option>
                            <option value="partnership">Partnership</option>
                            <option value="press">Press & Media</option>
                            <option value="sponsorship">Sponsorship</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="field-label">Message</label>
                        <textarea name="message" rows="5" placeholder="How can we help you?" class="field-input resize-none" required></textarea>
                    </div>

                    @if(session('contact_success'))
                        <div class="px-5 py-4 rounded-2xl bg-green-900/30 border border-green-500/20 text-green-400 text-sm font-medium">
                            ✓ {{ session('contact_success') }}
                        </div>
                    @endif

                    <div class="pt-4">
                        <button type="submit"
                                class="w-full py-5 bg-gradient-to-r from-amber-500 to-yellow-600 text-slate-900 font-black uppercase tracking-[0.3em] text-[11px] rounded-2xl hover:from-amber-400 hover:to-yellow-500 transition-all duration-300 shadow-lg shadow-amber-900/20 hover:shadow-amber-900/40 hover:-translate-y-0.5">
                            Send Message →
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </section>
</div>

<style>
    .field-label {
        display: block;
        font-size: 9px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.3em;
        color: #475569;
        margin-bottom: 0.4rem;
    }
    .field-input {
        width: 100%;
        background: rgba(10, 15, 30, 0.6);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 1rem;
        padding: 1rem 1.25rem;
        font-weight: 500;
        color: #F8FAFC;
        outline: none;
        transition: all 0.3s;
        font-size: 0.875rem;
    }
    .field-input::placeholder { color: #334155; }
    .field-input:focus {
        border-color: rgba(245, 158, 11, 0.4);
        background: rgba(10, 15, 30, 0.9);
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.06);
    }
    .field-input option { background: #1E293B; color: #F8FAFC; }

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        text-decoration: none;
    }
    .contact-icon {
        flex-shrink: 0;
        width: 2.5rem;
        height: 2.5rem;
        background: rgba(245, 158, 11, 0.08);
        border: 1px solid rgba(245, 158, 11, 0.15);
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .social-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
        color: #64748b;
        text-decoration: none;
        transition: all 0.3s;
        letter-spacing: 0.05em;
    }
    .social-pill:hover {
        background: rgba(245, 158, 11, 0.08);
        border-color: rgba(245, 158, 11, 0.25);
        color: #f59e0b;
        transform: translateY(-1px);
    }
</style>
@endsection