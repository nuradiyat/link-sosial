@props(['link'])

<a href="{{ route('links.redirect', $link) }}" target="{{ $link->open_new_tab ? '_blank' : '_self' }}"
    class="group block w-full">
    <div
        class="glass flex items-center justify-between gap-3
               rounded-xl sm:rounded-2xl
               px-3.5 sm:px-5 py-3 sm:py-4
               transition-all duration-300
               hover:-translate-y-1
               hover:scale-[1.02]
               hover:shadow-2xl
               hover:border-emerald-400/40">

        <div class="flex min-w-0 items-center gap-3 sm:gap-4">
            {{-- Icon --}}
            <div
                class="flex h-9 w-9 sm:h-11 sm:w-11 md:h-12 md:w-12 shrink-0 items-center justify-center
                       rounded-lg sm:rounded-xl
                       bg-emerald-500/15
                       text-emerald-300
                       transition
                       group-hover:bg-emerald-500
                       group-hover:text-white">

                @if ($link->icon)
                    <x-dynamic-component :component="$link->icon" class="h-5 w-5 sm:h-6 sm:w-6" />
                @else
                    <x-heroicon-o-link class="h-5 w-5 sm:h-6 sm:w-6" />
                @endif
            </div>

            {{-- Nama Link --}}
            <h2 class="truncate font-semibold text-sm sm:text-base md:text-lg text-white">
                {{ $link->title }}
            </h2>
        </div>

        {{-- Arrow --}}
        <x-heroicon-o-arrow-right
            class="h-4 w-4 sm:h-5 sm:w-5 shrink-0 text-slate-400
                   transition-all duration-300
                   group-hover:translate-x-2
                   group-hover:text-emerald-300" />

    </div>
</a>
