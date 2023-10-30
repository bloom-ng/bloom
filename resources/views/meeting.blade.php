
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bloom Digital Media is a Media and Communications Agency looking to partner
                with leading brands to engineer ROI focused digital campaigns and activities
                that attract, connect, engage, improve sales and convert Nigerian consumers online.">

     <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style  -->
   <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/local_style.css">
  <link rel="shortcut icon" href="/images/oo.png" type="image/x-icon">
  <!-- MD BOOTSTRAP 5 -->
  <link rel="stylesheet" href="/css/mdb.dark.min.css">
  
  <!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '191455833134089');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=191455833134089&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
  
    <title>Book A Meeting</title>
</head>

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
    <img style="height:45px" src="/img/meeting.png">
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

<body style="
      background: #000;
      height: 100vh;
      color: #fff;
    ">
<!--<div class="container "> <a href="/" class="text-warning"> <i class="fa fa-caret-left fa-2x"></i> <i class="fa fa-home fa-3x"></i></a></div>-->

<div class="" style="min-height: 511px;" >
<!--<div class="position-absolute display-1 fw-bolder" style="opacity:0.02; font-size:180px">-->
<!--    BOOK A MEETING-->

<!--</div>-->
<div class="mt-5"></div>
<div class="container mt-5 pb-3">

<!--<h2 class="display-5 mb-0 pb-0 mt-5">Gain clarity on what works in your industry and easily win your audience over.</h2>-->
<!--<p class="mt-0 pt-0 fw-bolder" style="color: #FF6B2B;">Book your free session and also get a free copy of our digital marketing plan specifically designed for your business.</p>-->

            @if (session('action-success'))
                  <div class="card bg-warning" onclick="this.style.display = 'none'" >
                    <div class="card-header">
                      <i class="fas fa-check fa-2x"></i>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">  
                      {{session('action-success')}}
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  @endif

                  @if (session('action-fail'))
                  <div class="card bg-danger" onclick="this.style.display = 'none'" >
                    <div class="card-header">
                      <i class="fas fa-info fa-2x"></i>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">  &nbsp;
                      {{session('action-fail')}}
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  @endif


    <div class="row flex-container shadow-sm">
        <!--<div class=" text-center">-->
        <!--    <img src="/images/oo.png" height="100px" width="150px" alt="" class="elevation-0"> <br>-->
        <!--    <h5 class="text-center text-muted my-3">Bloom Digital Media</h5>-->
            
                    
    
        <!--</div>-->
            <div class="my-3"></div>
        <div class="container ">
                <div class="col-md-6">
            <!-- SVG STARTS -->
            
                    <h1 class="fw-bold">Gain clarity on what works in your industry and easily win your audience over.</h1>
            
                    <p class="fw-bold mt-2 text-white"><i class="fas fa-check-circle mt-2 text-blue"></i> Book your free session</p>
                    <p class="fw-bold mt-2 text-white"><i class="fas fa-check-circle mt-2 text-blue"></i> Get a free copy of our digital marketing plan</p>
                </div>
            <!-- SVG ENDS -->
            
            <!-- Form Starts-->
            <div class="col-md-6 mt-2">
        <div class="overflow-hidden bg-white glass p-4">
              <div class="card-header-light" >
                <h3 class="text-dark mt-2 fw-bold">Please fill in the required information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/appointments" method="post">
              @csrf
                <div class="card-body row">
                @if ($errors->has('requester_name')) <br>
                  <p class="text-danger">{{$errors->first('requester_name')  }} </p>
                  @endif
                  @if ($errors->has('requester_phone')) <br>
                  <p class="text-danger">{{$errors->first('requester_phone')  }} </p>
                  @endif
                  
                   @if ($errors->has('requester_email')) <br>
                  <p class="text-danger">{{$errors->first('requester_email')  }} </p>
                  @endif
                <div class="form-group col-md-6">
                    <label for="requester_name">Name</label>
                    <input type="text" class="text-dark form-control border-0" style="background-color: #d7defc;" id="requester_name" name="requester_name" placeholder="Full Name*" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="requester_email">Email</label>
                    <input type="email" class="text-dark form-control border-0" style="background-color: #d7defc;" id="requester_email" name="requester_email" placeholder="Email Address*" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="requester_phone">Phone</label>
                    <input type="text" class="text-dark form-control border-0" style="background-color: #d7defc;" id="requester_phone" name="requester_phone" placeholder="" required>
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label for="start">Date</label>
                    <!--<small class="text-muted">(Working hours: Mon-Fri, 10am - 4pm)</small>-->
                    <input type="datetime-local" class="text-dark form-control border-0" style="background-color: #d7defc;" id="start" name="start"
                     min="{{\Carbon\Carbon::now()->addDay()->format('Y-m-d').'T'.\Carbon\Carbon::now()->format('H:m')}}"  
                      max="{{\Carbon\Carbon::now()->addMonths(2)->format('Y-m-d').'T'.\Carbon\Carbon::now()->addMonths(2)->format('h:m')}}"
                      pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}"
                    >
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label for="duration">Duration</label>
                    <select name="duration" id="duration" class="text-dark form-control border-0" style="background-color: #d7defc;">
                        <option value="15"> 15 mins</option>
                        <option value="30"> 30 mins</option>
                        <option value="60"> 60 mins</option>
                        <option value="90"> 1 hr 30 mins</option>
                    </select>
                  </div>
                  

                </div>
                <!-- /.card-body -->

                <div class="mb-3">
                  <button type="submit" class="fw-bold text-white bg-warning form-control btn btn-outline-warning sub">Book Meeting</button>
                </div>
              </form>
        </div>
        </div>
        
    </div><!-- row div end -->


    </div>

</div>


</div>  <!-- End of Wrapper  -->




<x-to-top></x-to-top>
 



<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dist/js/adminlte.min.js"></script>
<script src="/plugins/jquery/jquery.min.js"></script>


 
<!-- JS link start -->

<!-- Light Box Script-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js" integrity="sha512-b4rL1m5b76KrUhDkj2Vf14Y0l1NtbiNXwV+SzOzLGv6Tz1roJHa70yr8RmTUswrauu2Wgb/xBJPR8v80pQYKtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

  lightGallery(document.querySelector('.gallery'));

</script>

<!-- Light Box Script-->

<!--AOS SCRIPT-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();
</script>
  <!--AOS SCRIPT-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!--MD BOOTSTRAP JS -->
<script src="/js/mdb.min.js"></script>

<script src="/js/app.js"></script>
<script src="/js/script.js"></script>
<!-- JS link end -->


   
    
</body>
</html>






