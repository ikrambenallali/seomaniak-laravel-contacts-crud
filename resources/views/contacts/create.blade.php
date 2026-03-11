{{-- resources/views/contacts/create.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
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
                    },
                    animation: {
                        'fade-up': 'fadeUp .55s ease both',
                        'sparkle': 'sparkle 2.5s ease-in-out infinite',
                    },
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-rose-blush px-4 py-12 font-body"
      style="background-image: radial-gradient(ellipse at 10% 20%, #f7dde5, transparent 50%), radial-gradient(ellipse at 90% 80%, #ead5e6, transparent 50%);">

    <div class="max-w-lg mx-auto">

        {{-- ── En-tête ── --}}
        <div class="text-center mb-10">
            <h1 class="font-display text-5xl font-light tracking-widest text-ink uppercase">
                Nouveau <em class="not-italic text-rose">Contact</em>
            </h1>
          
          
        </div>

        {{-- ── Carte Formulaire ── --}}
        <div class="animate-fade-up rounded-2xl border border-rose-light px-8 py-10
                    shadow-[0_16px_48px_rgba(180,100,120,.10)]"
             style="background: rgba(255,255,255,.85); backdrop-filter: blur(12px);">

            <form action="{{ route('contacts.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Nom --}}
                <div class="group">
                    <label class="block text-[11px] font-medium tracking-[.22em] uppercase text-muted mb-2">
                        Nom
                    </label>
                    <input type="text" name="name" placeholder="Marie Dupont"
                           value="{{ old('name') }}"
                           class="w-full bg-rose-blush border border-rose-light rounded-xl px-4 py-3
                                  font-body text-sm text-ink placeholder-rose-mid/60
                                  outline-none transition-all duration-200
                                  focus:border-rose focus:ring-2 focus:ring-rose/20
                                  hover:border-rose-mid">
                    @error('name')
                        <p class="mt-1.5 text-xs text-rose">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-[11px] font-medium tracking-[.22em] uppercase text-muted mb-2">
                        E-mail
                    </label>
                    <input type="email" name="email" placeholder="marie@exemple.com"
                           value="{{ old('email') }}"
                           class="w-full bg-rose-blush border border-rose-light rounded-xl px-4 py-3
                                  font-body text-sm text-ink placeholder-rose-mid/60
                                  outline-none transition-all duration-200
                                  focus:border-rose focus:ring-2 focus:ring-rose/20
                                  hover:border-rose-mid">
                    @error('email')
                        <p class="mt-1.5 text-xs text-rose">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Téléphone --}}
                <div>
                    <label class="block text-[11px] font-medium tracking-[.22em] uppercase text-muted mb-2">
                        Téléphone
                    </label>
                    <input type="text" name="phone" placeholder="+212 6 00 00 00 00"
                           value="{{ old('phone') }}"
                           class="w-full bg-rose-blush border border-rose-light rounded-xl px-4 py-3
                                  font-body text-sm text-ink placeholder-rose-mid/60
                                  outline-none transition-all duration-200
                                  focus:border-rose focus:ring-2 focus:ring-rose/20
                                  hover:border-rose-mid">
                    @error('phone')
                        <p class="mt-1.5 text-xs text-rose">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="flex items-center justify-between pt-2">
                    <a href="{{ route('contacts.index') }}"
                       class="font-body text-xs tracking-[.16em] uppercase text-muted
                              transition hover:text-rose">
                        ← Retour
                    </a>

                    <button type="submit"
                            class="inline-flex items-center gap-2
                                   bg-gradient-to-r from-rose to-rose-deep text-white
                                   font-body text-xs font-medium tracking-[.18em] uppercase
                                   px-7 py-3 rounded-full shadow-lg shadow-rose/30
                                   transition-all duration-200 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-rose/40">
                        Enregistrer
                    </button>
                </div>

            </form>
        </div>

    </div>
</body>
</html>