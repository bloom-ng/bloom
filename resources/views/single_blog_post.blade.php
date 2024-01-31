<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="{{asset('css/output.css')}}" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <title>[BLOG-POST-NAME] - Bloom Digital Media</title>
	<meta name="description" content="[META CONTENT AS SPECIFIED BY COPYWRITER]"/>
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
    <link rel="canonical" href="https://www.bloomdigitmedia.com/blog/[BLOG-POST-NAME]" />
    <meta property="og:locale" content="en_NG" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content=”[BLOG-POST-NAME] - Bloom Digital Media" />
    <meta property="og:description" content="[META CONTENT AS SPECIFIED BY COPYWRITER]" />
    <meta property="og:url" content="https://www.bloomdigitmedia.com/blog/[BLOG-POST-NAME]" />
    <meta property="og:site_name" content="Bloom Digital Media: Digital Marketing Agency" />
    <meta property="og:updated_time" content="2024-01-21T10:18:36+00:00" />
    <meta property="article:published_time" content="2024-01-21T10:18:24+00:00" />
    <meta property="article:modified_time" content="2023-11-01T20:18:36+00:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Digital Marketing Agency - Bloom Digital Media" />
    <meta name="twitter:description" content="[META CONTENT AS SPECIFIED BY COPYWRITER]" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="Babalola Dare" />
    <meta name="twitter:label2" content="Time to read" />
    <meta name="twitter:data2" content="1 minute" />
	</head>
	<body class="font-grotesk">
		<!-- HEADER ONE -->
		<x-navbar logo="{{$post->featured_image}}"
              header="{{$post->title}}"
			  width="0%"/>
		<!-- /END OF HEADER ONE -->
    <div class="bg-stone-900 text-white text-xl lg:text-2xl py-12 lg:py-28 px-12 lg:px-20 text-left">
      <div class="">
         {!!$post->body!!}
      </div>
    </div>
		
	<x-newsletter />
		

<x-tailwind-footer-v2 />