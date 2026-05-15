<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Briwnet Awards | Luminous Edition</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&family=Playfair+Display:wght@900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --polo-blue: #8DA9C4;
            --maasai-red: #B22222;
            --bg-deep: #0F172A;
            --surface-card: #1E293B;
            --text-main: #F8FAFC;
            --text-muted: #94A3B8;
        }
        body {
            background-color: var(--bg-deep);
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            margin: 0;
            overflow-x: hidden;
            padding-bottom: 80px;
        }
          
        @media (min-width: 768px) {
            body { padding-bottom: 0; }
        }
          /* prevent horizontal scroll */

/* improve nav spacing on small screens */
@media (max-width: 768px) {
    nav .container {
        padding: 12px 16px;
    }
}

/* fix footer layout on small screens */
@media (max-width: 768px) {
    footer .grid {
        grid-template-columns: 1fr !important;
    }
}
        .glass-nav {
            backdrop-filter: blur(12px);
            background: rgba(15, 23, 42, 0.85);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.4);
        }
        .mobile-bottom-nav {
            backdrop-filter: blur(15px);
            background: rgba(30, 41, 59, 0.95);
            border-top: 1px solid var(--maasai-red);
            box-shadow: 0 -10px 30px rgba(0,0,0,0.3);
        }
        .logo-text {
            font-family: 'Playfair Display', serif;
            color: #FFFFFF;
            font-weight: 900;
        }
        .nav-link {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: var(--text-muted);
            transition: all 0.3s ease;
        }
        .nav-link:hover, .nav-link.active {
            color: #FFFFFF;
        }
        .mobile-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            font-weight: 900;
            text-transform: uppercase;
            color: var(--text-muted);
        }
        .mobile-link.active { color: white; }
        .mobile-link.active i { color: var(--maasai-red); }
    </style>
</head>
<body>
<nav class="glass-nav fixed w-full z-[100] top-0">
    <div class="container mx-auto flex justify-between items-center px-6 py-5">

        <!-- LOGO -->
        <a href="/home" class="text-2xl logo-text">
            Briwnet Awards
        </a>

        <!-- DESKTOP MENU -->
        <div class="hidden md:flex space-x-10">
            <a href="/home" class="nav-link {{ Request::is('home') || Request::is('/') ? 'active' : '' }}">Home</a>
            <a href="/about" class="nav-link {{ Request::is('about*') ? 'active' : '' }}">About</a>
            <a href="/nominations" class="nav-link {{ Request::is('nominations*') ? 'active' : '' }}">Nominees</a>
            <a href="/categories" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">Categories</a>
            <a href="/contact" class="nav-link {{ Request::is('contact*') ? 'active' : '' }}">Contact</a>
        </div>

        <!-- DESKTOP BUTTON -->
        <a href="/nomination"
           class="hidden md:block px-8 py-3 btn-nominate-blink text-[10px] font-black uppercase tracking-widest rounded-full bg-red-600 text-white">
            Nominate Now
        </a>

        <!-- MOBILE NOMINATE BUTTON 
        <a href="/nomination"
           class="md:hidden w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white shadow-lg animate-pulse">
            <i class="fa fa-plus"></i>
        </a>-->

        <!-- HAMBURGER -->
        <button id="menuBtn" class="md:hidden text-white text-2xl ml-3">
            <i class="fa fa-bars"></i>
        </button>

    </div>
</nav>

<!-- ================= MOBILE FULLSCREEN MENU ================= -->
<div id="mobileMenu"
     class="fixed top-0 left-0 w-full h-full bg-[#0F172A] z-[200] hidden">

    <!-- HEADER -->
    <div class="flex justify-between items-center px-6 py-5 border-b border-white/10">
        <h2 class="text-white font-black text-lg">Menu</h2>
        <button id="closeMenu" class="text-white text-2xl">
            <i class="fa fa-times"></i>
        </button>
    </div>

    <!-- LINKS -->
    <div class="flex flex-col gap-6 p-8 text-white text-lg font-semibold">
        <a href="/home">Home</a>
        <a href="/about">About</a>
        <a href="/nominations">Nominees</a>
        <a href="/categories">Categories</a>
        <a href="/contact">Contact</a>

        <a href="/nomination" class="text-red-500 font-bold mt-6">
            Nominate Now
        </a>
    </div>
</div>

