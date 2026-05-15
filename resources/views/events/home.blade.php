@extends('layouts.app')

@section('content')
<div class="bg-[#0F172A] w-full overflow-x-hidden min-h-screen relative" style="font-family: 'Inter', sans-serif;">

    {{-- BACKGROUND EFFECTS --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-[-10%] right-[-10%] w-[500px] h-[500px] bg-red-700/10 blur-[140px] rounded-full"></div>
        <div class="absolute bottom-[-20%] left-[-10%] w-[600px] h-[600px] bg-amber-500/10 blur-[160px] rounded-full"></div>
    </div>

    {{-- HERO SECTION --}}
    <section class="relative w-full px-6 pt-32 pb-24 z-10">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

            {{-- LEFT --}}
            <div class="flex flex-col items-center lg:items-start text-center lg:text-left">

                {{-- LIVE BADGE --}}
                <div class="mb-8 inline-flex items-center gap-3 px-4 py-2 rounded-full border border-white/10 backdrop-blur-md">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-red-500"></span>
                    </span>

                    <span class="text-[10px] md:text-xs font-black uppercase tracking-[0.25em] text-red-400">
                        Nominations Live Now
                    </span>
                </div>

                {{-- SLIDES --}}
                <div id="hero-stories" class="grid grid-cols-1 w-full min-h-[330px] md:min-h-[400px]">

                    @php
                        $slides = [
                            [
                                'title' => 'Briwnet Awards',
                                'year' => '2026',
                                'desc' => 'The ultimate recognition platform celebrating innovators, creators, entrepreneurs and global excellence.',
                                'img' => 'grand.png'
                            ],
                            [
                                'title' => 'Beyond the',
                                'year' => 'LIMITS',
                                'desc' => 'Celebrating fearless minds, groundbreaking ideas and industry-defining leadership.',
                                'img' => 'innovation.png'
                            ],
                            [
                                'title' => 'Chosen by',
                                'year' => 'THE PEOPLE',
                                'desc' => 'Community-driven nominations designed to spotlight authentic impact and influence.',
                                'img' => 'network.png'
                            ],
                            [
                                'title' => 'Architects of',
                                'year' => 'TOMORROW',
                                'desc' => 'Recognizing the visionaries shaping the future through creativity and innovation.',
                                'img' => 'recognize.png'
                            ],
                            [
                                'title' => 'Pure Elite',
                                'year' => 'PRESTIGE',
                                'desc' => 'An unforgettable stage where exceptional talent receives global recognition.',
                                'img' => 'trophies.png'
                            ]
                        ];
                    @endphp

                    @foreach($slides as $index => $slide)
                    <div
                        class="story-slide col-start-1 row-start-1 transition-all duration-700 ease-in-out {{ $index === 0 ? 'opacity-100 translate-y-0 z-10' : 'opacity-0 translate-y-4 z-0' }}"
                        data-image="/images/{{ $slide['img'] }}"
                    >

                        {{-- MICRO LABEL --}}
                        <div class="mb-5">
                            <span class="text-[10px] uppercase tracking-[0.4em] text-amber-500 font-black">
                                Excellence • Prestige • Legacy
                            </span>
                        </div>

                        {{-- MAIN HEADING --}}
                        <h1 class="text-4xl sm:text-5xl md:text-7xl xl:text-[6rem] break words font-black leading-[0.88] tracking-[-0.05em] uppercase text-white">
                            {{ $slide['title'] }}
                            <br>

                            <span class="relative inline-block text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-red-500 to-amber-400 font-light tracking-[0.15em]">
                                {{ $slide['year'] }}
                            </span>
                        </h1>

                        {{-- DESCRIPTION --}}
                        <p class="text-slate-400 text-lg md:text-xl font-medium leading-relaxed mt-7 max-w-xl mx-auto lg:mx-0">
                            {{ $slide['desc'] }}
                        </p>
                    </div>
                    @endforeach
                </div>

                {{-- ACTIONS --}}
                <div class="flex flex-col sm:flex-row items-center gap-4 mt-2">

                    <a href="{{ route('nomination.create') }}"
                       class="group px-12 py-5 bg-white text-slate-900 rounded-full font-black uppercase tracking-[0.3em] text-[11px] hover:scale-105 transition-all duration-300">
                        Nominate Now
                    </a>

                    <a href="{{ route('about') }}"
                       class="px-10 py-5 border border-white/10 rounded-full text-white uppercase tracking-[0.25em] text-[11px] font-bold hover:bg-white hover:text-slate-900 transition-all duration-300">
                        Explore Awards
                    </a>
                </div>

                {{-- TRUST BAR --}}
               <div class="mt-12 grid grid-cols-1 sm:grid-cols-3 gap-4 w-full max-w-xl">

                    <div class="rounded-2xl border border-white/10 bg-white/5 backdrop-blur-md p-4 sm:p-5">
                        <h3 class="text-xl sm:text-2xl font-black text-white break-words">500+</h3>
                        <p class="text-xs uppercase tracking-[0.25em] text-slate-400 mt-2">
                            Nominations
                        </p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-white/5 backdrop-blur-md p-4 sm:p-5">
                        <h3 class="text-xl sm:text-2xl font-black text-white break-words">50+</h3>
                        <p class="text-xs uppercase tracking-[0.25em] text-slate-400 mt-2">
                            Categories
                        </p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-white/5 backdrop-blur-md p-4 sm:p-5">
                        <h3 class="text-xl sm:text-2xl font-black text-white break-words">Global</h3>
                        <p class="text-xs uppercase tracking-[0.25em] text-slate-400 mt-2">
                            Recognition
                        </p>
                    </div>

                </div>
            </div>

            {{-- RIGHT --}}
            <div class="relative mt-10 lg:mt-0">

                {{-- FLOATING CARD --}}
                <div class="absolute -top-8 -left-6 z-30 hidden md:flex items-center gap-3 bg-black/50 backdrop-blur-xl border border-white/10 rounded-2xl px-5 py-4 shadow-2xl">
                  <div class="w-11 h-11 rounded-full bg-white/10 flex items-center justify-center text-white text-lg">
    ★
</div>

                    <div>
                        <p class="text-white font-black text-sm uppercase tracking-[0.2em]">
                            Elite Recognition
                        </p>
                        <p class="text-slate-400 text-xs">
                            Trusted nomination platform
                        </p>
                    </div>
                </div>

                {{-- MAIN IMAGE FRAME --}}
                <div class="relative z-20 rounded-[2.8rem] md:rounded-[4rem] p-[8px] shuka-border overflow-hidden shadow-[0_40px_120px_rgba(0,0,0,0.6)]">

                    <div class="relative overflow-hidden rounded-[2.3rem] md:rounded-[3.5rem] bg-slate-900 aspect-[4/5]">

                        {{-- OVERLAY --}}
                        <div class="absolute inset-0 z-10 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>

                        {{-- IMAGE --}}
                        <img
                            id="spotlight-image"
                            src="/images/grand.png"
                            class="w-full h-full object-cover transition-all duration-500 scale-100"
                            alt="Spotlight"
                        >

                        {{-- IMAGE INFO --}}
                        <div class="absolute bottom-0 left-0 z-20 w-full p-8">

                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-[10px] uppercase tracking-[0.35em] text-amber-400 font-black mb-2">
                                        Briwnet Awards
                                    </p>

                                    <h3 class="text-2xl md:text-3xl font-black text-white uppercase">
                                        Excellence Lives Here
                                    </h3>
                                </div>

                                <div class="hidden md:flex w-16 h-16 rounded-full border border-white/20 bg-white/10 backdrop-blur-md items-center justify-center text-white text-xl">
                                    ↗
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- GLOW --}}
                <div class="absolute inset-0 bg-red-600/10 rounded-[4rem] rotate-3 scale-105 blur-3xl -z-10"></div>

                {{-- FLOATING STATS --}}
                <div class="absolute -bottom-10 right-0 md:right-8 z-30 bg-black/60 backdrop-blur-xl border border-white/10 rounded-3xl px-6 py-5 shadow-2xl">

                    <div class="flex items-center gap-8">

                        <div>
                            <h3 class="text-3xl font-black text-white">2026</h3>
                            <p class="text-[10px] uppercase tracking-[0.3em] text-slate-400 mt-1">
                                Award Season
                            </p>
                        </div>

                        <div class="w-px h-12 bg-white/10"></div>

                        <div>
                            <h3 class="text-3xl font-black text-red-500">Live</h3>
                            <p class="text-[10px] uppercase tracking-[0.3em] text-slate-400 mt-1">
                                Nominations
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>

    {{-- COUNTDOWN SECTION --}}
    <section class="relative z-10 px-6 pb-24">
        <div class="max-w-7xl mx-auto">

            <div class="rounded-[2rem] border border-white/10 bg-white/5 backdrop-blur-xl p-8 md:p-12">

                <div class="flex flex-col lg:flex-row items-center justify-between gap-10">

                    <div class="max-w-xl text-center lg:text-left">
                        <p class="text-[10px] uppercase tracking-[0.4em] text-red-400 font-black mb-4">
                            Countdown To Closing
                        </p>

                        <h2 class="text-3xl md:text-5xl font-black text-white leading-tight uppercase">
                            Final Days To
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-amber-400">
                                Nominate
                            </span>
                        </h2>

                        <p class="text-slate-400 mt-5 leading-relaxed">
                            Submit your nomination before the official deadline and give exceptional talent the recognition they deserve.
                        </p>
                    </div>

                    {{-- TIMER --}}
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 w-full max-w-md">

                        @foreach(['days' => 'Days', 'hours' => 'Hrs', 'minutes' => 'Min', 'seconds' => 'Sec'] as $id => $label)

                        <div class="w-full min-w-0 h-20 sm:h-24 rounded-2xl bg-black/40 border border-white/10 flex flex-col items-center justify-center shadow-lg">

                            <span id="{{ $id }}"
                                  class="text-xl sm:text-2xl md:text-3xl font-black tabular-nums {{ $id === 'seconds' ? 'animate-blink-red' : 'text-white' }}">
                                00
                            </span>

                            <span class="text-[9px] uppercase tracking-[0.3em] text-slate-400 mt-3 font-bold">
                                {{ $label }}
                            </span>

                        </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>
    </section>
    {{-- IMPACT STATS --}}
