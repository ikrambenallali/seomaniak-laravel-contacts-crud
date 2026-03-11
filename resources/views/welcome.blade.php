{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['"Cormorant Garamond"', 'serif'],
                        body:    ['Jost', 'sans-serif'],
                    },
                    colors: {
                        rose: {
                            blush:  '#fdf0f3',
                            light:  '#f0d0da',
                            mid:    '#e8a8bb',
                            DEFAULT:'#c9748f',
                            deep:   '#b05c77',
                        },
                        gold:  '#c9a96e',
                        ink:   '#3a2a30',
                        muted: '#7a5c65',
                    },
                    keyframes: {
                        fadeUp: {
                            '0%':   { opacity: '0', transform: 'translateY(28px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        sparkle: {
                            '0%,100%': { opacity: '1',   transform: 'scale(1)' },
                            '50%':     { opacity: '0.3', transform: 'scale(0.7)' },
                        },
                        float: {
                            '0%,100%': { transform: 'translateY(0px)' },
                            '50%':     { transform: 'translateY(-12px)' },
                        },
                        shimmer: {
                            '0%':   { backgroundPosition: '-200% center' },
                            '100%': { backgroundPosition: '200% center' },
                        },
                    },
                    animation: {
                        'fade-up':      'fadeUp .7s ease both',
                        'fade-up-slow': 'fadeUp 1s ease both',
                        'sparkle':      'sparkle 3s ease-in-out infinite',
                        'float':        'float 4s ease-in-out infinite',
                    },
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Jost', sans-serif; }
        .delay-100 { animation-delay: .1s }
        .delay-200 { animation-delay: .2s }
        .delay-300 { animation-delay: .3s }
        .delay-500 { animation-delay: .5s }

        .petal {
            position: absolute;
            border-radius: 50% 0 50% 0;
            opacity: .15;
            pointer-events: none;
        }

        .shimmer-text {
            background: linear-gradient(
                90deg,
                #c9748f 0%, #c9a96e 30%, #e8a8bb 50%, #c9a96e 70%, #c9748f 100%
            );
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 4s linear infinite;
        }

        .glass-card {
            background: rgba(255,255,255,.78);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }
    </style>
</head>

<body class="min-h-screen bg-rose-blush overflow-x-hidden"
      style="background-image: radial-gradient(ellipse at 5% 10%, #f9e0e8 0%, transparent 45%),
                                radial-gradient(ellipse at 95% 85%, #ead5e6 0%, transparent 45%),
                                radial-gradient(ellipse at 60% 40%, #fce8ee 0%, transparent 55%);">

   

    {{-- ── Hero ── --}}
    <main class="relative z-10 flex flex-col items-center justify-center min-h-screen px-6 text-center">

        {{-- Ornement haut --}}
        <div class="animate-fade-up flex items-center gap-3 mb-6">
            <span class="w-16 h-px bg-gradient-to-r from-transparent to-gold opacity-60"></span>
            <span class="text-gold text-xs animate-sparkle">✦</span>
            <span class="w-16 h-px bg-gradient-to-l from-transparent to-gold opacity-60"></span>
        </div>

        {{-- Sous-titre --}}
        <p class="animate-fade-up delay-100 font-body text-[11px] tracking-[.4em] uppercase text-muted mb-4">
            Bienvenue sur
        </p>

        {{-- Titre --}}
        <h1 class="animate-fade-up delay-200 font-display font-light leading-none mb-3"
            style="font-size: clamp(3.5rem, 10vw, 7rem);">
            <span class="shimmer-text">{{ config('app.name', 'MonApp') }}</span>
        </h1>

        {{-- Tagline --}}
        <p class="animate-fade-up delay-300 font-display italic font-light text-muted mb-12"
           style="font-size: clamp(1rem, 2.5vw, 1.4rem); letter-spacing: .06em;">
            Gérez vos contacts avec élégance
        </p>

        {{-- Bouton unique → Contacts --}}
        <div class="animate-fade-up delay-500">
            <a href="{{ route('contacts.index') }}"
               class="inline-flex items-center gap-2
                      bg-gradient-to-r from-rose to-rose-deep text-white
                      font-body text-xs font-medium tracking-[.22em] uppercase
                      px-10 py-4 rounded-full shadow-xl shadow-rose/30
                      transition-all duration-200 hover:-translate-y-1 hover:shadow-2xl hover:shadow-rose/40">
                <span class="text-sm">✦</span>
                Voir mes contacts
            </a>
        </div>

        {{-- Ornement bas --}}
        <div class="animate-fade-up delay-500 flex items-center gap-3 mt-14">
            <span class="w-8 h-px bg-rose-mid opacity-50"></span>
            <span class="text-rose-mid text-[10px] animate-sparkle">✦</span>
            <span class="w-8 h-px bg-rose-mid opacity-50"></span>
        </div>

    </main>

    {{-- ── Footer ── --}}
    <footer class="relative z-10 text-center pb-8 -mt-16">
        <p class="font-body text-[11px] tracking-[.2em] uppercase text-muted opacity-50">
            Laravel {{ Illuminate\Foundation\Application::VERSION }} &nbsp;·&nbsp; PHP {{ PHP_VERSION }}
        </p>
    </footer>

</body>
</html>