@props(['profile'])

<div class="glass rounded-3xl p-8 shadow-2xl text-center animate-fade">

    {{-- Profile Photo --}}
    <div class="relative inline-block">

        @if ($profile->photo)
            <img src="{{ Storage::url($profile->photo) }}" alt="{{ $profile->name }}"
                class="mx-auto h-32 w-32 rounded-full object-cover border-4 border-white/20 shadow-xl transition duration-300 hover:scale-105">
        @else
            <img src="https://ui-avatars.com/api/?name={{ urlencode($profile->name) }}&background=6366f1&color=ffffff&size=256"
                alt="{{ $profile->name }}"
                class="mx-auto h-32 w-32 rounded-full object-cover border-4 border-white/20 shadow-xl transition duration-300 hover:scale-105">
        @endif

        {{-- Online Badge --}}
        <span class="absolute bottom-2 right-2 h-5 w-5 rounded-full border-2 border-white bg-green-500 animate-pulse">
        </span>

    </div>

    {{-- Name --}}
    <h1 class="mt-6 text-3xl font-bold tracking-wide text-white">

        {{ $profile->name }}

    </h1>

    {{-- Headline --}}
    @if ($profile->headline)
        <p class="mt-2 text-lg font-medium text-indigo-300">

            {{ $profile->headline }}

        </p>
    @endif

    {{-- Bio --}}
    @if ($profile->bio)
        <p class="mx-auto mt-5 max-w-lg leading-8 text-slate-300">

            {{ $profile->bio }}

        </p>
    @endif

    {{-- Contact Info --}}
    <div class="mt-8 flex flex-wrap justify-center gap-3">

        @if ($profile->location)
            <div class="rounded-full bg-white/10 px-4 py-2 text-sm text-slate-200 backdrop-blur">

                📍 {{ $profile->location }}

            </div>
        @endif

        @if ($profile->email)
            <div class="rounded-full bg-white/10 px-4 py-2 text-sm text-slate-200 backdrop-blur">

                ✉ {{ $profile->email }}

            </div>
        @endif

        @if ($profile->phone)
            <div class="rounded-full bg-white/10 px-4 py-2 text-sm text-slate-200 backdrop-blur">

                📱 {{ $profile->phone }}

            </div>
        @endif

    </div>

</div>
