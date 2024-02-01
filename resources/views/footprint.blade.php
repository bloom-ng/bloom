

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
			flyersContainer.style.display = "grid";
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
				flyersContainer.style.display = "grid";
				videoAnimContainer.style.display = "none";
				printContainer.style.display = "none";
			} else if (tab === 2) {
				firstTab.classList.remove("active");
				thirdTab.classList.remove("active");
				fourthTab.classList.remove("active");
				secondTab.classList.add("active");
				flyersContainer.style.display = "none";
				videoAnimContainer.style.display = "grid";
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
				bloomStudiosContainer.style.display = "grid";
				printContainer.style.display = "none";
			}
		}
	</script>
</x-tailwind-header-v2>
<x-navbar logo="/images/images-v2/footprint.png" header="Our Footprint" width="28%" />


		
    <section class="background max-w-[100vw]">
		<div class="tab-buttons max-w-[100vw] mx-[3%] pt-[7%] md:px-12">
			<h3 id="firstTab" onclick="activateTab(1)">Flyers</h3>
			<h3 id="secondTab" onclick="activateTab(2)">Video & Animation</h3>
			<h3 id="thirdTab" onclick="activateTab(3)">Print</h3>
			<h3 id="fourthTab" onclick="activateTab(4)">Bloom Studios</h3>
		</div>
		<div class="containers-group max-w-[100vw] pt-[4%] pb-[5%] mx-[5%] lg:mx-20">
			<div class="grid grid-cols-4 gap-2 mt-5" id="flyers-container">
				@foreach ($data as $item)
					<div class="bg-white">
						<img src="/images/images-v2/reduced_flyers/{{$item}}" />
					</div>
				@endforeach
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mt-5" id="videoAnim-container">
				<div>
					<iframe src="https://drive.google.com/file/d/1SQLCBHUekdzUMGZ9pIslvRM4QxGq3RbO/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1XMdEo2Jqeat1PB_Svj4-HCWeZBD9bWzH/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1y-1v4w2A-leTpQW4HLegSxgHFmTw0zhx/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1UWTaIsyGWr3YAuHAwKd3AG7jxLKrMOYa/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1wzanDNSr3AaPVJEl__xD2Z76yQet-3QG/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1F5sje8VeVRZwfHvAXYva1lOnbzO2XZbw/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/18az-RxlnqAvKU15Rs57_rPa7YEVIMHCl/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1CVU6j5lSFlYAfbINpaqDm4ynybPdN-1Z/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1S63NqB-QQ55sqwNN2pzFEedp3S3D31h2/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/14YMXvThdKZ9QF2UHivDp2BghwwPh5-uT/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1rH5Cax6V08dL6RoTSmWhlSQOCpQbgCTh/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1T17-DpvwlOM7b0lFhZdX91khHm9RnGya/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/12mMfAxnovwqvWFCN3tWyZlOl5i03vBPV/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1p3VkV8JE-6osblywOjImZ3Gha6tpbFPb/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1t2VjAkurnG4zoFRIgx4x5HbjdgeHs46a/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/18wDjDM1azxZI4IRRF5lfNOX3fDm-NxZT/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1DjtQXuqLjBrP-J6hQsBdwjek7zcgH7Uf/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1ybCl7ZxAPUINpSa-RXN7Hw-Kazxa4_QI/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1m7LZsrI-LKHonOEwT9r-cNSTvOEWsB8x/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1s591kYGawSTjxpt6LKCpdHsnL-D5Cp7j/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1AYE1XXMnTIu33pswo2AoPU5THpihR_mv/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1Iq9owzygiZHEx5DMJVnqlXLUfRqMssVJ/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1_dabJVSpWDLyx7FnRMSIxnkUkx6ilalJ/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1jFO_aYx6m4FbDf6Ei_6jyO96XkOVqyej/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
				<div>
					<iframe src="https://drive.google.com/file/d/1ZoDtv2AC310uJQjRPUrYRtwxwvqB2kVH/preview" width="390" height="250" allow="autoplay"></iframe>
				</div>
			</div>

			<div class="grid grid-cols-3 gap-4 mt-5" id="print-container">
				<div class="grid gap-4">
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-01.png" alt="">
					</div>
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-02.png" alt="">
					</div>
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-03.png" alt="">
					</div>
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-04.png" alt="">
					</div>
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-15.png" alt="">
					</div>
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-16.png" alt="">
					</div>
				</div>
				<div class="grid gap-4">
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-05.png" alt="">
					</div>
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-06.png" alt="">
					</div>
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-07.png" alt="">
					</div>
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-08.png" alt="">
					</div>
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-14.png" alt="">
					</div>
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-17.png" alt="">
					</div>
				</div>
				<div class="grid gap-4">
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-09.png" alt="">
					</div>
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-10.png" alt="">
					</div>
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-11.png" alt="">
					</div>
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-12.png" alt="">
					</div>
					<div>
						<img class="" src="/images/images-v2/PRINT REDUCED/DSC_1148-13.png" alt="">
					</div>
				</div>
			</div>

			<div class="grid grid-cols-3 gap-4 mt-5" id="bloomStudios-container">
				@foreach ($studios as $item)
					<div class="bg-white">
						<img src="/images/images-v2/reduced_studios/{{$item}}" />
					</div>
				@endforeach
			</div>
		</div>
    </section>
				
<x-newsletter />
<x-tailwind-footer-v2 />