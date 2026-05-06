@extends('layouts.app')

@section('content')
<div class="bg-white w-full overflow-x-hidden" style="font-family: 'Inter', sans-serif;">
    <section class="relative w-full px-6 pt-32 pb-16">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            
            <div class="flex flex-col items-center md:items-start text-center md:text-left order-1">
                
                <div class="mb-8 inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-50 border border-red-100">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-600"></span>
                    </span>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-red-600">Nomination Live Now</span>
                </div>

                <div id="hero-stories" class="grid grid-cols-1 w-full">
                    @php
                        $slides = [
                            ['title' => 'Briwnet Awards', 'year' => '2026', 'desc' => 'The ultimate stage for excellence in global innovation.', 'img' => 'grand.png'],
                            ['title' => 'Beyond the', 'year' => 'LIMITS', 'desc' => 'Honoring fearless brilliance and architectural mastery.', 'img' => 'innovation.png'],
                            ['title' => 'Chosen by', 'year' => 'THE PEOPLE', 'desc' => 'The community defines the victory of the legends.', 'img' => 'network.png'],
                            ['title' => 'Architects of', 'year' => 'TOMORROW', 'desc' => 'Spotlighting the visionaries of our generation.', 'img' => 'recognize.png'],
                            ['title' => 'Pure Elite', 'year' => 'PRESTIGE', 'desc' => 'A curated evening for the finest minds.', 'img' => 'trophies.png'],
                            ['title' => 'Witness the', 'year' => 'CROWNING', 'desc' => 'The lights go up, the legends are made.', 'img' => 'trophy.png']
                        ];
                    @endphp

                    @foreach($slides as $index => $slide)
                    <div class="story-slide col-start-1 row-start-1 {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }} transition-opacity duration-700" data-image="/images/{{ $slide['img'] }}">
                        <h1 class="text-4xl md:text-7xl lg:text-[5.5rem] font-black tracking-tighter leading-[0.9] text-slate-900 uppercase">
                            {{ $slide['title'] }}<br>
                            <span style="color: #8DA9C4;" class="tracking-widest font-light">{{ $slide['year'] }}</span>
                        </h1>
                        <p class="text-slate-500 font-medium text-lg mt-6 mb-8 max-w-md mx-auto md:mx-0 leading-relaxed">
                            {{ $slide['desc'] }}
                        </p>
                    </div>
                    @endforeach
                </div>

                <div class="mt-4 mb-12 flex items-center justify-center md:justify-start gap-3">
                    @foreach(['days' => 'Days', 'hours' => 'Hrs', 'minutes' => 'Min', 'seconds' => 'Sec'] as $id => $label)
                        <div class="flex flex-col items-center">
                            <div class="w-14 h-14 md:w-16 md:h-16 rounded-xl bg-white border border-slate-200 flex items-center justify-center shadow-sm">
                                <span id="{{ $id }}" class="text-lg md:text-xl font-black glow-red tabular-nums">00</span>
                            </div>
                            <span style="color: #8B735B;" class="text-[8px] font-bold uppercase tracking-widest mt-3">{{ $label }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="w-full flex justify-center md:justify-start">
                    <a href="{{ route('nomination.create') }}" 
                       class="px-12 py-5 bg-slate-900 text-white font-black uppercase tracking-[0.3em] text-xs rounded-full shadow-2xl hover:scale-105 transition-all duration-300">
                        Nominate Now
                    </a>
                </div>
            </div>

            <div class="relative block order-2 mt-12 md:mt-0">
                <div class="relative z-20 rounded-[2.5rem] md:rounded-[4rem] overflow-hidden shadow-2xl aspect-[4/5] bg-slate-50 border-[10px] border-white">
                    <img id="spotlight-image" src="/images/grand.png" class="w-full h-full object-cover transition-opacity duration-500" alt="Spotlight">
                </div>
                <div class="absolute inset-0 bg-[#8DA9C4]/10 rounded-[2.5rem] md:rounded-[4rem] rotate-3 scale-105 -z-10"></div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const target = new Date("June 18, 2026 23:59:59").getTime();
        
        function updateTimer() {
            const now = new Date().getTime();
            const gap = target - now;
            if (gap > 0) {
                const d = Math.floor(gap / 86400000).toString().padStart(2, '0');
                const h = Math.floor((gap % 86400000) / 3600000).toString().padStart(2, '0');
                const m = Math.floor((gap % 3600000) / 60000).toString().padStart(2, '0');
                const s = Math.floor((gap % 60000) / 1000).toString().padStart(2, '0');

                updateElement("days", d);
                updateElement("hours", h);
                updateElement("minutes", m);
                updateElement("seconds", s);
            }
        }

        function updateElement(id, value) {
            const el = document.getElementById(id);
            if (el.textContent !== value) {
                el.textContent = value;
                el.style.transform = "scale(1.1)";
                el.style.textShadow = "0 0 15px rgba(239, 68, 68, 0.9)";
                setTimeout(() => {
                    el.style.transform = "scale(1)";
                    el.style.textShadow = "0 0 8px rgba(239, 68, 68, 0.6)";
                }, 200);
            }
        }

        setInterval(updateTimer, 1000);
        updateTimer();

        const stories = document.querySelectorAll('.story-slide');
        const spotlightImg = document.getElementById('spotlight-image');
        let index = 0;

        function rotate() {
            stories[index].classList.replace('opacity-100', 'opacity-0');
            stories[index].classList.replace('z-10', 'z-0');
            index = (index + 1) % stories.length;
            stories[index].classList.replace('opacity-0', 'opacity-100');
            stories[index].classList.replace('z-0', 'z-10');
            
            if(spotlightImg) {
                spotlightImg.style.opacity = '0.7';
                setTimeout(() => {
                    spotlightImg.src = stories[index].getAttribute('data-image');
                    spotlightImg.style.opacity = '1';
                }, 200);
            }
        }
        setInterval(rotate, 6500);
    });
</script>
@endsection