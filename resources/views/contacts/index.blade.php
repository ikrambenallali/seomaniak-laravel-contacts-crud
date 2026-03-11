<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
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
                        gold: '#c9a96e',
                        ink:  '#3a2a30',
                        muted:'#7a5c65',
                    },
                    keyframes: {
                        fadeUp: {
                            '0%':   { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        rowIn: {
                            '0%':   { opacity: '0', transform: 'translateX(-12px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        },
                        sparkle: {
                            '0%,100%': { opacity: '1',  transform: 'scale(1)' },
                            '50%':     { opacity: '0.3', transform: 'scale(0.75)' },
                        },
                    },
                    animation: {
                        'fade-up': 'fadeUp .55s ease both',
                        'row-in':  'rowIn .4s ease both',
                        'sparkle': 'sparkle 2.5s ease-in-out infinite',
                    },
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Jost', sans-serif; }
        .delay-1 { animation-delay: .05s }
        .delay-2 { animation-delay: .10s }
        .delay-3 { animation-delay: .15s }
        .delay-4 { animation-delay: .20s }
        .delay-5 { animation-delay: .25s }
    </style>
</head>

<body class="min-h-screen bg-rose-blush px-4 py-12"
      style="background-image: radial-gradient(ellipse at 10% 20%, #f7dde5, transparent 50%), radial-gradient(ellipse at 90% 80%, #ead5e6, transparent 50%);">

    <div class="max-w-4xl mx-auto">

        {{-- ── En-tête ── --}}
        <div class="text-center mb-10">

            <h1 class="font-display text-5xl font-light tracking-widest text-ink uppercase">
                 <em class="not-italic text-rose">Contacts</em>
            </h1>

           

          
        </div>

        {{-- ── Bouton Ajouter ── --}}
        <div class="mb-6">
            <a href="{{ route('contacts.create') }}"
               class="inline-flex items-center gap-2 bg-gradient-to-r from-rose to-rose-deep text-white
                      font-body text-xs font-medium tracking-[.18em] uppercase
                      px-6 py-3 rounded-full shadow-lg shadow-rose/30
                      transition-all duration-200 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-rose/40">
                <span class="text-base font-light">+</span>
                Ajouter un contact
            </a>
        </div>

        {{ Tableau }}
        <div class="animate-fade-up rounded-2xl overflow-hidden border border-rose-light
                    shadow-[0_16px_48px_rgba(180,100,120,.10)]"
             style="background: rgba(255,255,255,.82); backdrop-filter: blur(12px);">

            <table class="w-full">
                {{-- En-tête tableau --}}
                <thead>
                    <tr class="bg-gradient-to-r from-rose-light to-rose-mid">
                        <th class="font-body text-[11px] font-medium tracking-[.22em] uppercase text-ink text-left px-6 py-4">Nom</th>
                        <th class="font-body text-[11px] font-medium tracking-[.22em] uppercase text-ink text-left px-6 py-4">E-mail</th>
                        <th class="font-body text-[11px] font-medium tracking-[.22em] uppercase text-ink text-left px-6 py-4">Téléphone</th>
                        <th class="font-body text-[11px] font-medium tracking-[.22em] uppercase text-ink text-left px-6 py-4">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($contacts as $i => $contact)
                    <tr class="animate-row-in border-b border-rose-light last:border-0
                               transition-colors duration-150 hover:bg-rose-light/30
                               delay-{{ min($i + 1, 5) }}">

                        {{-- Nom --}}
                        <td class="px-6 py-4 font-display text-lg font-semibold text-rose">
                            {{ $contact->name }}
                        </td>

                        {{-- Email --}}
                        <td class="px-6 py-4 font-body text-sm font-light text-ink">
                            {{ $contact->email }}
                        </td>

                        {{-- Téléphone --}}
                        <td class="px-6 py-4 font-body text-sm font-light text-ink">
                            {{ $contact->phone }}
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">

                                {{-- Modifier --}}
                                <a href="{{ route('contacts.edit', $contact->id) }}"
                                   class="inline-flex items-center font-body text-[11px] font-medium
                                          tracking-[.14em] uppercase text-gold border border-gold
                                          px-4 py-1.5 rounded-full
                                          transition-all duration-200 hover:bg-gold hover:text-white hover:-translate-y-px">
                                    Modifier
                                </a>

                                {{-- Supprimer --}}
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="font-body text-[11px] font-medium tracking-[.14em] uppercase
                                                   text-rose border border-rose-mid px-4 py-1.5 rounded-full
                                                   transition-all duration-200 hover:bg-rose hover:text-white hover:-translate-y-px
                                                   cursor-pointer">
                                        Supprimer
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-12 font-body text-sm text-muted tracking-widest">
                            Aucun contact pour l'instant ✦
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</body>
</html>