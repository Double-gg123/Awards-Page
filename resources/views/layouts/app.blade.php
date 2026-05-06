<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Award Platform | Luminous Edition</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&family=Playfair+Display:ital,wght@0,900;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --polo-blue: #8DA9C4;
            --muted-wood: #8B735B;
            --bg-pure: #FFFFFF;
            --text-main: #1A1A1A;
            --deep-navy: #1E293B;
        }

        body {
            background-color: var(--bg-pure);
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            margin: 0;
            overflow-x: hidden;
        }

        .glass-nav {
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.9);
            border-bottom: 1px solid rgba(141, 169, 196, 0.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .logo-text {
            font-family: 'Playfair Display', serif;
            color: var(--deep-navy);
            font-weight: 900;
        }

        .nav-link {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: #717171;
            transition: all 0.3s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--polo-blue);
        }

        .btn-nominate-blink {
            animation: attentionBlink 2s infinite ease-in-out;
            color: white;
            box-shadow: 0 10px 20px rgba(141, 169, 196, 0.2);
        }

        @keyframes attentionBlink {
            0%, 100% { 
                background-color: var(--polo-blue); 
                transform: scale(1);
                box-shadow: 0 0 15px rgba(141, 169, 196, 0.4);
            }
            50% { 
                background-color: #ef4444;
                transform: scale(1.05);
                box-shadow: 0 0 25px rgba(239, 68, 68, 0.6);
            }
        }

        .glow-red {
            color: #ef4444;
            text-shadow: 0 0 8px rgba(239, 68, 68, 0.6);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>

<nav class="glass-nav fixed w-full z-[100] top-0">
    <div class="container mx-auto flex justify-between items-center px-6 py-5">
        <a href="/home" class="text-2xl logo-text italic">Briwnet Awards</a>
        
        <div class="hidden md:flex space-x-10">
            <a href="/home" class="nav-link {{ Request::is('home') || Request::is('/') ? 'active' : '' }}">Home</a>
            <a href="/nominations" class="nav-link {{ Request::is('nominations*') ? 'active' : '' }}">Nominees</a>
            <a href="/categories" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">Categories</a>
            <a href="/contact" class="nav-link {{ Request::is('contact*') ? 'active' : '' }}">Contact</a>
        </div>

        <a href="/nomination" class="hidden md:block px-8 py-3 btn-nominate-blink text-[10px] font-black uppercase tracking-widest rounded-full">
            Nominate Now
        </a>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="pt-24 pb-12 px-6 border-t border-black/5 bg-white">
    <div class="container mx-auto grid md:grid-cols-12 gap-16 mb-20">
        <div class="md:col-span-5 text-left">
            <h2 class="text-3xl font-black logo-text italic mb-6">Briwnet Awards</h2>
            <p class="text-slate-500 text-lg leading-relaxed mb-10 max-w-sm">Honoring the grace, talent, and visionaries shaping our future.</p>
            <div class="flex space-x-4">
                @foreach(['facebook-f', 'tiktok', 'instagram', 'twitter'] as $icon)
                <a href="#" class="w-12 h-12 rounded-full border border-black/5 flex items-center justify-center text-slate-400 hover:text-[#8DA9C4] hover:border-[#8DA9C4] transition-all">
                    <i class="fab fa-{{ $icon }}"></i>
                </a>
                @endforeach
            </div>
        </div>
        <div class="md:col-span-7 grid grid-cols-2 gap-10">
            <div>
                <h4 class="text-black text-[10px] font-black uppercase tracking-widest mb-8">Navigation</h4>
                <ul class="space-y-4 text-slate-400 text-sm font-semibold">
                    <li><a href="/home" class="hover:text-[#8DA9C4]">Home</a></li>
                    <li><a href="/categories" class="hover:text-[#8DA9C4]">Categories</a></li>
                    <li><a href="/about" class="hover:text-[#8DA9C4]">About</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-black text-[10px] font-black uppercase tracking-widest mb-8">Contact</h4>
                <p class="text-slate-400 text-sm font-semibold leading-loose">Nairobi, Kenya</p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>