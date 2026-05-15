# resources/views/about.blade.php

```blade
@extends('layouts.app')

@section('content')

<div class="bg-[#050816] text-white overflow-hidden">

    {{-- HERO SECTION --}}
    <section class="relative min-h-screen flex items-center justify-center px-6 py-24 overflow-hidden">

        {{-- Glow Effects --}}
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-amber-500/10 blur-[140px] rounded-full"></div>
            <div class="absolute bottom-[-20%] right-[-10%] w-[600px] h-[600px] bg-yellow-400/10 blur-[160px] rounded-full"></div>
        </div>

        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-16 items-center relative z-10">

            {{-- LEFT CONTENT --}}
            <div>
                <p class="uppercase tracking-[0.4em] text-amber-400 text-xs font-black mb-6">
                    Briwnet Awards Platform
                </p>

                <h1 class="text-5xl md:text-7xl font-black leading-[0.95] tracking-tight mb-8 uppercase">
                    Celebrating
                    <span class="italic font-serif text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-amber-600">
                        Excellence
                    </span>
                    Across Africa
                </h1>

                <p class="text-slate-300 text-lg leading-relaxed max-w-2xl mb-10">
                    Briwnet Awards is a premium digital nomination platform built to recognize outstanding individuals,
                    creators, businesses, innovators, entertainers, community leaders, and rising stars shaping the future.
                    We provide a transparent and modern nomination experience designed to spotlight talent, influence,
                    creativity, leadership, and impact.
                </p>

                <div class="flex flex-wrap gap-5">
                    <a href="{{ route('nomination.create') }}"
                       class="px-10 py-5 rounded-full bg-gradient-to-r from-yellow-500 to-amber-600 text-black font-black uppercase tracking-[0.3em] text-xs hover:scale-105 transition-all duration-300">
                        Start Nomination
                    </a>

                    <a href="#process"
                       class="px-10 py-5 rounded-full border border-white/10 bg-white/5 backdrop-blur-xl uppercase tracking-[0.3em] text-xs font-black hover:border-amber-500/40 transition-all duration-300">
                        Learn Process
                    </a>
                </div>
            </div>

            {{-- RIGHT PANEL --}}
            <div class="relative">

                <div class="absolute inset-0 bg-gradient-to-br from-amber-500/10 to-yellow-500/5 blur-3xl rounded-[3rem]"></div>

                <div class="relative bg-white/5 border border-white/10 backdrop-blur-2xl rounded-[3rem] p-10 md:p-14 shadow-2xl">

                    <div class="grid grid-cols-2 gap-6">

                        <div class="bg-white/5 border border-white/10 rounded-3xl p-6">
                            <h3 class="text-4xl font-black text-amber-400 mb-2">10K+</h3>
                            <p class="text-slate-400 text-sm uppercase tracking-wider">
                                Nominations Submitted
                            </p>
                        </div>

                        <div class="bg-white/5 border border-white/10 rounded-3xl p-6">
                            <h3 class="text-4xl font-black text-amber-400 mb-2">250+</h3>
                            <p class="text-slate-400 text-sm uppercase tracking-wider">
                                Award Categories
                            </p>
                        </div>

                        <div class="bg-white/5 border border-white/10 rounded-3xl p-6">
                            <h3 class="text-4xl font-black text-amber-400 mb-2">100%</h3>
                            <p class="text-slate-400 text-sm uppercase tracking-wider">
                                Digital Experience
                            </p>
                        </div>

                        <div class="bg-white/5 border border-white/10 rounded-3xl p-6">
                            <h3 class="text-4xl font-black text-amber-400 mb-2">24/7</h3>
                            <p class="text-slate-400 text-sm uppercase tracking-wider">
                                Platform Access
                            </p>
                        </div>

                    </div>

                    <div class="mt-8 p-6 rounded-3xl bg-gradient-to-r from-yellow-500/10 to-amber-500/5 border border-amber-500/20">
                        <p class="text-slate-200 leading-relaxed">
                            Our mission is to build a trusted recognition ecosystem where achievements are discovered,
                            verified, celebrated, and amplified globally.
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </section>


    {{-- ABOUT BRIWNET --}}
    <section class="py-24 px-6 border-t border-white/5">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-20 items-center">

            <div>
                <p class="uppercase tracking-[0.3em] text-amber-400 text-xs font-black mb-4">
                    About Briwnet
                </p>

                <h2 class="text-4xl md:text-6xl font-black uppercase leading-tight mb-8">
                    A Modern Platform
                    <span class="italic font-serif text-amber-400">For Recognition</span>
                </h2>

                <p class="text-slate-400 leading-relaxed mb-6 text-lg">
                    Briwnet is a technology-driven digital ecosystem focused on empowering visibility,
                    celebrating achievements, and connecting communities through recognition.
                    The platform combines innovation, design, credibility, and accessibility to create
                    a seamless nomination and awards experience.
                </p>

                <p class="text-slate-400 leading-relaxed text-lg">
                    From entrepreneurs and influencers to creatives, brands, students, public figures,
                    and social impact leaders, Briwnet Awards provides a stage where meaningful contributions
                    are acknowledged and celebrated.
                </p>
            </div>

            <div class="grid gap-6">

                <div class="bg-white/5 border border-white/10 rounded-[2rem] p-8 hover:border-amber-500/30 transition-all duration-300">
                    <h3 class="text-2xl font-black mb-4 text-amber-400">Innovation</h3>
                    <p class="text-slate-400 leading-relaxed">
                        Built with modern digital systems to simplify nominations, verification,
                        tracking, and participant engagement.
                    </p>
                </div>

                <div class="bg-white/5 border border-white/10 rounded-[2rem] p-8 hover:border-amber-500/30 transition-all duration-300">
                    <h3 class="text-2xl font-black mb-4 text-amber-400">Transparency</h3>
                    <p class="text-slate-400 leading-relaxed">
                        Every nomination follows structured review and validation processes to ensure fairness and credibility.
                    </p>
                </div>

                <div class="bg-white/5 border border-white/10 rounded-[2rem] p-8 hover:border-amber-500/30 transition-all duration-300">
                    <h3 class="text-2xl font-black mb-4 text-amber-400">Global Reach</h3>
                    <p class="text-slate-400 leading-relaxed">
                        Briwnet Awards promotes talents and achievements to local and international audiences.
                    </p>
                </div>

            </div>
        </div>
    </section>


    {{-- NOMINATION PROCESS --}}
    <section id="process" class="py-24 px-6 bg-white/[0.02] border-y border-white/5">

        <div class="max-w-7xl mx-auto">

            <div class="text-center max-w-3xl mx-auto mb-20">
                <p class="uppercase tracking-[0.3em] text-amber-400 text-xs font-black mb-4">
                    Nomination Process
                </p>

                <h2 class="text-4xl md:text-6xl font-black uppercase mb-8 leading-tight">
                    How The
                    <span class="italic font-serif text-amber-400">Process Works</span>
                </h2>

                <p class="text-slate-400 text-lg leading-relaxed">
                    Our streamlined digital workflow ensures every nomination is properly submitted,
                    reviewed, and managed professionally.
                </p>
            </div>

            <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-8">

                <div class="relative bg-white/5 border border-white/10 rounded-[2rem] p-10">
                    <div class="text-7xl font-black text-white/5 absolute top-4 right-6">01</div>
                    <div class="w-16 h-16 rounded-2xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 text-2xl font-black mb-8">
                        ✓
                    </div>
                    <h3 class="text-2xl font-black mb-4">Submit Nomination</h3>
                    <p class="text-slate-400 leading-relaxed">
                        Users submit nominee details, categories, social handles, achievements,
                        and supporting information through the platform.
                    </p>
                </div>

                <div class="relative bg-white/5 border border-white/10 rounded-[2rem] p-10">
                    <div class="text-7xl font-black text-white/5 absolute top-4 right-6">02</div>
                    <div class="w-16 h-16 rounded-2xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 text-2xl font-black mb-8">
                        ★
                    </div>
                    <h3 class="text-2xl font-black mb-4">Verification</h3>
                    <p class="text-slate-400 leading-relaxed">
                        The Briwnet team reviews submissions for authenticity, category alignment,
                        and compliance with nomination guidelines.
                    </p>
                </div>

                <div class="relative bg-white/5 border border-white/10 rounded-[2rem] p-10">
                    <div class="text-7xl font-black text-white/5 absolute top-4 right-6">03</div>
                    <div class="w-16 h-16 rounded-2xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 text-2xl font-black mb-8">
                        ↑
                    </div>
                    <h3 class="text-2xl font-black mb-4">Public Visibility</h3>
                    <p class="text-slate-400 leading-relaxed">
                        Approved nominees gain visibility across the platform, helping audiences discover emerging excellence.
                    </p>
                </div>

                <div class="relative bg-white/5 border border-white/10 rounded-[2rem] p-10">
                    <div class="text-7xl font-black text-white/5 absolute top-4 right-6">04</div>
                    <div class="w-16 h-16 rounded-2xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 text-2xl font-black mb-8">
                        🏆
                    </div>
                    <h3 class="text-2xl font-black mb-4">Recognition</h3>
                    <p class="text-slate-400 leading-relaxed">
                        Finalists and winners receive recognition, visibility, prestige, and opportunities for growth.
                    </p>
                </div>

            </div>

        </div>

    </section>


    {{-- WHY NOMINATE --}}
    <section class="py-24 px-6">

        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-16 items-center">

            <div class="bg-white/5 border border-white/10 rounded-[3rem] p-10 md:p-14">
                <p class="uppercase tracking-[0.3em] text-amber-400 text-xs font-black mb-5">
                    Why Participate
                </p>

                <h2 class="text-4xl md:text-5xl font-black uppercase leading-tight mb-8">
                    Recognition That
                    <span class="italic font-serif text-amber-400">Creates Impact</span>
                </h2>

                <div class="space-y-6 text-slate-400 leading-relaxed text-lg">
                    <p>
                        Briwnet Awards helps individuals and brands build visibility, credibility,
                        authority, and audience trust.
                    </p>

                    <p>
                        Being nominated positions participants among recognized leaders,
                        innovators, creators, and changemakers within their industries.
                    </p>

                    <p>
                        Our digital-first platform ensures accessibility, smooth participation,
                        and a professional nomination experience for every user.
                    </p>
                </div>
            </div>

            <div class="grid gap-6">

                <div class="bg-gradient-to-r from-yellow-500/10 to-amber-500/5 border border-amber-500/20 rounded-[2rem] p-8">
                    <h3 class="text-2xl font-black mb-3 text-amber-400">Brand Visibility</h3>
                    <p class="text-slate-400 leading-relaxed">
                        Increase audience awareness and strengthen digital presence.
                    </p>
                </div>

                <div class="bg-gradient-to-r from-yellow-500/10 to-amber-500/5 border border-amber-500/20 rounded-[2rem] p-8">
                    <h3 class="text-2xl font-black mb-3 text-amber-400">Professional Recognition</h3>
                    <p class="text-slate-400 leading-relaxed">
                        Gain recognition from audiences, communities, and industry peers.
                    </p>
                </div>

                <div class="bg-gradient-to-r from-yellow-500/10 to-amber-500/5 border border-amber-500/20 rounded-[2rem] p-8">
                    <h3 class="text-2xl font-black mb-3 text-amber-400">Community Impact</h3>
                    <p class="text-slate-400 leading-relaxed">
                        Celebrate positive contributions and inspire future generations.
                    </p>
                </div>

            </div>

        </div>

    </section>


    {{-- CTA --}}
    <section class="px-6 pb-24">
        <div class="max-w-6xl mx-auto bg-gradient-to-r from-yellow-500/10 to-amber-500/5 border border-amber-500/20 rounded-[3rem] p-10 md:p-20 text-center relative overflow-hidden">

            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-[-30%] left-[20%] w-[400px] h-[400px] bg-amber-500/10 blur-[120px] rounded-full"></div>
            </div>

            <div class="relative z-10">
                <p class="uppercase tracking-[0.3em] text-amber-400 text-xs font-black mb-5">
                    Start Today
                </p>

                <h2 class="text-4xl md:text-6xl font-black uppercase leading-tight mb-8">
                    Ready To Nominate
                    <span class="italic font-serif text-amber-400">A Star?</span>
                </h2>

                <p class="text-slate-300 max-w-3xl mx-auto text-lg leading-relaxed mb-10">
                    Submit your nomination today and help celebrate individuals and brands making a real impact.
                </p>

                <a href="{{ route('nomination.create') }}"
                   class="inline-flex items-center justify-center px-12 py-5 rounded-full bg-gradient-to-r from-yellow-500 to-amber-600 text-black font-black uppercase tracking-[0.3em] text-xs hover:scale-105 transition-all duration-300">
                    Start Nomination
                </a>
            </div>

        </div>
    </section>

</div>

@endsection
