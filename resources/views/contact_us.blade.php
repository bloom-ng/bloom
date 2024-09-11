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
<section class="relative medium-font">
    @if (session('contact-success'))
        <div id="alert" class="absolute top-0 right-0 flex items-center justify-center px-4 py-6">
            <div class="bg-green-500 text-white font-bold rounded-lg border shadow-lg py-3 px-4 flex items-center">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="regular-font">{{ session('contact-success') }}</span>
                </div>
                <button id="closeBtn" class="ml-4 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <script>
            setTimeout(function() {
                var alert = document.getElementById('alert');
                if (alert) {
                    alert.remove();
                }
            }, 3000);

            document.getElementById('closeBtn').addEventListener('click', function() {
                var alert = document.getElementById('alert');
                if (alert) {
                    alert.remove();
                }
            });
        </script>
    @endif


    <div class="pt-12 pb-12 lg:pb-24 lg:pt-24 flex flex-col md:flex-col lg:flex-row justify-center">
        <div class="lg:w-1/2 w-full px-6 lg:px-24 flex flex-col mb-12 lg:mb-0 order-2 lg:order-1">
            <p class="text-white mb-8 lg:mb-16 text-xl">Get in touch with Bloom Digital Media and let our team of specialists fix your problem.</p>

            <div class="flex flex-col space-y-8 lg:space-y-16">
                <div class="flex flex-row items-center lg:mb-16 mb-8 ">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="30" height="30" fill="url(#pattern0_1541_7)"/>
                        <defs>
                        <pattern id="pattern0_1541_7" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_1541_7" transform="scale(0.0111111)"/>
                        </pattern>
                        <image id="image0_1541_7" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC7ElEQVR4nO3cyWoUQRzH8b+45gnUk1EQIZFEEzc8SNST3l3ewwUvgnoI4sENwUTfIErcUPEZRBHX+AAqGrOACEZjvlJ0HSdkqp2Zrqr+faBhmHSquv/8U11bx0xERERERETCAKuB/cAF4B7wHpgGfgNz/vM7/7PzwJD7ncBq6gsYBG4Bs4SbAUaBgarvI1rAAPCM1nkKbKv6vqIBdAHXgHla7w9wBVhjdQZsAV7Tfq+AzVZHwE7gG50zBey1OgF2Az+aDJBrUsaAI8AG1wz4oxs4CtwJaHZcnbusRs3F9yYD8wHoa6LMfmCiyTIns29GKB58zbbJn4C1AWWvAz4HtNn5PiApehfNOlGi/FMB5V+2jPvJ8wGBOFSijsOBXb9+yw3hg5GTJeo4HVjHY8twWB0qtI1eD3wJrGMB2G65oJi7KGOimT9vN9QGPpasY8QymoWbpby/wF3gGLDR91y6/OfjwLg/pyw3C7jKUgccIH77LHV+Pjl25yx1wAPiN26p8ysjsXtrqfOzZrGbtNT59b3Y/bLU+cXU2M1Z6nw/NXZTlrpEHoZvLHXAQ+J331LnBgPE76ylDjhI/IYsdcDKyPvSbv1yheUAuE28Ri0XwFY/yR6jJVfZkwI8IT6PLDdAX5v215XlFmd7LUfAJeIxbLmi2MrlNq9U7WX2m9Yp1vrctqyquLq7rQ4oVq2rmGxyi8Q7rIbbdr92MMhuz8eg1RGwCXjRgSA/r01zscS+j4ttWiBwZQ5nsW+jVYAe/ypbK0aQC35jTU/V9xUtoNdv7y3TM3GvalxVgAMAy4E9wBn/asVixvw57tzlIXVIA4tFudG58h8U6A5BGa1AZwVltAKdFZTRCnRWUEYr0FlBGa1AZwVltAKdFZTRCnRWUEYr0FlBGa1AZwVltAKdFZTRCnRWUEYr0FlBGa1AZwVltAKdFZTRCnRWUEYr0FlBGd2xQM80iPV0h6qvD+BGg0Bfr/q6skPxTwVHgJ/+uOm+q/q6sgUsc0fV1yEiIiIiItZ2/wAFkvBgVkRJNQAAAABJRU5ErkJggg=="/>
                        </defs>
                    </svg>
                    <p class="text-white ml-5 text-xl">S03 Pathfield Mall, 4th Avenue, Gwarimpa, Abuja</p>
                </div>

                <div class="flex flex-row items-center lg:mb-16 mb-8 ">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="30" height="30" fill="url(#pattern0_1541_8)"/>
                        <defs>
                        <pattern id="pattern0_1541_8" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_1541_8" transform="scale(0.0111111)"/>
                        </pattern>
                        <image id="image0_1541_8" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAADDklEQVR4nO2cO2sVQRiG10siQSxE8AaCCBYWwcJCLLTQSgtJIVZi663wL/gX/Asp7KwsFAstxKhRLCy0EFQQLARRE0W8PjKwR05Ek5lv5pvdnLwPnPJ8l4fd2dmZZZpGCCGEEEIIIYQQQgghxGIA48AF4B7wCTEguJgBzgNjWVcRsA149Ce0+B8Pga05V7IkxzNrurLb4UKkcc4i+n5iEgEzFtHzMpfMnEW0lZvAlmaZAmwCrlmbtyTM4TVwqFlmAPuBFzmNW5Lm8gO4BKxpeg6wCrgIfMtt2pK8FLeA7U1PATYDN0o1aymgJG+Bo03PAA4Db0o2aimiNL+Ay9mvqwUA1rbD2s/STVqK8XyD2uViMK6vHcAdr+YsBcUQFlUsvAOmXEwu3tNUm9tCVK+WomLIvQWngQkXqwt7WdcOW2H4sg55Ye1nSSzFRQcFjmQ8VB4Du0vLHaptZ8ZyQniIH7M4SSkwKWjmNGkOOFXI7XBNJ4D3xppu/z0tjfmTpcjkoAUm/tPA+ky/oY6J9nYv+qIV82dLseag7avsS2Ojz4C9Br+D3HuAJx5LBzEBLAVnBc1cnPkS7gxDzaeBz16LYTFBUmsuEnRoKPlqbP4qsDEizwbgijHH93aoWF3DiWtQYB/w3CjiFXCgi9ieTtyCUviqq3W3eDrxC9qUGUe7GP/dnLgEbQEmgacZM4PwsxByTjZGYhL0I2i5uW4nc/SYJP0IWv7trepbp4sTl6A+6xHV1lFcnLgE9Vthq7Iy6OLEJWgEwPGMNePAB+Bk48BIic7cBXnguXszcqIDiZsKVfYjR1J0wk51tR32kRY9tKlwvetvRkZe9D82FTr5CmpFiB4AHAy/pgNWlOgukehKSHQlJLoSEl0Jia6ERFdCoish0ZWQ6EpIdCUkuhISXQmJroREV0KiKyHRlZDoZS5aB6Ok89EiOhy/JtK4axEdznMTaZy1iB5vz3MT8Z+j2b6UCofmtacRiKUl2w4YHJI9Fs5zC+OPHpALmG+dnOnDGSRCCCGEEEIIIYQQQgjR9JvfsfD1c5zod2kAAAAASUVORK5CYII="/>
                        </defs>
                    </svg>
                    <p class="text-white ml-5 text-xl">info@bloomdigitmedia.com</p>
                </div>

                <div class="flex flex-row items-center lg:mb-16">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="30" height="30" fill="url(#pattern0_1541_9)"/>
                        <defs>
                        <pattern id="pattern0_1541_9" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_1541_9" transform="scale(0.0111111)"/>
                        </pattern>
                        <image id="image0_1541_9" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAADtElEQVR4nO3cW6hmYxgH8DXMyDGGCHExTklNxs0kp1KaIZJSE2pMimSQC1duRLmZNJORKymHkQmTCxqNUqPI5gI5XCiHsUcTmUNyHsb8tNpLSnvb37cOnnet7/3Vvtx7vc//+/Za3/e8z1pFkWVZlmVZlmVZNimwCKuxDbuxF8/itOi1DQZW4Auz+wonRa+x13AINuCg/7Y5eq29hcOwxWgO4tLoNfcODsXzxvMxFkavvVewTj13RK+9N3D1COfkuezB8dE1JA9H4kvNPBZdR/Jwn+YOYGl0Lal/ytilHduj60kWVmrXquiakoRHWg56ujznR9eVHLypfQ9G15UcfNNB0L9iSXRtScFvurElurak4BfdWRldXzKqb3Vd+ST3Qf4J+l3dujX2rZQIbOo46Neja0wC7uw46Peja0wCzuk46Meja0xGC527ufyB86LrSwYe0I0N0bUlBadXbc42fYtjo2tLDra2HPTq6JqShItaDPktLIiuKVl4rYWQD2BZdC1Jw4UtBP1EdB29gOcaBn1xdA29gFPwfYOgl0TX0Bu4u0HQ10avv2+jYXW7em+Xvx9dQ2/gTPxQM+x10evvFdymvlui198reKHBBu3y6PX3Bk7Ajpphf11+iomuoTdwPn6uGfZHWBxdQ2/gJvVN4ajoGnoD6xuE/UreER896IXVbXB1PZ27eqOHfUy54Vo7ah7NYY/XD9nRIOxyxGHRqMebaDgL3zU8Z+fx3hHDvqTh7F45Mnxc5++KIcBV2N8g7A9xas1jL8WT1Yzf9qplMNx7HnEdfm8Q9q5xvq6X/wXYWM2N/Nun5YtfDBWun6PwUZVz2mvmOcYC3FyNMoxyDTijGCKswZ+a2ThbPxsXVLvr49hf/b2ji6HB7S2EPVWdjs7G5Xiq4YDP9CDvFjPTF2lyGunKG2WDrBgSrGp4gexK+d/2DE4shgLXVBsAKdqHewazv4krO74hqakPcFkxoG+Qe6WrfHzG5kE8IwrnNmxE/R+mB/H0MzNdv/ekbVMxoH72NunaXQxsp2a9NO0phgY34Cdp2VoMEZYldpG8sRj4kM5L0Qnjs0H3s/9WtUB/DPwsvaKYFGY6du8EBP1wMaHz2Xc1vPNgHC+WD74tJhVOrjptdZ8wOYry2nB4dK1JwHK82nLA5Yv30ES/k+e5Pe/lFm6nLh8+nh9DNJ+y8YP78fmYAe/EvThi3oNks05Mra3O5VPVDvm+6mdnNe9Rft2/Io+hZVmWZVmWZVmWZVmWFbP6C7iQWJhNB3m4AAAAAElFTkSuQmCC"/>
                        </defs>
                    </svg>
                    <p class="text-white ml-5 text-xl">+234 708 627 8644 <br>+234 703 138 0418</p>
                </div>
            </div> 
        </div>

        <form action="/contact" method="POST" class="w-full lg:w-2/3 flex flex-col px-6 lg:px-24 justify-center order-1 lg:order2">
            {{ csrf_field() }}
            <input name="subject" hidden type="text" value="Contact" placeholder="Subject" />
            <input name="name" type="text" required placeholder="Name" style="background-color: #D4D4D4; font-style: italic;" class="mb-5 py-3 px-3 text-xl" />
            <input name="email" type="text" required placeholder="Email" style="background-color: #D4D4D4; font-style: italic;" class="mb-5 py-3 px-3 text-xl" />
            <input name="phone" type="text"  required placeholder="Phone" style="background-color: #D4D4D4; font-style: italic;" class="mb-5 py-3 px-3 text-xl" />
            <textarea required name="message" rows="10" placeholder="Message" style="background-color: #D4D4D4; font-style: italic;" class="mb-5 px-3 py-3 text-xl"></textarea>
            <div id="captcha-field" class="flex items-start justify-center gap-2 mb-5">
                <span id="captcha-span">{!! captcha_img() !!}</span>
                <button type="button" id="reload-captcha"
                    class="bg-amber-500 rounded-md px-4 py-3 text-white font-bold">&#x21bb;</button>
            </div>
            <input name="captcha" type="text" required placeholder="Enter captcha" style="background-color: #D4D4D4; font-style: italic;" class="py-3 px-3 mb-5 text-xl"/>
            @error('captcha')
                <p class="text-red-500 font-semibold">{{ $message }}</p>
            @enderror
            <button class="black-font bg-[#FF9501] py-3 text-lg" type="submit">SUBMIT</button>
        </form>
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
