<x-tailwind-header :title="$post->title">

  <meta name="description" content="{{$post->meta['meta_description']}}">
  <meta name="og:title" content="{{$post->meta['opengraph_title']}}">
  <meta name="og:description" content="{{$post->meta['opengraph_description']}}">
  <meta name="og:image" content="{{$post->featured_image}}">

  <!-- Fb verification -->
  <meta name="facebook-domain-verification" content="i1si9gdz0prrhx0zxlf7kk0po3jcvc" />
  <!-- End of Fb verification -->

  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '1544542205912428');
      fbq('track', 'PageView');
  </script>
  <noscript>
    <img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1544542205912428&ev=PageView&noscript=1" />
  </noscript>
  <!-- End Facebook Pixel Code -->

</x-tailwind-header>

<x-tailwind-navbar />

<section>
  <div class="md:my-36 md:mx-24 my-12 mx-12">
    <div class="my-12 md:my-24">
      <img src="{{$post->featured_image}}" alt=" Featured Image" />
    </div>

    <p class="font-bold text-xl md:text-3xl xl:text-4xl text-center my-12">
      {{$post->title}}
    </p>

    <p class="font-medium text-base md:text-xl xl:text-2xl my-12 leading-8 tracking-wide text-justify">
      {!!$post->body!!}
    </p>
  </div>
</section>

<x-to-top />
<x-tailwind-footer />
