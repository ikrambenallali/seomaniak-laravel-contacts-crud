{{-- resources/views/contacts/show.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $contact->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
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
                            '0%':   { opacity: '0', transform: 'translateY(24px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        sparkle: {
                            '0%,100%': { opacity: '1',   transform: 'scale(1)' },
                            '50%':     { opacity: '0.3', transform: 'scale(0.75)' },
                        },
                        float: {
                            '0%,100%': { transform: 'translateY(0px)' },
                            '50%':     { transform: 'translateY(-8px)' },
                        },
                    },
                    animation: {
                        'fade-up': 'fadeUp .6s ease both',
                        'sparkle': 'sparkle 2.5s ease-in-out infinite',
                        'float':   'float 4s ease-in-out infinite',
                    },
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Jost', sans-serif; }
        .delay-100 { animation-delay: .1s }
        .delay-200 { animation-delay: .2s }
        .glass { background: rgba(255,255,255,.82); backdrop-filter: blur(14px); }
    </style>
</head>

<body class="min-h-screen bg-rose-blush px-4 py-12 overflow-x-hidden"
      style="background-image: radial-gradient(ellipse at 10% 20%, #f7dde5, transparent 50%),
                                radial-gradient(ellipse at 90% 80%, #ead5e6, transparent 50%);">

   

    <div class="max-w-lg mx-auto relative z-10">

        {{-- ── En-tête page ── --}}
        <div class="text-center mb-8 animate-fade-up">
            <h1 class="font-display text-5xl font-light tracking-widest text-ink uppercase">
                Fiche Contact
            </h1>
           
        </div>

        {{-- ── Carte ── --}}
        <div class="animate-fade-up delay-100 rounded-2xl border border-rose-light overflow-hidden
                    shadow-[0_16px_48px_rgba(180,100,120,.12)]">

            {{-- Header rose avec avatar centré --}}
            <div class="bg-gradient-to-br from-rose-light via-rose-mid to-rose
                        flex flex-col items-center justify-center pt-10 pb-10 text-center">

                {{-- Initiale --}}
                <div class="w-20 h-20 rounded-full bg-white shadow-lg shadow-rose/20
                            flex items-center justify-center mb-5">
                    <span class="font-display text-4xl font-semibold text-rose leading-none">
                        {{ strtoupper(substr($contact->name, 0, 1)) }}
                    </span>
                </div>

                {{-- Nom --}}
                <h2 class="font-display text-3xl font-semibold text-ink tracking-wide">
                    {{ $contact->name }}
                </h2>
            </div>

            {{-- Champs info --}}
            <div class="bg-white px-6 py-6 space-y-4">

                {{-- Email --}}
                <div class="flex items-center gap-4 border border-rose-light rounded-xl px-5 py-4
                            transition duration-200 hover:border-rose-mid hover:shadow-sm">
                    <div class="w-10 h-10 rounded-lg bg-rose-blush border border-rose-light
                                flex items-center justify-center text-rose flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5a2.25 2.25 0 00-2.25 2.25m19.5 0l-9.75 6.75L2.25 6.75"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-medium tracking-[.22em] uppercase text-muted mb-0.5">
                            E-mail
                        </p>
                        <p class="font-body text-sm text-ink">{{ $contact->email }}</p>
                    </div>
                </div>

                {{-- Téléphone --}}
                <div class="flex items-center gap-4 border border-rose-light rounded-xl px-5 py-4
                            transition duration-200 hover:border-rose-mid hover:shadow-sm">
                    <div class="w-10 h-10 rounded-lg bg-rose-blush border border-rose-light
                                flex items-center justify-center text-rose flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-medium tracking-[.22em] uppercase text-muted mb-0.5">
                            Téléphone
                        </p>
                        <p class="font-body text-sm text-ink">{{ $contact->phone }}</p>
                    </div>
                </div>

            </div>
        </div>

        {{-- ── Actions ── --}}
        <div class="animate-fade-up delay-200 flex items-center justify-between mt-6 px-1">

            <a href="{{ route('contacts.index') }}"
               class="font-body text-xs tracking-[.16em] uppercase text-muted
                      transition hover:text-rose">
                ← Retour
            </a>

            <div class="flex items-center gap-3">

                <a href="{{ route('contacts.edit', $contact->id) }}"
                   class="font-body text-xs font-medium tracking-[.14em] uppercase
                          text-gold border border-gold px-5 py-2.5 rounded-full
                          transition-all duration-200 hover:bg-gold hover:text-white hover:-translate-y-px">
                    Modifier
                </a>

                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="font-body text-xs font-medium tracking-[.14em] uppercase
                                   text-rose border border-rose-mid px-5 py-2.5 rounded-full
                                   transition-all duration-200 hover:bg-rose hover:text-white hover:-translate-y-px
                                   cursor-pointer">
                        Supprimer
                    </button>
                </form>

            </div>
        </div>

    </div>
</body>
</html>