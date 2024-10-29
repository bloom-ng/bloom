<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/output.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="shortcut icon" href="/images/images-v2/favicon.png" type="image/x-icon">
    <title>{{$post->title}} - Bloom Digital Media</title>
    <meta name="description" content="{{$post->title}}" />
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <link rel="canonical" href="https://www.bloomdigitmedia.com/blog/{{$post->slug}}" />
    <meta property="og:locale" content="en_NG" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content=”{{$post->title}} - Bloom Digital Media" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="https://www.bloomdigitmedia.com/blog/{{$post->slug}}" />
    <meta property="og:site_name" content="Bloom Digital Media: Digital Marketing Agency" />
    <meta property="og:updated_time" content="2024-01-21T10:18:36+00:00" />
    <meta property="article:published_time" content="2024-01-21T10:18:24+00:00" />
    <meta property="article:modified_time" content="2023-11-01T20:18:36+00:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Digital Marketing Agency - Bloom Digital Media" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="Babalola Dare" />
    <meta name="twitter:label2" content="Time to read" />
    <meta name="twitter:data2" content="1 minute" />

    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2H3Y9EMT7F"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-2H3Y9EMT7F');
    </script>
    

    <!-- Global site tag (gtag.js) - Google Analytics -->
</head>

<body class="font-grotesk">
    <!-- HEADER ONE -->
    <x-single_blog_header logo="{{ $post->featured_image }}" header="{{ $post->title }}" />
    <!-- /END OF HEADER ONE -->
    <div class="bg-stone-900 text-white medium-font text-xl lg:text-2xl py-12 lg:py-28 px-12 lg:px-20 text-left">
        <div class="">
            {!! $post->body !!}
        </div>
    </div>

    <x-newsletter />


    <x-tailwind-footer-v2 />
