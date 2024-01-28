<x-tailwind-header-v2 title="Contact Us - Bloom Digital Media">
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{asset('css/output.css')}}" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
		<meta name="description" content="Choose an award winning digital marketing agency in Abuja, Nigeria to handle your business marketing. Contact Bloom Media to schedule a marketing consultation and review of your current efforts. We offer knowledgeable advice on digital marketing services to elevate your marketing and get more leads."/>
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
    <link rel="canonical" href="https://www.bloomdigitmedia.com/contact-us" />
    <meta property="og:locale" content="en_NG" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content=Contact Us - Bloom Digital Media" />
    <meta property="og:description" content="Choose an award winning digital marketing agency in Abuja, Nigeria to handle your business marketing. Contact Bloom Media to schedule a marketing consultation and review of your current efforts. We offer knowledgeable advice on digital marketing services to elevate your marketing and get more leads." />
    <meta property="og:url" content="https://www.bloomdigitmedia.com/contact-us" />
    <meta property="og:site_name" content="Bloom Digital Media: Digital Marketing Agency" />
    <meta property="og:updated_time" content="2024-01-21T10:18:36+00:00" />
    <meta property="article:published_time" content="2024-01-21T10:18:24+00:00" />
    <meta property="article:modified_time" content="2023-11-01T20:18:36+00:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Contact Us - Bloom Digital Media" />
    <meta name="twitter:description" content="Choose an award winning digital marketing agency in Abuja, Nigeria to handle your business marketing. Contact Bloom Media to schedule a marketing consultation and review of your current efforts. We offer knowledgeable advice on digital marketing services to elevate your marketing and get more leads." />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="Babalola Dare" />
    <meta name="twitter:label2" content="Time to read" />
    <meta name="twitter:data2" content="1 minute" />
	</x-tailwind-header-v2>

		<!-- HEADER ONE -->
    <!-- HEADER ONE -->
		<x-navbar logo="/images/images-v2/telephone.png"
              header="Contact Us"
			  width="23%"/>
		<!-- /END OF HEADER ONE -->
    <section>

    <div class="background">
      <div class="header-text">
        <h3>Get in touch with Bloom Digital Media and let our team of specialists fix your problem. </h3>
      </div>
      <form action="/contact" method="POST" class="input-container">
        @csrf
        <input name="subject" hidden type="text" value="Contact" placeholder="Subject" />
        <input name="name" type="text" required placeholder="Name" />
        <input name="email" type="text" required placeholder="Email" />
        <input name="phone" hidden type="text" value="08130000000" required placeholder="Phone" />
        <textarea required name="message" rows="22" cols="13" placeholder="Message"></textarea>
        <button type="submit">SUBMIT</button>
      </form
    </div>
  </div>

		<!-- FOOTER -->
						<x-newsletter />
		

<x-tailwind-footer-v2 />