@props(['profile'])

<div
    class="glass mx-auto w-full max-w-2xl rounded-2xl sm:rounded-3xl p-5 sm:p-8 md:p-10 shadow-2xl text-center animate-fade">

    {{-- Profile Photo --}}
    <div class="relative inline-block">

        @if ($profile->photo)
            <img src="{{ Storage::url($profile->photo) }}" alt="{{ $profile->name }}"
                class="mx-auto h-20 w-20 sm:h-28 sm:w-28 md:h-32 md:w-32 lg:h-36 lg:w-36 rounded-full object-cover border-2 sm:border-4 border-emerald-400/30 shadow-xl transition duration-300 hover:scale-105">
        @else
            <img src="https://ui-avatars.com/api/?name={{ urlencode($profile->name) }}&background=10b981&color=ffffff&size=256"
                alt="{{ $profile->name }}"
                class="mx-auto h-20 w-20 sm:h-28 sm:w-28 md:h-32 md:w-32 lg:h-36 lg:w-36 rounded-full object-cover border-2 sm:border-4 border-emerald-400/30 shadow-xl transition duration-300 hover:scale-105">
        @endif

        {{-- Online Badge --}}
        <span
            class="absolute bottom-0 right-0 sm:bottom-1 sm:right-1 h-4 w-4 sm:h-5 sm:w-5 rounded-full border-2 border-[#070b12] bg-emerald-500 animate-pulse">
        </span>

    </div>

    {{-- Name --}}
    <h1
        class="mt-4 sm:mt-6 text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold tracking-wide text-white break-words px-2">
        {{ $profile->name }}
    </h1>

    {{-- Headline (terminal-style prompt) --}}
    @if ($profile->headline)
        <p
            class="mt-2 inline-flex items-center gap-1.5 rounded-full bg-emerald-500/10 border border-emerald-400/20 px-3 py-1 text-xs sm:text-sm md:text-base font-medium text-emerald-300 font-mono-dev max-w-full">
            <span class="text-emerald-500">&gt;</span>
            <span class="truncate">{{ $profile->headline }}</span>
        </p>
    @endif

    {{-- Bio --}}
    @if ($profile->bio)
        <p
            class="mx-auto mt-4 sm:mt-5 max-w-md sm:max-w-lg text-sm sm:text-base leading-6 sm:leading-7 md:leading-8 text-slate-300 px-2">
            {{ $profile->bio }}
        </p>
    @endif

    {{-- Contact Info --}}
    <div class="mt-6 sm:mt-8 flex flex-wrap justify-center gap-2 sm:gap-3 px-1">

        @if ($profile->location)
            <div
                class="flex items-center gap-1.5 rounded-full bg-white/5 border border-white/10 px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm text-slate-200 backdrop-blur">
                <span>📍</span>
                <span class="truncate max-w-[140px] sm:max-w-none">{{ $profile->location }}</span>
            </div>
        @endif

        @if ($profile->email)
            <div
                class="flex items-center gap-1.5 rounded-full bg-white/5 border border-white/10 px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm text-slate-200 backdrop-blur">
                <span>✉</span>
                <span class="truncate max-w-[140px] sm:max-w-none">{{ $profile->email }}</span>
            </div>
        @endif

        @if ($profile->phone)
            <div
                class="flex items-center gap-1.5 rounded-full bg-white/5 border border-white/10 px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm text-slate-200 backdrop-blur">
                <span>📱</span>
                <span class="truncate max-w-[140px] sm:max-w-none">{{ $profile->phone }}</span>
            </div>
        @endif

    </div>

</div>
