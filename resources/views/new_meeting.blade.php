<x-tailwind-header-v2 title="Digital Marketing - Bloom Digital Media">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/output.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link href="css/fonts.css" rel="stylesheet" />
    <meta name="description"
        content="Choose an award winning digital marketing agency in Abuja, Nigeria to handle your business marketing. Contact Bloom Media to schedule a marketing consultation and review of your current efforts. We offer knowledgeable advice on digital marketing services to elevate your marketing and get more leads." />
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <link rel="canonical" href="https://www.bloomdigitmedia.com/how-can-we-help" />
    <meta property="og:locale" content="en_NG" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Digital Marketing - Bloom Digital Media" />
    <meta property="og:description"
        content="Choose an award winning digital marketing agency in Abuja, Nigeria to handle your business marketing. Contact Bloom Media to schedule a marketing consultation and review of your current efforts. We offer knowledgeable advice on digital marketing services to elevate your marketing and get more leads." />
    <meta property="og:url" content="https://www.bloomdigitmedia.com/how-can-we-help" />
    <meta property="og:site_name" content="Bloom Digital Media: Digital Marketing Agency" />
    <meta property="og:updated_time" content="2024-01-21T10:18:36+00:00" />
    <meta property="article:published_time" content="2024-01-21T10:18:24+00:00" />
    <meta property="article:modified_time" content="2023-11-01T20:18:36+00:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Digital Marketing - Bloom Digital Media" />
    <meta name="twitter:description"
        content="Choose an award winning digital marketing agency in Abuja, Nigeria to handle your business marketing. Contact Bloom Media to schedule a marketing consultation and review of your current efforts. We offer knowledgeable advice on digital marketing services to elevate your marketing and get more leads." />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="Babalola Dare" />
    <meta name="twitter:label2" content="Time to read" />
    <meta name="twitter:data2" content="1 minute" />
</x-tailwind-header-v2>
<x-homepage_navbar />

<section class="w-full min-h-screen flex flex-col lg:flex-row">
    <div class="w-full lg:w-1/2 bg-[#2B2B2B] p-6 md:p-8 lg:p-12 flex flex-col items-center justify-center lg:justify-start lg:sticky lg:top-0 lg:h-screen">
        <h2 class="text-[#FFF7EB] text-4xl md:text-5xl lg:text-6xl font-[TomatoGrotesk-Bold] mb-4 md:mb-6 text-center lg:text-left">Book a meeting with us</h2>
        <p class="text-[#FFF7EB] text-xl md:text-2xl font-[TomatoGrotesk-Thin] mb-8 md:mb-12 lg:mb-24 text-center lg:text-left">We’ll get back to you with the best path for you & your business.</p>
        <img src="/images/meeting.png" alt="design" class="w-full max-w-md mx-auto lg:mx-0">
    </div>
    <div class="w-full lg:w-1/2 bg-[#FFF7EB] p-4 sm:p-6 md:p-8 lg:p-12 overflow-y-scroll">
        @if(session('action-fail'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                <p>{{ session('action-fail') }}</p>
            </div>
        @endif
        <form action="{{ route('onboarding.store') }}" method="POST" class="border border-[#2B2B2B]/70 rounded-xl p-4 sm:p-6 md:p-8 lg:p-12 flex flex-col items-center justify-center w-full">
            @csrf
            <h2 class="text-[#2B2B2B] text-3xl sm:text-4xl font-[TomatoGrotesk-Bold] text-center">Schedule a Meeting</h2>
            <div class="w-full text-[#2B2B2B]/70 font-[TomatoGrotesk-Regular]">
                <p class="mb-3 mt-7 font-[TomatoGrotesk-Regular]">Personal Information</p>
                <input type="text" placeholder="Name" name="requester_name" class="border border-[#2B2B2B]/70 rounded-lg p-4 w-full mb-4 bg-transparent placeholder:text-[#2B2B2B]/70">
                <input type="email" placeholder="Email" name="requester_email" class="border border-[#2B2B2B]/70 rounded-lg p-4 w-full mb-4 bg-transparent placeholder:text-[#2B2B2B]/70">
                <input type="tel" placeholder="Phone" name="requester_phone" class="border border-[#2B2B2B]/70 rounded-lg p-4 w-full mb-4 bg-transparent placeholder:text-[#2B2B2B]/70">

                <p class="mb-3 mt-7 font-[TomatoGrotesk-Regular]">Appointment Details</p>
                <input class="border border-[#2B2B2B]/70 rounded-lg p-4 w-full mb-4 bg-transparent placeholder:text-[#2B2B2B]/70"
                        type="datetime-local" name="date"
                        min="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') . 'T' . \Carbon\Carbon::now()->format('H:m') }}"
                        max="{{ \Carbon\Carbon::now()->addMonths(2)->format('Y-m-d') . 'T' . \Carbon\Carbon::now()->addMonths(2)->format('h:m') }}"
                        pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" />

                <p class="mb-3 mt-7 font-[TomatoGrotesk-Regular]">How long do you want the meeting to last?</p>
                <select name="meeting_duration" id="meeting_duration" class="border border-[#2B2B2B]/70 rounded-lg p-4 w-full mb-4 bg-transparent placeholder:text-[#2B2B2B]/70">
                    <option value="15">15 minutes</option>
                    <option value="30">30 minutes</option>
                    <option value="60">1 hour</option>
                    <option value="90">1 hour 30 minutes</option>
                </select>

                <p class="mb-3 mt-7 font-[TomatoGrotesk-Regular]">Who do you want to meet?</p>
                <select name="meeting_with" id="meeting_with" class="border border-[#2B2B2B]/70 rounded-lg p-4 w-full mb-4 bg-transparent placeholder:text-[#2B2B2B]/70">
                    <option value="Johannah">Johannah Harris</option>
                    <option value="Emma">Emmanuel Alexander</option>
                    <option value="Tseyi">Tseyi Agharaye</option>
                </select>

                <p class="mb-3 mt-7 font-[TomatoGrotesk-Regular]">Additional Information</p>
                <textarea name="additional_info" id="additional_info" class="border border-[#2B2B2B]/70 rounded-lg p-4 w-full mb-4 bg-transparent placeholder:text-[#2B2B2B]/70"></textarea>
            </div>
            <button type="submit" class="bg-[#FF9501] w-full text-[#FFF7EB] py-6 sm:py-8 rounded-lg text-xl sm:text-2xl md:text-3xl font-[TomatoGrotesk-Bold] hover:bg-opacity-90 transition-colors duration-200">Schedule Meeting</button>
        </form>

    </div>

</section>


<!-- FOOTER -->
<x-newsletter />


<x-tailwind-footer-v2 />
