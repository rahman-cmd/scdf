<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    @php
        $siteUrl = 'https://scdf-bd.org';
        $pageTitle = 'SCDF | Sunderban & Coastal Development Foundation';
        $pageDescription = 'Non-profit foundation in coastal Bangladesh. SCDF works on climate resilience, healthcare, education, livelihoods, mangrove conservation and disaster relief.';
        $ogImage = $siteUrl.'/images/hero-coastal.jpg';
        $logoPath = filled($settings->logo ?? null) ? ltrim($settings->logo, '/') : 'images/scdf.png';
        $schema = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'NGO',
                    '@id' => $siteUrl.'/#organization',
                    'name' => 'Sunderban & Coastal Development Foundation',
                    'alternateName' => 'SCDF',
                    'url' => $siteUrl.'/',
                    'logo' => $siteUrl.'/'.$logoPath,
                    'image' => $ogImage,
                    'description' => $pageDescription,
                    'email' => 'info@scdf-bd.org',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'addressLocality' => 'Dhaka',
                        'addressCountry' => 'BD',
                    ],
                    'areaServed' => [
                        '@type' => 'Country',
                        'name' => 'Bangladesh',
                    ],
                    'knowsAbout' => [
                        'Climate resilience',
                        'Coastal protection',
                        'Mangrove conservation',
                        'Healthcare',
                        'Education',
                        'Livelihoods',
                        'Disaster relief',
                    ],
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => $siteUrl.'/#website',
                    'url' => $siteUrl.'/',
                    'name' => 'Sunderban & Coastal Development Foundation',
                    'publisher' => ['@id' => $siteUrl.'/#organization'],
                    'inLanguage' => 'en',
                ],
                [
                    '@type' => 'WebPage',
                    '@id' => $siteUrl.'/#webpage',
                    'url' => $siteUrl.'/',
                    'name' => $pageTitle,
                    'description' => $pageDescription,
                    'isPartOf' => ['@id' => $siteUrl.'/#website'],
                    'about' => ['@id' => $siteUrl.'/#organization'],
                    'inLanguage' => 'en',
                    'primaryImageOfPage' => $ogImage,
                ],
            ],
        ];
    @endphp
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="author" content="Sunderban & Coastal Development Foundation">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="theme-color" content="#062b50">
    <meta name="geo.region" content="BD">
    <meta name="geo.placename" content="Dhaka, Bangladesh">
    <link rel="canonical" href="{{ $siteUrl }}/">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="Sunderban & Coastal Development Foundation">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $siteUrl }}/">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:alt" content="Coastal mangrove waterways in Bangladesh">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">
    <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-ink antialiased">
    <a href="#home" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-[60] focus:rounded-full focus:bg-white focus:px-4 focus:py-2">Skip to content</a>
    @include('partials.header')
    <main>
        @yield('content')
    </main>
    @include('partials.footer')
    <button
        type="button"
        data-back-to-top
        class="pointer-events-none fixed bottom-6 right-5 z-50 grid size-12 translate-y-2 place-items-center rounded-full bg-brand text-white opacity-0 shadow-[0_10px_24px_rgba(21,148,71,0.35)] transition duration-300 hover:-translate-y-0.5 focus-visible:outline-2 focus-visible:outline-offset-3 focus-visible:outline-brand sm:right-8"
        aria-label="Back to top"
        hidden
    >
        <i class="fa-solid fa-arrow-up" aria-hidden="true"></i>
    </button>
</body>
</html>
