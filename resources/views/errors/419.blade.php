<x-tailwind-header-v2 title="Error 419">
    <link rel="stylesheet" href="{{ asset('css/output.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</x-tailwind-header-v2>

<x-homepage_navbar />
<div class="mx-20 my-10 h-[60vh]">
    <div class="absolute text-white" style="opacity:0.03; font-size:180px">
        OOOPS
    </div>
    <div>
        <div class="">

            <h6 class="text-white text-4xl">Error 419 </h6>
            <p class="text-amber-500">------- </p>

        </div>

        <div class="">
            <h1 class="text-white my-10 text-[60px]">Looks like something went wrong here. </h1>
            <a href="/" class="my-10 black-font text-sm py-3.5 px-5 text-black bg-amber-500">Go back Home</a>

        </div>
    </div>
</div>
<x-newsletter />


<x-tailwind-footer-v2 />
