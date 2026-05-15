@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#0F172A] py-24 flex items-center justify-center">
    <div class="max-w-3xl w-full bg-[#151E3F]/90 border border-white/10 rounded-[3rem] p-12 text-center shadow-2xl">
        <h1 class="text-5xl font-black text-white uppercase tracking-[0.2em] mb-6">Thank You!</h1>
        <p class="text-slate-300 text-lg leading-relaxed mb-8">
            Your nomination has been received. We appreciate your contribution to celebrating outstanding talent.
        </p>
        <div class="space-x-4">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-8 py-4 bg-amber-500 text-slate-900 font-bold uppercase tracking-[0.2em] rounded-full hover:bg-amber-400 transition">Back to Home</a>
            <a href="{{ route('nominations.index') }}" class="inline-flex items-center justify-center px-8 py-4 border border-white/10 text-white font-bold uppercase tracking-[0.2em] rounded-full hover:bg-white/5 transition">View Nominees</a>
        </div>
    </div>
</div>
@endsection