<!-- ================= MOBILE BOTTOM NAV ================= -->
<div class="md:hidden fixed bottom-0 left-0 w-full z-[100] mobile-bottom-nav px-4 py-3">
    <div class="flex justify-between items-center">

        <a href="/home" class="mobile-link {{ Request::is('home') || Request::is('/') ? 'active' : '' }}">
            <i class="fa fa-home text-lg mb-1"></i>
            <span>Home</span>
        </a>

        <a href="/nominations" class="mobile-link {{ Request::is('nominations*') ? 'active' : '' }}">
            <i class="fa fa-users text-lg mb-1"></i>
            <span>Nominees</span>
        </a>

        <a href="/categories" class="mobile-link {{ Request::is('categories*') ? 'active' : '' }}">
            <i class="fa fa-layer-group text-lg mb-1"></i>
            <span>Categories</span>
        </a>

        <a href="/contact" class="mobile-link {{ Request::is('contact*') ? 'active' : '' }}">
            <i class="fa fa-envelope text-lg mb-1"></i>
            <span>Contact</span>
        </a>

    </div>
</div>

<div class="md:hidden fixed bottom-0 left-0 w-full z-[100] mobile-bottom-nav px-4 py-3">
    <div class="flex justify-between items-center">
        <a href="/home" class="mobile-link {{ Request::is('home') || Request::is('/') ? 'active' : '' }}">
            <i class="fa fa-home text-lg mb-1"></i>
            <span>Home</span>
        </a>
        <a href="/nominations" class="mobile-link {{ Request::is('nominations*') ? 'active' : '' }}">
            <i class="fa fa-users text-lg mb-1"></i>
            <span>Nominees</span>
        </a>
        <a href="/categories" class="mobile-link {{ Request::is('categories*') ? 'active' : '' }}">
            <i class="fa fa-layer-group text-lg mb-1"></i>
            <span>Categories</span>
        </a>
        <a href="/contact" class="mobile-link {{ Request::is('contact*') ? 'active' : '' }}">
            <i class="fa fa-envelope text-lg mb-1"></i>
            <span>Contact</span>
        </a>
    </div>
</div>

<main>
    @yield('content')
</main>

<!-- Updated Footer with Contact Details -->
<footer class="pt-24 pb-12 px-6 border-t border-white/5 bg-[#0F172A]">
    <div class="container mx-auto grid md:grid-cols-12 gap-16 mb-20">
        <div class="md:col-span-5 text-left">
            <h2 class="text-3xl font-black logo-text mb-6">Briwnet Awards</h2>
            <p class="text-slate-400 text-lg leading-relaxed mb-10 max-w-sm">Honoring the grace, talent, and visionaries shaping our future.</p>
            <div class="flex space-x-4">
                @foreach(['facebook-f', 'tiktok', 'instagram', 'twitter'] as $icon)
                <a href="#" class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center text-slate-400 hover:text-white transition-all">
                    <i class="fab fa-{{ $icon }}"></i>
                </a>
                @endforeach
            </div>
        </div>
        <div class="md:col-span-7 grid grid-cols-2 gap-10">
            <div>
                <h4 class="text-white text-[10px] font-black uppercase tracking-widest mb-8">Navigation</h4>
                <ul class="space-y-4 text-slate-400 text-sm font-semibold">
                    <li><a href="/home" class="hover:text-white">Home</a></li>
                    <li><a href="/categories" class="hover:text-white">Categories</a></li>
                    <li><a href="/about" class="hover:text-white">About</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white text-[10px] font-black uppercase tracking-widest mb-8">Contact</h4>
                <ul class="space-y-4 text-slate-400 text-sm font-semibold">
                    <li class="flex items-center gap-3">
                        <i class="fa fa-map-marker-alt text-amber-400"></i>
                        Nairobi, Kenya
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa fa-phone text-amber-400"></i>
                        +254 742 831 859
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa fa-envelope text-amber-400"></i>
                        info@briwnet.co.ke
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Legal Links Row -->
    <div class="border-t border-white/10 pt-8">
        <div class="container mx-auto px-6">
            <div class="flex flex-wrap justify-center md:justify-between items-center gap-6 text-sm text-slate-400">
                <p>&copy; {{ date('Y') }} Briwnet Awards. All Rights Reserved.</p>
                
                <div class="flex flex-wrap justify-center gap-x-8 gap-y-2">
                    <a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="{{ route('terms') }}" class="hover:text-white transition-colors">Terms & Conditions</a>
                    <a href="{{ route('cookie') }}" class="hover:text-white transition-colors">Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>
  
  
<script>
    const menuBtn = document.getElementById("menuBtn");
    const mobileMenu = document.getElementById("mobileMenu");
    const closeMenu = document.getElementById("closeMenu");

    menuBtn.addEventListener("click", () => {
        mobileMenu.classList.remove("hidden");
        document.body.style.overflow = "hidden";
    });

    closeMenu.addEventListener("click", () => {
        mobileMenu.classList.add("hidden");
        document.body.style.overflow = "auto";
    });

    // close when clicking link
    document.querySelectorAll("#mobileMenu a").forEach(link => {
        link.addEventListener("click", () => {
            mobileMenu.classList.add("hidden");
            document.body.style.overflow = "auto";
        });
    });
</script>
</body>
  
</html>