{{--
<!-- Modal -->
<div class="modal fade " id="subscribe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  bg-gradient ">
    <div class="modal-content glass text-white" style="backdrop-filter: blur( 7.5px );
-webkit-backdrop-filter: blur( 7.5px );">
      <div class="modal-header">

        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body text-center my-3">
        <div class="icon-box mx-auto ">
          <i class="fa fa-envelope-open fa-5x"></i>
        </div>
        <h4 class="my-3">Subscribe to our newsletter</h4>
        <p>Join our subscribers list to get the latest news, updates and special offers delivered directly in your
          inbox.</p>
        <form name="subscribe-form">
          <div class="input-group my-5">
            <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
            <div class="input-group-append">
              <input type="button" onclick="subscribe()" class="btn btn-outline-warning" value="Subscribe">
            </div>

          </div>
        </form>

      </div>
    </div>
  </div>
</div> --}}

<!-- FORM MODAL -->

<!-- Modal toggle -->
{{-- <button
  class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
  type="button" data-modal-toggle="authentication-modal">
  Toggle modal
</button> --}}

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1"
  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex"
  aria-modal="true" role="dialog">
  <div class="relative p-4 w-full max-w-md h-full md:h-auto">
    <!-- Modal content -->
    <div class="relative service_blur rounded-lg shadow dark:service_blur">
      <button type="button" id="close-modal" onclick="closeModal()"
        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-bloom-black hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
        data-modal-toggle="authentication-modal">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
      <div class="py-6 px-6 lg:px-8">
        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
          Subscribe to our newsletter
        </h3>
        <p>
          Join our subscribers list to get the latest news, updates and special offers delivered directly in your inbox.
        </p>
        <br>
        <form class="space-y-6" name="subscribe-form">
          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
              email</label>
            <input type="email" name="email" id="email"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-bloom-black block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
              placeholder="name@company.com" required="true" />
          </div>

          <button type="submit" onclick="subscribe()" style="background: #FF8100"
            class="w-full text-white hover:bg-bloom-orange focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
            SUBSCRIBE
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- /FORM MODAL -->