<section class="relative z-10 px-6 pb-24">
    <div class="max-w-7xl mx-auto">

        <div class="rounded-[2.5rem] bg-white/5 border border-white/10 backdrop-blur-xl p-10 md:p-16">

            <div class="text-center mb-12">
                <p class="text-[10px] uppercase tracking-[0.18em] sm:tracking-[0.3em] text-red-400 font-black">
                    Platform Growth
                </p>
                <h2 class="text-3xl md:text-5xl font-black text-white uppercase mt-3">
                    Our Impact in Numbers
                </h2>
            </div>

           <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 text-center">

                @php
                    $stats = [
                        ['number' => '10K+', 'label' => 'Total Votes'],
                        ['number' => '2K+', 'label' => 'Nominees'],
                        ['number' => '50+', 'label' => 'Categories'],
                        ['number' => '15+', 'label' => 'Countries'],
                        ['number' => '500+', 'label' => 'Winners'],
                        ['number' => '100K+', 'label' => 'Visitors'],
                        ['number' => '24/7', 'label' => 'Active System'],
                        ['number' => 'Global', 'label' => 'Recognition'],
                    ];
                @endphp

                @foreach($stats as $stat)
                    <div class="p-4 sm:p-6 rounded-2xl bg-black/30 border border-white/10">
                        <h3 class="text-2xl sm:text-3xl md:text-4xl font-black text-white">
                            {{ $stat['number'] }}
                        </h3>
                        <p class="text-[10px] uppercase tracking-[0.3em] text-slate-400 mt-3">
                            {{ $stat['label'] }}
                        </p>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
