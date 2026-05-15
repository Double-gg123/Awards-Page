@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#0F172A] relative overflow-hidden pt-20">
    
    {{-- Dark Luminous Background Glows --}}
    <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-red-900/10 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-blue-900/10 rounded-full blur-[120px]"></div>

    <section class="relative pt-24 pb-16 px-6">
        <div class="max-w-7xl mx-auto text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-slate-800/50 border border-white/5 mb-8 shadow-sm">
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400">Awards Arena 2026</span>
            </div>
            
            <h1 class="text-6xl md:text-8xl font-black text-white tracking-tighter leading-none uppercase mb-6">
                THE <span class="font-serif text-transparent bg-clip-text bg-gradient-to-r from-yellow-600 to-amber-400">LINEUP</span>
            </h1>
            <p class="text-slate-400 max-w-xl mx-auto text-lg font-medium leading-relaxed font-serif uppercase tracking-tight">
                Discover the categories shaping the future of digital excellence and cultural impact.
            </p>
        </div>
    </section>

    <section class="relative z-10 pb-32 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @foreach($categories as $category)
                <div class="group relative">
                    {{-- Surface Card --}}
                    <div class="relative bg-[#1E293B]/50 backdrop-blur-xl border border-white/5 p-8 rounded-[2rem] shadow-2xl hover:shadow-red-900/20 hover:-translate-y-2 transition-all duration-500 overflow-hidden h-full">
                        
                        {{-- Subtle Dark Accent --}}
                        <div class="absolute top-0 right-0 w-24 h-24 bg-white/5 rounded-bl-full translate-x-12 -translate-y-12 group-hover:translate-x-8 group-hover:-translate-y-8 transition-all duration-700"></div>

                        <div class="flex items-center gap-5 mb-10">
                            <div class="w-16 h-16 bg-[#0F172A] border border-white/10 rounded-2xl flex items-center justify-center text-3xl shadow-sm group-hover:bg-white group-hover:text-black transition-all duration-500">
                                {{ $category->icon ?? '🏆' }}
                            </div>
                            <div>
                                <h2 class="text-2xl font-black text-white uppercase tracking-tight leading-none">
                                    {{ $category->name }}
                                </h2>
                                <p class="text-[10px] text-amber-500 font-black uppercase tracking-widest mt-2">
                                    {{ $category->subcategories->count() }} Recognition Tiers
                                </p>
                            </div>
                        </div>

                        {{-- Award Links --}}
                        <div class="space-y-3 flex-grow">
                            @forelse($category->subcategories as $sub)
                            <a href="{{ route('nominate', $category->slug) }}" 
                               class="group/item flex items-center justify-between p-4 rounded-xl bg-[#0F172A]/40 border border-white/[0.03] hover:border-amber-500/30 hover:bg-[#0F172A] transition-all">
                                <span class="text-slate-400 group-hover/item:text-white text-sm font-bold transition-colors">
                                    {{ $sub->name }}
                                </span>
                                <div class="opacity-0 group-hover/item:opacity-100 translate-x-[-10px] group-hover/item:translate-x-0 transition-all">
                                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </div>
                            </a>
                            @empty
                            <div class="text-center py-6 border border-dashed border-white/10 rounded-2xl">
                                <span class="text-slate-500 text-[10px] uppercase font-black tracking-widest">Awaiting Announcement</span>
                            </div>
                            @endforelse
                        </div>

                        <div class="mt-8 pt-6 border-t border-white/5">
                            <a href="{{ route('nominate', $category->slug) }}" class="text-[10px] font-black uppercase tracking-widest text-slate-500 group-hover:text-white transition-colors">
                                Enter Nomination Form →
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
</div>

<style>
    /* Dark Mode Scrollbar */
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: #0F172A; }
    ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 10px; }
    ::-webkit-scrollbar-thumb:hover { background: #334155; }
</style>
@endsection