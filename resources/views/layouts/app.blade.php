<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'LinkBio')
    </title>
    <meta name="description" content="@yield('description', 'Personal Link Bio Website')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .animate-fade {
            animation: fade .8s ease;
        }

        @keyframes fade {

            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

        .animate-pop {
            animation: pop .45s ease;
        }

        @keyframes pop {

            from {
                transform: scale(.92);
            }

            to {
                transform: scale(1);
            }

        }

        .glass {

            backdrop-filter: blur(18px);

            background: rgba(255, 255, 255, .10);

            border: 1px solid rgba(255, 255, 255, .18);
        }
    </style>
</head>
<body
    class="min-h-screen bg-gradient-to-br from-slate-900 via-indigo-900 to-slate-950 text-white selection:bg-indigo-500">

    {{-- Background Blur Circle --}}
    <div class="fixed top-[-120px] left-[-120px] h-72 w-72 rounded-full bg-indigo-500/30 blur-3xl">
    </div>

    <div class="fixed bottom-[-120px] right-[-120px] h-72 w-72 rounded-full bg-cyan-400/20 blur-3xl">
    </div>

    {{-- Content --}}
    <main class="relative z-10">

        @yield('content')

    </main>

</body>
</html>