</section>

    {{-- HOW IT WORKS --}}
<section class="relative z-10 px-6 pb-24">
    <div class="max-w-7xl mx-auto">

        <div class="text-center mb-14">
            <p class="text-[10px] uppercase tracking-[0.4em] text-amber-400 font-black">
                Simple Process
            </p>
            <h2 class="text-3xl md:text-5xl font-black text-white uppercase mt-3">
                How It Works
            </h2>
            <p class="text-slate-400 mt-4 max-w-2xl mx-auto">
                Nominate, review, vote, and celebrate excellence in a transparent system.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            @php
                $steps = [
                    ['icon' => '📝', 'title' => 'Nominate', 'desc' => 'Submit outstanding individuals or brands.'],
                    ['icon' => '🔍', 'title' => 'Review', 'desc' => 'All nominations are verified for eligibility.'],
                    ['icon' => '🗳️', 'title' => 'Vote', 'desc' => 'Public voting determines top candidates.'],
                    ['icon' => '🏆', 'title' => 'Win', 'desc' => 'Winners are officially recognized globally.'],
                ];
            @endphp

            @foreach($steps as $step)
                <div class="p-6 rounded-3xl bg-white/5 border border-white/10 backdrop-blur-xl text-center hover:scale-105 transition">
                    
                    <div class="text-4xl mb-4">{{ $step['icon'] }}</div>

                    <h3 class="text-white font-black uppercase tracking-[0.2em] text-sm">
                        {{ $step['title'] }}
                    </h3>

                    <p class="text-slate-400 text-sm mt-3">
                        {{ $step['desc'] }}
                    </p>
                </div>
            @endforeach

        </div>
    </div>
