<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light" style="#1D1D1D">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
    class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
      <!-- Navbar brand -->
      <a class="navbar-brand" href="/">
    <img style="height:45px" src="/images/assets/bloom-logo.png">
    </a>

     <!-- Collapsible wrapper -->
   
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      <!-- Nav Items -->
      <div class="da_list">
      <ul class="navbar-nav mb-4 mb-lg-0">
      <li class="nav-item">
            <a class="nav-link" href="/services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/meeting">Book A Meeting</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
      </ul>
    </div>
      <!-- Nav Items -->
    
    </div>
        <!-- Collapsible wrapper -->
 </div>
</nav>

<!-- Curtain Nav -->
<div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content text-warning">
      
      <a href="/services" class="text-warning">Services</a>
      <a href="/contact" class="text-warning">Contact Us</a>
      <a href="/meeting" class="text-warning">Book a Meeting</a>
      <a href="/blog" class="text-warning">Blog</a>
      <a href="/about" class="text-warning">About</a>
      
    </div>
</div>

  <!-- End curtain nav -->

<!-- Navbar Ends -->

{{$slot}}