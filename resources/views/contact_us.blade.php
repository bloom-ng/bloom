<x-tailwind-header-v2 title="Contact Us - Bloom Digital Media">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/output.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <meta name="description"
        content="Choose an award winning digital marketing agency in Abuja, Nigeria to handle your business marketing. Contact Bloom Media to schedule a marketing consultation and review of your current efforts. We offer knowledgeable advice on digital marketing services to elevate your marketing and get more leads." />
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <link rel="canonical" href="https://www.bloomdigitmedia.com/contact-us" />
    <meta property="og:locale" content="en_NG" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content=Contact Us - Bloom Digital Media" />
    <meta property="og:description"
        content="Choose an award winning digital marketing agency in Abuja, Nigeria to handle your business marketing. Contact Bloom Media to schedule a marketing consultation and review of your current efforts. We offer knowledgeable advice on digital marketing services to elevate your marketing and get more leads." />
    <meta property="og:url" content="https://www.bloomdigitmedia.com/contact-us" />
    <meta property="og:site_name" content="Bloom Digital Media: Digital Marketing Agency" />
    <meta property="og:updated_time" content="2024-01-21T10:18:36+00:00" />
    <meta property="article:published_time" content="2024-01-21T10:18:24+00:00" />
    <meta property="article:modified_time" content="2023-11-01T20:18:36+00:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Contact Us - Bloom Digital Media" />
    <meta name="twitter:description"
        content="Choose an award winning digital marketing agency in Abuja, Nigeria to handle your business marketing. Contact Bloom Media to schedule a marketing consultation and review of your current efforts. We offer knowledgeable advice on digital marketing services to elevate your marketing and get more leads." />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="Babalola Dare" />
    <meta name="twitter:label2" content="Time to read" />
    <meta name="twitter:data2" content="1 minute" />
</x-tailwind-header-v2>

<!-- HEADER ONE -->
<!-- HEADER ONE -->
<x-navbar logo="/images/images-v2/telephone.png" header="Contact Us" width="23%" />
<!-- /END OF HEADER ONE -->
<section class="medium-font">

    <div class="background pt-12 pb-12 lg:px-24 lg:pb-24 lg:pt-24">
        <div class="header-text">
            <h3 class="md:pb-24">Get in touch with Bloom Digital Media and let our team of specialists fix your problem.
            </h3>
        </div>
        <form action="/contact" method="POST" class="input-container">
            @csrf
            <input name="subject" hidden type="text" value="Contact" placeholder="Subject" />
            <input name="name" type="text" required placeholder="Name" />
            <input name="email" type="text" required placeholder="Email" />
            <input name="phone" hidden type="text" value="08130000000" required placeholder="Phone" />
            <textarea required name="message" rows="22" cols="13" placeholder="Message"></textarea>
            <button class="black-font" type="submit">SUBMIT</button>
        </form </div>

    </div>
    <div class="flex flex-col items-center justify-center max-h-[70vh] max-w-[100vw]">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d955.2832207389714!2d7.40552668937182!3d9.117396039153277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0bba2dde5cb1%3A0xe4b6fc3d6ef958b2!2sBloom%20Digital%20Media%20Ltd!5e0!3m2!1sen!2sng!4v1706625524462!5m2!1sen!2sng"
            width="2700" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- FOOTER -->
    <x-newsletter />


    <x-tailwind-footer-v2 />