</section>

{{-- EVENT TIMELINE --}}
<section class="relative z-10 px-6 pb-24">
    <div class="max-w-6xl mx-auto">

        <div class="text-center mb-14">
            <p class="text-[10px] uppercase tracking-[0.4em] text-amber-400 font-black">
                Awards Journey
            </p>
            <h2 class="text-3xl md:text-5xl font-black text-white uppercase mt-3">
                Event Timeline
            </h2>
        </div>

        <div class="relative border-l border-white/10 ml-6">

            @php
                $timeline = [
                    ['date' => 'May 2026', 'title' => 'Nominations Open', 'desc' => 'Public nominations begin worldwide.'],
                    ['date' => 'July 2026', 'title' => 'Verification Phase', 'desc' => 'All entries are reviewed and approved.'],
                    ['date' => 'Aug 2026', 'title' => 'Voting Phase', 'desc' => 'Community voting officially starts.'],
                    ['date' => 'Aug 2026', 'title' => 'Final Selection', 'desc' => 'Top nominees are shortlisted.'],
                    ['date' => 'Sep 2026', 'title' => 'Awards Ceremony', 'desc' => 'Winners are celebrated globally.'],
                ];
            @endphp

            @foreach($timeline as $item)
                <div class="mb-10 ml-10 relative">

                    {{-- DOT --}}
                    <div class="absolute -left-[38px] top-2 w-4 h-4 bg-red-500 rounded-full shadow-lg"></div>

                    <div class="bg-white/5 border border-white/10 backdrop-blur-xl p-6 rounded-2xl hover:scale-105 transition">

                        <p class="text-[10px] uppercase tracking-[0.3em] text-red-400 font-black">
                            {{ $item['date'] }}
                        </p>

                        <h3 class="text-white font-black text-lg uppercase mt-2">
                            {{ $item['title'] }}
                        </h3>

                        <p class="text-slate-400 text-sm mt-2">
                            {{ $item['desc'] }}
                        </p>

                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>

