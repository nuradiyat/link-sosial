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
    {{-- Google Fonts: Poppins (body) + JetBrains Mono (developer accent) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #070b12;
        }

        .font-mono-dev {
            font-family: 'JetBrains Mono', monospace;
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
            background: rgba(16, 185, 129, .06);
            border: 1px solid rgba(16, 185, 129, .18);
        }

        /* === 3D Dev Background === */
        #dev-bg-canvas {
            position: fixed;
            inset: 0;
            z-index: 0;
            width: 100%;
            height: 100%;
        }

        .dev-bg-vignette {
            position: fixed;
            inset: 0;
            z-index: 1;
            pointer-events: none;
            background: radial-gradient(ellipse at center, transparent 35%, #070b12 100%);
        }

        .dev-bg-scanline {
            position: fixed;
            inset: 0;
            z-index: 1;
            pointer-events: none;
            opacity: .25;
            background: repeating-linear-gradient(to bottom,
                    rgba(255, 255, 255, 0.025) 0px,
                    rgba(255, 255, 255, 0.025) 1px,
                    transparent 1px,
                    transparent 3px);
        }

        .blink-cursor::after {
            content: '_';
            color: #34d399;
            animation: blink 1s steps(1) infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .blink-cursor::after {
                animation: none;
            }
        }
    </style>
</head>

<body class="min-h-screen text-white selection:bg-emerald-500/40">

    {{-- 3D Animated Developer Background --}}
    <canvas id="dev-bg-canvas"></canvas>
    <div class="dev-bg-vignette"></div>
    <div class="dev-bg-scanline"></div>

    {{-- Content --}}
    <main class="relative z-10">

        @yield('content')

    </main>

    <script>
        (function() {
            const canvas = document.getElementById('dev-bg-canvas');
            const ctx = canvas.getContext('2d');
            let w, h;

            function resize() {
                w = canvas.width = window.innerWidth;
                h = canvas.height = window.innerHeight;
            }
            resize();
            window.addEventListener('resize', resize);

            const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            // Glyphs pulled from a developer's everyday vocabulary
            const glyphs = ['{ }', '</>', '=>', '500', '504', ';', '&&', '||', '::', '#', 'λ', '/* */', '!=', '++', '->', '" "', ';', '404', '401', '[ ]', '( )'];
            const COUNT = reduced ? 16 : 60;

            const colors = {
                emerald: '16,185,129',
                sky: '56,189,248',
                amber: '251,191,36'
            };
            const huePool = ['emerald', 'emerald', 'sky', 'amber'];

            const particles = [];
            for (let i = 0; i < COUNT; i++) {
                particles.push({
                    x: (Math.random() - 0.5) * 2,
                    y: (Math.random() - 0.5) * 2,
                    z: Math.random() * 1 + 0.05,
                    g: glyphs[Math.floor(Math.random() * glyphs.length)],
                    speed: 0.0012 + Math.random() * 0.0025,
                    hue: huePool[Math.floor(Math.random() * huePool.length)]
                });
            }

            let gridOffset = 0;

            function drawGrid() {
                const horizon = h * 0.55;
                if (!reduced) gridOffset += 0.25;

                // Horizontal receding lines (depth)
                const rows = 16;
                for (let i = 0; i < rows; i++) {
                    const p = ((i + (gridOffset * 0.01)) % rows) / rows;
                    const y = horizon + p * p * (h - horizon);
                    ctx.beginPath();
                    ctx.moveTo(0, y);
                    ctx.lineTo(w, y);
                    ctx.globalAlpha = (1 - p) * 0.35;
                    ctx.strokeStyle = 'rgb(16,185,129)';
                    ctx.lineWidth = 1;
                    ctx.stroke();
                }
                ctx.globalAlpha = 1;

                // Vertical perspective lines (vanishing point)
                const cols = 22;
                for (let i = 0; i <= cols; i++) {
                    const cx = (w / cols) * i;
                    ctx.beginPath();
                    ctx.moveTo(w / 2 + (cx - w / 2) * 0.04, horizon);
                    ctx.lineTo(cx, h);
                    ctx.strokeStyle = 'rgba(16,185,129,0.10)';
                    ctx.stroke();
                }
            }

            function draw() {
                ctx.clearRect(0, 0, w, h);
                ctx.fillStyle = '#070b12';
                ctx.fillRect(0, 0, w, h);

                drawGrid();

                particles.forEach(p => {
                    if (!reduced) {
                        p.z -= p.speed;
                        if (p.z <= 0.02) {
                            p.z = 1;
                            p.x = (Math.random() - 0.5) * 2;
                            p.y = (Math.random() - 0.5) * 2;
                        }
                    }

                    const scale = 0.5 / p.z;
                    const px = w / 2 + p.x * w * scale * 0.5;
                    const py = h / 2 + p.y * h * scale * 0.5;

                    if (px < -60 || px > w + 60 || py < -60 || py > h + 60) return;

                    const size = Math.max(10, 24 * scale * 0.18);
                    const alpha = Math.min(0.85, scale * 0.32);

                    ctx.font = `500 ${size}px 'JetBrains Mono', monospace`;
                    ctx.fillStyle = `rgba(${colors[p.hue]},${alpha})`;
                    ctx.fillText(p.g, px, py);
                });

                requestAnimationFrame(draw);
            }

            requestAnimationFrame(draw);
        })();
    </script>

</body>

</html>
