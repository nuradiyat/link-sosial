@props(['link'])

<a href="{{ route('links.redirect', $link) }}" target="{{ $link->open_new_tab ? '_blank' : '_self' }}" class="group block">
    <div
        class="glass flex items-center justify-between
               rounded-2xl
               px-5 py-4
               transition-all duration-300
               hover:-translate-y-1
               hover:scale-[1.02]
               hover:shadow-2xl
               hover:border-indigo-400/40">
        <div class="flex items-center gap-4">
            {{-- Icon dari database --}}
            <div
                class="flex h-12 w-12 items-center justify-center
                       rounded-xl
                       bg-indigo-500/15
                       text-indigo-300
                       transition
                       group-hover:bg-indigo-500
                       group-hover:text-white">


                @if ($link->icon)
                    <x-dynamic-component :component="$link->icon" class="h-6 w-6" />
                @else
                    <x-heroicon-o-link class="h-6 w-6" />
                @endif
            </div>
            {{-- Nama Link --}}
            <div>

                <h2 class="font-semibold text-lg text-white">
                    {{ $link->title }}
                </h2>

            </div>
        </div>
        {{-- Arrow --}}
        <x-heroicon-o-arrow-right
            class="h-5 w-5 text-slate-400
                   transition-all duration-300
                   group-hover:translate-x-2
                   group-hover:text-indigo-300" />

    </div>
</a>
