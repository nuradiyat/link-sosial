@extends('layouts.app')

@section('title', $profile->name)

@section('description', $profile->bio)

@section('content')

<section class="min-h-screen flex items-center justify-center py-10 px-4">

    <div class="w-full max-w-xl">

        {{-- Profile --}}
        <x-profile-card :profile="$profile" />

        {{-- Social Links --}}
        <div class="mt-8 space-y-4">

            @forelse ($profile->links as $link)

                <x-social-link :link="$link"/>

            @empty

                <div class="glass rounded-2xl p-6 text-center">

                    <h3 class="text-lg font-semibold text-white">
                        Belum Ada Link
                    </h3>

                    <p class="mt-2 text-slate-300">
                        Saat ini belum ada link yang dapat ditampilkan.
                    </p>

                </div>

            @endforelse

        </div>

        {{-- Footer --}}
        <x-footer :profile="$profile"/>

    </div>

</section>

@endsection