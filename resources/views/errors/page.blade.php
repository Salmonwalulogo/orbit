<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f4f7fc">
    <title>{{ $code }} - {{ $title }} | {{ config('app.name', 'SABU JAYA MART') }}</title>
    <style>
        :root {
            color-scheme: light;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            font-synthesis: none;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            background: #f4f7fc;
            color: #17243b;
        }

        * { box-sizing: border-box; }

        body {
            min-width: 320px;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
            background:
                radial-gradient(ellipse at 50% 42%, rgba(255,255,255,.96) 0, rgba(255,255,255,.62) 26%, transparent 61%),
                linear-gradient(135deg, #f7f9fd 0%, #edf2fa 100%);
        }

        .error-page {
            position: relative;
            display: grid;
            min-height: 100vh;
            place-items: center;
            isolation: isolate;
            padding: 48px 24px;
        }

        .error-page::before,
        .error-page::after {
            position: absolute;
            z-index: -1;
            width: 250px;
            height: 250px;
            border: 1px solid rgba(87, 119, 170, .09);
            border-radius: 50%;
            content: "";
        }

        .error-page::before { top: 8%; left: 8%; }
        .error-page::after { right: 7%; bottom: 7%; width: 180px; height: 180px; }

        .error-card {
            width: min(100%, 680px);
            text-align: center;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
            color: #71809a;
            font-size: .78rem;
            font-weight: 750;
            letter-spacing: .16em;
            text-transform: uppercase;
        }

        .brand-mark {
            display: grid;
            width: 30px;
            height: 30px;
            place-items: center;
            border: 1px solid rgba(72, 105, 158, .2);
            border-radius: 9px;
            background: rgba(255,255,255,.72);
            color: #4268a3;
            box-shadow: 0 5px 14px rgba(39, 64, 105, .08);
            font-size: .9rem;
        }

        .scene {
            position: relative;
            display: grid;
            height: clamp(235px, 34vw, 310px);
            place-items: center;
            perspective: 900px;
            perspective-origin: 50% 42%;
        }

        .scene::after {
            position: absolute;
            bottom: 19%;
            left: 50%;
            width: 230px;
            height: 38px;
            transform: translateX(-50%) rotateX(68deg);
            border-radius: 50%;
            background: rgba(54, 78, 119, .13);
            filter: blur(13px);
            content: "";
            animation: shadow 4s ease-in-out infinite;
        }

        .error-number {
            position: absolute;
            z-index: 0;
            color: #e7edf7;
            font-size: clamp(8rem, 26vw, 15rem);
            font-weight: 900;
            letter-spacing: -.095em;
            line-height: 1;
            text-shadow:
                1px 1px 0 #dce5f1,
                2px 2px 0 #d5dfed,
                3px 3px 0 #ccd8e9,
                0 16px 28px rgba(49, 71, 111, .13);
            transform: translateY(-7px) rotateX(8deg);
            user-select: none;
        }

        .cube-wrap {
            position: absolute;
            z-index: 1;
            top: 21%;
            left: calc(50% + 93px);
            width: 76px;
            height: 76px;
            transform-style: preserve-3d;
            animation: bob 4s ease-in-out infinite;
        }

        .cube {
            position: absolute;
            inset: 0;
            transform-style: preserve-3d;
            animation: rotate-cube 13s linear infinite;
        }

        .cube-face {
            position: absolute;
            display: grid;
            width: 76px;
            height: 76px;
            place-items: center;
            border: 1px solid rgba(255,255,255,.7);
            color: rgba(255,255,255,.94);
            font-size: 1.45rem;
            font-weight: 700;
            backface-visibility: visible;
        }

        .cube-face.front  { background: linear-gradient(145deg, #76a7f2, #4d7fd0); transform: translateZ(38px); }
        .cube-face.back   { background: #426cad; transform: rotateY(180deg) translateZ(38px); }
        .cube-face.right  { background: #5e8cda; transform: rotateY(90deg) translateZ(38px); }
        .cube-face.left   { background: #86aff0; transform: rotateY(-90deg) translateZ(38px); }
        .cube-face.top    { background: #a4c4f5; transform: rotateX(90deg) translateZ(38px); }
        .cube-face.bottom { background: #3e68a6; transform: rotateX(-90deg) translateZ(38px); }

        .orbit {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 260px;
            height: 105px;
            transform: translate(-50%, -50%) rotate(-19deg) rotateX(62deg);
            border: 1px solid rgba(88, 126, 185, .2);
            border-radius: 50%;
        }

        .orbit::before {
            position: absolute;
            top: 6px;
            left: 38px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #82a9e7;
            box-shadow: 0 0 15px rgba(82, 133, 213, .75);
            content: "";
        }

        .spark {
            position: absolute;
            width: 7px;
            height: 7px;
            border: 1px solid #83a4d6;
            border-radius: 2px;
            transform: rotate(45deg);
            animation: twinkle 2.4s ease-in-out infinite;
        }

        .spark-one { top: 23%; left: 22%; }
        .spark-two { top: 29%; right: 19%; width: 5px; height: 5px; animation-delay: .8s; }
        .spark-three { right: 27%; bottom: 17%; width: 6px; height: 6px; animation-delay: 1.3s; }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-top: 7px;
            color: #587199;
            font-size: .78rem;
            font-weight: 750;
            letter-spacing: .16em;
            text-transform: uppercase;
        }

        .status::before {
            width: 22px;
            height: 1px;
            background: #bac8dc;
            content: "";
        }

        h1 {
            margin: 16px 0 10px;
            color: #1d2a40;
            font-size: clamp(1.65rem, 4vw, 2.25rem);
            font-weight: 760;
            letter-spacing: -.045em;
        }

        .message {
            max-width: 460px;
            margin: 0 auto;
            color: #71809a;
            font-size: 1rem;
            line-height: 1.75;
        }

        .home-link {
            display: inline-flex;
            min-height: 48px;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 27px;
            padding: 0 22px;
            border: 1px solid #3769b0;
            border-radius: 12px;
            background: linear-gradient(135deg, #477dca, #3266b0);
            color: white;
            box-shadow: 0 9px 20px rgba(50, 102, 176, .2), inset 0 1px 0 rgba(255,255,255,.2);
            font-size: .92rem;
            font-weight: 700;
            text-decoration: none;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .home-link:hover {
            color: white;
            box-shadow: 0 13px 25px rgba(50, 102, 176, .27), inset 0 1px 0 rgba(255,255,255,.2);
            transform: translateY(-2px);
        }

        .home-link:focus-visible {
            outline: 3px solid rgba(71, 125, 202, .35);
            outline-offset: 4px;
        }

        @keyframes rotate-cube {
            from { transform: rotateX(-18deg) rotateY(0deg) rotateZ(0deg); }
            to { transform: rotateX(342deg) rotateY(360deg) rotateZ(360deg); }
        }

        @keyframes bob {
            0%, 100% { translate: 0 0; }
            50% { translate: 0 -15px; }
        }

        @keyframes shadow {
            0%, 100% { opacity: .8; scale: 1; }
            50% { opacity: .45; scale: .82; }
        }

        @keyframes twinkle {
            0%, 100% { opacity: .35; scale: .75; }
            50% { opacity: 1; scale: 1.2; }
        }

        @media (max-width: 520px) {
            .error-page { padding: 32px 20px; }
            .scene { height: 235px; }
            .cube-wrap { left: calc(50% + 64px); scale: .78; }
            .orbit { width: 210px; height: 88px; }
            .message { font-size: .94rem; }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                scroll-behavior: auto !important;
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>
<body>
    <main class="error-page">
        <section class="error-card" aria-labelledby="error-title">
            <div class="brand">
                <span class="brand-mark" aria-hidden="true">S</span>
                {{ config('app.name', 'SABU JAYA MART') }}
            </div>

            <div class="scene" aria-hidden="true">
                <span class="error-number">{{ $code }}</span>
                <span class="orbit"></span>
                <span class="spark spark-one"></span>
                <span class="spark spark-two"></span>
                <span class="spark spark-three"></span>
                <span class="cube-wrap">
                    <span class="cube">
                        <span class="cube-face front">?</span>
                        <span class="cube-face back">?</span>
                        <span class="cube-face right">?</span>
                        <span class="cube-face left">?</span>
                        <span class="cube-face top">?</span>
                        <span class="cube-face bottom">?</span>
                    </span>
                </span>
            </div>

            <div class="status">Error {{ $code }}</div>
            <h1 id="error-title">{{ $title }}</h1>
            <p class="message">{{ $message }}</p>
            <a class="home-link" href="{{ route('home') }}">
                <span aria-hidden="true">&larr;</span>
                Kembali ke Beranda
            </a>
        </section>
    </main>
</body>
</html>
