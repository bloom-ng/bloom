 <footer class="bg-stone-900 max-w-[100vw] px-14 py-8 flex-col flex lg:flex-row items-center justify-around">
     <p class="h-10 text-white text-md lg:text-2xl font-normal font-grotesk leading-10 mb-10 lg:mb-0">
         All Rights Reserved. Bloom Digital Media Limited.
     </p>

     <div class="flex">
         <a href="https://www.instagram.com/bloom_digitalmedia?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
             target="_blank"><img src="/images/images-v2/Instagram.svg" alt="Instagram Link" /></a>
         <a href="https://x.com/bloomdigitmedia?s=20" target="_blank"><img src="/images/images-v2/Twitter.svg"
                 alt="X Link" /></a>
         <a href="https://www.linkedin.com/company/bloom-digital-media-nigeria/" target="_blank"><img
                 src="/images/images-v2/LinkedIn.svg" alt="LinkedIn Link" /></a>
         <a href="https://www.facebook.com/bloomdigitmedia/" target="_blank"><img src="/images/images-v2/Facebook.svg"
                 alt="Facebook Link" /></a>
         <a href="https://www.tiktok.com/@bloomdigitmedia?_t=8j71WPhCotx&_r=1" target="_blank"><img
                 src="/images/images-v2/TikTok.svg" alt="TikTok Link" /></a>
         <a href="https://www.youtube.com/@Bloom_DigitalMedia" target="_blank"><img src="/images/images-v2/YouTube.svg"
                 alt="Youtube Link" /></a>
     </div>
 </footer>



 <!-- /END OF FOOTER -->

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"
     integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 <script src="/js/script.js"></script>
 {{ $slot }}
 </body>
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
 <script>
     $("#reload-captcha").click(function() {
         $.ajax({
             type: "GET",
             url: "/reload-captcha",
             success: function(data) {
                 $('#captcha-field span').html(data.captcha);
             }
         })
     });
 </script>
 <script>
     $("#reload-captcha2").click(function() {
         $.ajax({
             type: "GET",
             url: "/reload-captcha",
             success: function(data) {
                 $('#captcha-field2 span').html(data.captcha);
             }
         })
     });
 </script>

 </html>
