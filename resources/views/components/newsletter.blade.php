<section id="newsletter" class="py-12 px-[5%] lg:px-[15%] bg-white max-w-[100vw] flex-col items-center justify-center">
    <div class="mb-16 w-full flex justify-center">
        <div class="relative">
            <h1
                class="text-center text-black text-4xl lg:text-[55px] font-extrabold font-['Faustina'] leading-10 inline px-3 relative z-10">
                Stay In The Mix
            </h1>
            <div class="absolute bg-[#FFB855] w-full h-8 top-5"></div>
        </div>
    </div>

    <p class="text-center text-black text-2xl font-normal font-grotesk leading-tight lg:leading-10">
        Stay up to date with industry trends, tips, and information that
        will help you upscale your business, reach the right audience,
        and keep them interested in what you do.<br /><br />Subscribe to
        our newsletter!
    </p>
    <form method="POST" action="{{ route('addToMailchimpList') }}"
        class="flex text-center justify-center items-center pt-4 lg:mx-4 mx-2 md:mx-[8%]">
        @csrf
        <input
            class="w-[55vw] md:w-[70vw] lg:w-[80vw] px-10 leading-[40px] text-base lg:text-[24px] placeholder:text-slate-600 py-1 
			lg:py-4 md:py-4 bg-neutral-300 italic md:w-[40vw]"
            placeholder="Email" type="email" name="email" id="email" />

        <button
            class="w-[30vw] lg:w-[20vw] px-4 py-1 lg:py-4 md:py-4 bg-amber-500 text-sm md:text-md font-black lg:text-[24px] 
								leading-[40px] text-center"
            type="submit">
            SUBSCRIBE
        </button>
    </form>
    <script>
        function setEmail() {
            var email = document.getElementById('user_email').value;
            document.getElementById('email').value = email;
        }
    </script>
</section>
{{-- <p>sm:text-[14px] sm:leading-[20px]</p> --}}
