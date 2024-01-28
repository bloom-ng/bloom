

<x-tailwind-header-v2 title="Branding and Design - Bloom Digital Media">
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="{{asset('css/output.css')}}" />
	<link rel="stylesheet" href="{{asset('css/app.css')}}" />
	<meta name="description" content="Define your brand's identity with Bloom Media's exceptional branding and design services. Our team specialises in creating unique visual identities, memorable logos, and impactful design elements that resonate with your target audience. From concept to execution, we craft cohesive and compelling brand experiences that set you apart. Trust Bloom Media to bring your brand vision to life through innovative design and strategic branding solutions."/>
	<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
	<link rel="canonical" href="https://www.bloomdigitmedia.com/what-we-do/branding-and-design" />
	<meta property="og:locale" content="en_NG" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Branding and Design - Bloom Digital Media" />
	<meta property="og:description" content="Define your brand's identity with Bloom Media's exceptional branding and design services. Our team specialises in creating unique visual identities, memorable logos, and impactful design elements that resonate with your target audience. From concept to execution, we craft cohesive and compelling brand experiences that set you apart. Trust Bloom Media to bring your brand vision to life through innovative design and strategic branding solutions." />
	<meta property="og:url" content="https://www.bloomdigitmedia.com/what-we-do/branding-and-design" />
	<meta property="og:site_name" content="Bloom Digital Media: Digital Marketing Agency" />
	<meta property="og:updated_time" content="2024-01-21T10:18:36+00:00" />
	<meta property="article:published_time" content="2024-01-21T10:18:24+00:00" />
	<meta property="article:modified_time" content="2023-11-01T20:18:36+00:00" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:title" content="Branding and Design - Bloom Digital Media" />
	<meta name="twitter:description" content="Define your brand's identity with Bloom Media's exceptional branding and design services. Our team specialises in creating unique visual identities, memorable logos, and impactful design elements that resonate with your target audience. From concept to execution, we craft cohesive and compelling brand experiences that set you apart. Trust Bloom Media to bring your brand vision to life through innovative design and strategic branding solutions." />
	<meta name="twitter:label1" content="Written by" />
	<meta name="twitter:data1" content="Babalola Dare" />
	<meta name="twitter:label2" content="Time to read" />
	<meta name="twitter:data2" content="1 minute" />
	<script>
		document.addEventListener("DOMContentLoaded", () => {
			const firstTab = document.getElementById("firstTab");
			firstTab.classList.add("active");
			const flyersContainer = document.getElementById("flyers-container");
			const printContainer = document.getElementById("print-container");
			const bloomStudiosContainer = document.getElementById(
			"bloomStudios-container"
			);
			flyersContainer.style.display = "flex";
			printContainer.style.display = "none";
			bloomStudiosContainer.style.display = "none";
		});
		function activateTab(tab) {
			const firstTab = document.getElementById("firstTab");
			const secondTab = document.getElementById("secondTab");
			const thirdTab = document.getElementById("thirdTab");
			const fourthTab = document.getElementById("fourthTab");
			const flyersContainer = document.getElementById("flyers-container");
			const videoAnimContainer = document.getElementById(
			"videoAnim-container"
			);
			const bloomStudiosContainer = document.getElementById(
			"bloomStudios-container"
			);

			const printContainer = document.getElementById("print-container");
			if (tab === 1) {
				firstTab.classList.add("active");
				secondTab.classList.remove("active");
				thirdTab.classList.remove("active");
				fourthTab.classList.remove("active");
				flyersContainer.style.display = "flex";
				videoAnimContainer.style.display = "none";
				printContainer.style.display = "none";
			} else if (tab === 2) {
				firstTab.classList.remove("active");
				thirdTab.classList.remove("active");
				fourthTab.classList.remove("active");
				secondTab.classList.add("active");
				flyersContainer.style.display = "none";
				videoAnimContainer.style.display = "flex";
				bloomStudiosContainer.style.display = "none";
				printContainer.style.display = "none";
			} else if (tab === 3) {
				firstTab.classList.remove("active");
				secondTab.classList.remove("active");
				fourthTab.classList.remove("active");
				thirdTab.classList.add("active");
				flyersContainer.style.display = "none";
				videoAnimContainer.style.display = "none";
				bloomStudiosContainer.style.display = "none";
				printContainer.style.display = "grid";
			} else if (tab === 4) {
				firstTab.classList.remove("active");
				thirdTab.classList.remove("active");
				secondTab.classList.remove("active");
				fourthTab.classList.add("active");
				flyersContainer.style.display = "none";
				videoAnimContainer.style.display = "none";
				bloomStudiosContainer.style.display = "flex";
				printContainer.style.display = "none";
			}
		}
	</script>
</x-tailwind-header-v2>
<x-navbar logo="/images/images-v2/footprint.png" header="Footprint" width="20%" />


		
    <section class="background p-6">
		<div class="tab-buttons">
			<h3 id="firstTab" onclick="activateTab(1)">Flyers</h3>
			<h3 id="secondTab" onclick="activateTab(2)">Video & Animation</h3>
			<h3 id="thirdTab" onclick="activateTab(3)">Print</h3>
			<h3 id="fourthTab" onclick="activateTab(4)">Bloom Studios</h3>
		</div>
		<div class="containers-group pl-10">
			<div class="relative grid grid-cols-4 gap-2 mt-5" id="flyers-container">
				{{-- <div class="bg-white">
					<img src="/images/images-v2/f2db8c844e8e8abd235197e653784d6d.jpeg" />
				</div> --}}
				<div class="bg-white">
					<img src="/images/images-v2/heritage_homes.png" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/dazzle_jencc.png" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/furniture_republic.png" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/foodstuff_store.png" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/podcast.png" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/emperor_flyers.png" />
				</div> 
				<div class="bg-white">
					<img src="/images/images-v2/fdc.png" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/furniture_rep_2.png" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/fdc2.png" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/back_to_school.png" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/dazzle_jencc2.png" />
				</div>
			</div>

			<div id="videoAnim-container">
				<div>
					<iframe src="https://drive.google.com/file/d/1SQLCBHUekdzUMGZ9pIslvRM4QxGq3RbO/preview" width="302" height="302" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1QGl0kbJqUv1VowxMfwLteRhjE8zrMMrX/preview" width="302" height="302" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1ZW4z1aonpU21qgoZqFUZYcwqRm8GcVwb/preview" width="302" height="302" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1syc4azBtepE-3HWPfUuiP61dLxMC2Ks3/preview" width="302" height="302" allow="autoplay"></iframe>
				</div>
			</div>
			<div id="print-container">
				<div class="bg-white">  
					<img src="/images/images-v2/rectangle_5.png" class="w-full" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/rectangle_6.png" class="w-full" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/rectangle_7.png" class="w-full" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/rectangle_8.png" class="w-full" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/rectangle_9.png" class="w-full" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/rectangle_5.png" class="w-full" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/rectangle_6.png" class="w-full" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/rectangle_7.png" class="w-full" />
				</div>
			</div>

			<div id="bloomStudios-container">
				<div class="bg-white">  
					<img src="/images/images-v2/rectangle_5.png" class="w-full" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/rectangle_6.png" class="w-full" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/rectangle_7.png" class="w-full" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/rectangle_8.png" class="w-full" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/rectangle_9.png" class="w-full" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/rectangle_5.png" class="w-full" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/rectangle_6.png" class="w-full" />
				</div>
				<div class="bg-white">
					<img src="/images/images-v2/rectangle_7.png" class="w-full" />
				</div>
			</div>
		</div>
    </section>
				
<x-newsletter />
<x-tailwind-footer-v2 />