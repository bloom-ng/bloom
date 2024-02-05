
<section class="hidden lg:block">
	<div
		style="background: url('{{$logo}}')"
		class="relative w-[100vw] w-full h-[360px] bg-blend-darken bg-center bg-cover flex flex-col items-center justify-between px-12 py-10"
	>
		<div class="absolute inset-0 bg-black opacity-75"></div>

		<div
			class="w-full flex items-center relative mb-5 leading-[19.2px] text-[16px] justify-between"
		>
			<a href="/">
				<div class="logo">
					<img src="/images/images-v2/Logo.svg" alt="" />
				</div>
			</a>
			<ul class="flex items-center justify-between  gap-12">
			<a href="/#whoWeAre">
				<li
					class="text-white lg:text-base xl:text-base md:text-sm font-black md:font-semibold font-grotesk uppercase tracking-wide"
				>
					WHO ARE WE?
				</li>
            </a>
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
				<a href="/#whatwedo"> WHAT WE DO</a>
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
			<li
					class="text-white lg:text-base xl:text-base md:text-sm font-black md:font-semibold font-grotesk uppercase tracking-wide"
				>
					<a
					href="/help"
					class="text-center text-black text-base font-black font-grotesk uppercase 
					tracking-wide bg-amber-500 px-[19px] py-[13px]"
					>HOW CAN WE HELP YOU?</a
				>
				</li>
				</ul>
			</div>
		<div
			class="w-full flex justify-center items-center relative mb-16"
		>
			<h1
				class="absolute top-[-12%] bottom-[0%] -mt-5 text-center text-white z-20 text-[55px] 
				font-extrabold font-['Faustina'] leading-[3.5rem]"
			>
				{{$header}}
			</h1>
			<div
				style="width:{{$width}}"
				class=" z-0 h-[30px] bg-[#FFB855] text-center"
			></div>
		</div>
		
	</div>
</section>

<section class="block lg:hidden max-w-[100vw] bg-[#1E1E1E] opacity-90 flex items-center justify-between px-12 py-10">
	<a href="/">
		<div class="logo">
			<img src="/images/images-v2/Logo.svg" alt="" />
		</div>
	</a>

	<div class="block lg:hidden justify-between" id="menu-toggle-button">
		<!-- DROPDOWN MENU -->
		<span class="mt-2 text-3x1 text-white cursor-pointer lg:hidden" id="menu-toggle-button" >
			<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
				xmlns="http://www.w3.org/2000/svg">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
				</path>
			</svg>
		</span>
		<!-- /DROPDOWN MENU -->
	</div>
</section>

<div class=" hidden navbar-collapse bg-[#1E1E1E] opacity-90" id="navbarSupportedContent">
	<!-- Nav Items -->
	<ul class="flex flex-col gap-6 items-left justify-center py-6 px-8">
		<a href="/#whoWeAre">
				<li
					class="text-white lg:text-base xl:text-base md:text-sm font-black md:font-semibold font-grotesk uppercase tracking-wide"
				>
					WHO ARE WE?
				</li>
        </a>
		<li
		class="text-white lg:text-base xl:text-base md:text-sm font-black md:font-semibold font-grotesk uppercase tracking-wide"
		>
			<a href="/footprint">
				OUR FOOTPRINT
			</a>
		</li>
		<li
			class="text-white lg:text-base xl:text-base md:text-sm font-black md:font-semibold font-grotesk uppercase tracking-wide"
		>
			<a href="/#whatwedo">WHAT WE DO</a>
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
		<li>
			<a href="/help" class="text-center text-black lg:text-base xl:text-base md:text-xs font-black font-bold font-grotesk uppercase tracking-wide bg-amber-500 px-[19px] py-[13px]">
				HOW CAN WE HELP YOU?
			</a>
		</li>
	</ul>
	<!-- Nav Items -->
</div>

<div class="block lg:hidden ">
	<div style="background: url('{{$logo}}')" class="relative w-[100vw] w-full h-[300px] bg-blend-darken bg-center bg-cover flex flex-col items-center justify-between px-12 py-10">
		<div class="absolute inset-0 bg-black opacity-75"></div>
		<!-- <h1 class="absolute top-[-5%] bottom-[0%] -mt-5 text-center text-white z-20 text-[55px] font-extrabold font-['Faustina'] leading-10">
			{{$header}}
		</h1>
		<div
			style="width:{{$width}}"
			class=" z-0 h-[30px] bg-amber-300 text-center"
		></div> -->
		<div class="relative mt-5">
			<h1
				class="text-center text-white text-5xl lg:text-[55px] font-extrabold font-['Faustina'] leading-10 inline px-3 relative z-10"
			>
				{{$header}}
			</h1>
			<div class="absolute bg-amber-300 w-full h-8 top-5"></div>
		</div>
	</div>
</div>