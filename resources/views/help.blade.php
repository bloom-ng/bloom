<x-tailwind-header-v2 title="Digital Marketing - Bloom Digital Media">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/output.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    {{-- <link rel="stylesheet" href="{{asset('css/fonts.css')}}" /> --}}
    <link href="css/fonts.css" rel="stylesheet" />
    <meta name="description"
        content="Choose an award winning digital marketing agency in Abuja, Nigeria to handle your business marketing. Contact Bloom Media to schedule a marketing consultation and review of your current efforts. We offer knowledgeable advice on digital marketing services to elevate your marketing and get more leads." />
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <link rel="canonical" href="https://www.bloomdigitmedia.com/how-can-we-help" />
    <meta property="og:locale" content="en_NG" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content=Digital Marketing - Bloom Digital Media" />
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
{{-- <div>
    		<section
					class="w-[100vw] bg-[#000000] flex items-center justify-between px-12 py-10"
				>
					<a href="/homepage">
						<div class="logo">
							<img src="/images/images-v2/Logo.svg" alt="" />
						</div>
					</a>
				<ul class="flex gap-3 items-center justify-center">
				<li
					class="text-white text-base font-black font-grotesk uppercase tracking-wide"
				>
					Who Are We?
				</li>
				<a href="/footprint">
				<li
					class="text-white lg:text-base xl:text-base md:text-sm font-black md:font-semibold font-grotesk uppercase tracking-wide"
				>
					OUR FOOTPRINT
				</li>
                </a>
				<li
					class="text-white lg:text-base xl:text-base md:text-sm font-black md:font-semibold font-grotesk uppercase tracking-wide"
				>
					<a href="/digital"> WHAT WE DO</a>
				</li>
				<li
					class="text-white lg:text-base xl:text-base md:text-sm font-black md:font-semibold font-grotesk uppercase tracking-wide"
				>
					<a href="/blog"> BLOG </a>
				</li>
				<li
					class="text-white lg:text-base xl:text-base md:text-sm font-black md:font-semibold font-grotesk uppercase tracking-wide"
				>
					<a href="/contact">CONTACT US</a>
				</li>
					</ul>

					<a
						href="/help"
						class="text-center text-black text-base font-black font-grotesk uppercase 
                        tracking-wide bg-amber-500 px-[19px] py-[13px]"
						>HOW CAN WE HELP YOU?</a
					>
				</ul>
			</section>
		</div> --}}
<x-homepage_navbar />