{{-- FINAL CTA --}}
<section class="relative z-10 px-6 pb-32">
    <div class="max-w-5xl mx-auto">

        <div class="relative overflow-hidden rounded-[3rem] bg-gradient-to-r from-red-900/40 via-black/60 to-amber-900/30 border border-white/10 backdrop-blur-xl p-12 md:p-20 text-center">

            {{-- glow --}}
            <div class="absolute inset-0 bg-red-600/10 blur-3xl"></div>

            <div class="relative z-10">

                <h2 class="text-3xl md:text-5xl font-black text-white uppercase leading-tight">
                    Ready to Celebrate
                    <span class="text-red-500">Excellence?</span>
                </h2>

                <p class="text-slate-300 mt-6 max-w-2xl mx-auto">
                    Join thousands of voters and nominees shaping the future of recognition.
                    Your voice matters in choosing the next generation of leaders.
                </p>

                <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">

                    <a href="{{ route('nomination.create') }}"
                       class="px-10 py-5 bg-white text-black font-black uppercase tracking-[0.2em] rounded-full hover:scale-105 transition">
                        Nominate
                    </a>

                    <a href="{{ route('about') }}"
                       class="px-10 py-5 border border-white/20 text-white font-bold uppercase tracking-[0.2em] rounded-full hover:bg-white hover:text-black transition">
                        Learn More
                    </a>

                </div>

            </div>
        </div>

    </div>
</section>
</div>

<style>
  html,
body {
    overflow-x: hidden;
}

* {
    min-width: 0;
}
    .shuka-border {
        background: repeating-linear-gradient(
            45deg,
            #B22222,
            #B22222 10px,
            #000000 10px,
            #000000 12px,
            #B22222 12px,
            #B22222 22px,
            #1e293b 22px,
            #1e293b 24px
        );
    }

    @keyframes blink-red {
        0%, 100% {
            opacity: 1;
            color: #EF4444;
            text-shadow: 0 0 18px rgba(239, 68, 68, 0.9);
        }
        50% {
            opacity: 0.7;
            color: #B22222;
        }
    }

    .animate-blink-red {
        animation: blink-red 1s infinite;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // COUNTDOWN
    const target = new Date("June 18, 2026 23:59:59").getTime();

    function updateTimer() {

        const now = new Date().getTime();
        const gap = target - now;

        if (gap > 0) {

            const d = Math.floor(gap / 86400000).toString().padStart(2, '0');
            const h = Math.floor((gap % 86400000) / 3600000).toString().padStart(2, '0');
            const m = Math.floor((gap % 3600000) / 60000).toString().padStart(2, '0');
            const s = Math.floor((gap % 60000) / 1000).toString().padStart(2, '0');

            document.getElementById("days").textContent = d;
            document.getElementById("hours").textContent = h;
            document.getElementById("minutes").textContent = m;
            document.getElementById("seconds").textContent = s;
        }
    }

    setInterval(updateTimer, 1000);
    updateTimer();

    // STORY ROTATION
    const stories = document.querySelectorAll('.story-slide');
    const spotlightImg = document.getElementById('spotlight-image');

    let index = 0;

    function rotate() {

        stories[index].classList.remove('opacity-100', 'translate-y-0', 'z-10');
        stories[index].classList.add('opacity-0', 'translate-y-4', 'z-0');

        index = (index + 1) % stories.length;

        stories[index].classList.remove('opacity-0', 'translate-y-4', 'z-0');
        stories[index].classList.add('opacity-100', 'translate-y-0', 'z-10');

        if (spotlightImg) {

            spotlightImg.style.opacity = '0.6';
            spotlightImg.style.transform = 'scale(1.03)';

            setTimeout(() => {

                spotlightImg.src = stories[index].getAttribute('data-image');

                spotlightImg.style.opacity = '1';
                spotlightImg.style.transform = 'scale(1)';

            }, 250);
        }
    }

    setInterval(rotate, 3500);
});
</script>
@endsection