<section>
    @if (session('contact-success'))
        <div id="alert" class="fixed top-0 bottom-40 right-0 flex items-center justify-center px-4 py-6 z-40">
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

    @if (session('action-success'))
        <div id="alert" class="fixed top-0 bottom-40 right-0 flex items-center justify-center px-4 py-6 z-40">
            <div class="bg-green-500 text-white font-bold rounded-lg border shadow-lg py-3 px-4 flex items-center">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="regular-font">{{ session('action-success') }}</span>
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

    @if (session('action-fail'))
        <div id="alert" class="fixed top-0 bottom-40 right-0 flex items-center justify-center px-4 py-6 z-40">
            <div class="bg-green-500 text-white font-bold rounded-lg border shadow-lg py-3 px-4 flex items-center">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="regular-font">{{ session('action-fail') }}</span>
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

    <div class="background p-24">
        <div class="formsContainer">
            <div class="flex flex-col w-full h-fit-content gap-20 bg-zinc-800 p-8">
                <h3 class="headerText2 text-2xl text-center font-grotesk font-['TomatoGrotesk'] leading-10 ">
                    <span class="medium-font">Provide us relevant information</span>
                    for what you need and we will get back to you with the best path for you and your business.
                </h3>
                <form class="text-black flex flex-col items-center gap-6 w-full font-extralight leading-10"
                    action="/contact" method="POST">
                    {{ csrf_field() }}
                    <input class="w-full px-4 py-4 bg-neutral-300 italic text-black font-extralight" name="subject"
                        hidden type="text" value="Contact" placeholder="Subject" />
                    <input class="w-full px-4 py-4 bg-neutral-300 italic text-black font-extralight" type="text"
                        name="name" required placeholder="Name/Organization Name" />
                    <input class="w-full px-4 py-4 bg-neutral-300 italic text-black font-extralight" type="text"
                        name="email" required placeholder="Email" />
                    <input class="w-full px-4 py-4 bg-neutral-300 italic text-black font-extralight" type="number"
                        name="phone" required placeholder="Phone number" />
                    <input class="w-full px-4 py-4 bg-neutral-300 italic text-black font-extralight" type="text"
                        name="message" required placeholder="What is your project/business about?" />


                    <select class="w-full px-4 py-4 bg-neutral-300 italic text-black font-extralight" name="service">
                        <option value="What service are you looking for?">
                            What service are you looking for?
                        </option>
                        <option value="Web Design & Development">Web Design & Development</option>
                        <option value="Media Production and Product shoot">Media Production and Product shoot</option>
                        <option value="Branding & Design ">Branding & Design</option>
                        <option value="Public Relation">Public Relation</option>
                        <option value="Content Creation">Content Creation</option>
                        <option value="Media Planning & Buying">Media Planning & Buying</option>
                        <option value="Creative Campaign">Creative Campaign</option>
                        <option value="Brand Strategy & Positioning">Brand Strategy & Positioning</option>
                        <option value="Digital Marketing">Digital Marketing</option>

                    </select>

                    <input class="w-full px-4 py-4 bg-neutral-300 italic text-black font-extralight" type="text"
                        name="budget" placeholder="What’s your budget?" />
                    <input class="w-full px-4 py-4 bg-neutral-300 italic text-black font-extralight" type="text"
                        name="additional_info" placeholder="Additional Information" />

                    <button class="w-full bg-amber-500 text-black black-font text-[28px] py-4" type="submit">WE
                        MOVE!</button>
                </form>
            </div>
            <div class="divider-container">
                <div class="divider">OR</div>
            </div>
            <div class="flex flex-col w-full h-fit-content gap-20 bg-zinc-800 p-8">
                <h3 class="headerText2 text-2xl text-center font-grotesk font-['TomatoGrotesk'] leading-10 ">
                    <span class="medium-font">Book a meeting with us</span>
                    for what you need and we will get back to you with the best path for you and your business.
                </h3>
                <form class="flex flex-col items-center gap-6 w-full leading-10" action="/appointments"
                    method="post">
                    {{ csrf_field() }}
                    <input class="w-full px-4 py-4 bg-neutral-300 italic text-black font-extralight" type="text"
                        name="requester_name" required placeholder="Name" />
                    <input class="w-full px-4 py-4 bg-neutral-300 italic text-black font-extralight" type="email"
                        name="requester_email" required placeholder="Email" />
                    <input class="w-full px-4 py-4 bg-neutral-300 italic text-black font-extralight" type="number"
                        name="requester_phone" required placeholder="Phone number" />
                    <input class="w-full px-4 py-4 bg-neutral-300 italic text-black font-extralight"
                        type="datetime-local" name="start"
                        min="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') . 'T' . \Carbon\Carbon::now()->format('H:m') }}"
                        max="{{ \Carbon\Carbon::now()->addMonths(2)->format('Y-m-d') . 'T' . \Carbon\Carbon::now()->addMonths(2)->format('h:m') }}"
                        pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" />

                    {{-- <label for="duration">Duration</label> --}}
                    <select class="w-full px-4 py-4 bg-neutral-300 italic text-black font-extralight" name="duration"
                        id="duration" class="text-dark form-control border-0" style="background-color: #d7defc;">
                        <option value="15"> 15 mins</option>
                        <option value="30"> 30 mins</option>
                        <option value="60"> 60 mins</option>
                        <option value="90"> 1 hr 30 mins</option>
                    </select>
                    <input class="w-full px-4 py-4 bg-neutral-300 italic text-black font-extralight" type="text"
                        name="additional_info" placeholder="Additional Information" />

                    <button class="w-full bg-amber-500 text-black black-font text-[28px] py-4" type="submit">BOOK A
                        MEETING</button>

                </form>
            </div>
        </div>
    </div>



    <!-- FOOTER -->
    <x-newsletter />


    <x-tailwind-footer-v2 />
