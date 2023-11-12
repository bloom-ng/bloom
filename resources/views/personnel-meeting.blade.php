
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
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="{{asset('css/local_style.css')}}">
  <link rel="stylesheet" href="{{asset('css/style_v1.css')}}">
  <!-- MD BOOTSTRAP 5 -->
  <link rel="stylesheet" href="/css/mdb.dark.min.css">

  <link rel="shortcut icon" href="/images/oo.png" type="image/x-icon">
  
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
  fbq('init', '1544542205912428');
  fbq('track', 'PageView');
</script>
<noscript>
  <img height="1" width="1" style="display:none" 
       src="https://www.facebook.com/tr?id=1544542205912428&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
    <title>Book A Meeting</title>
        <x-nav style="background:#000;
      height: 100vh;
      color: #fff;">

    </x-nav>
</head>

    
<body style="
     background: #fff;
      height: 100vh;
      color: #000;
    ">

<!--<div class="" style="min-height: 511px;">-->
<!--<div class="position-absolute display-1 fw-bolder" style="opacity:0.02; font-size:180px">-->
<!--    BOOK A MEETING-->

<!--</div>-->

<div class=" container">

<h2 class="display-5 mb-0 pb-0 mt-5">Gain clarity on what works in your industry and easily win your audience over.</h2>
<p class="mt-0 pt-0 fw-bolder text-warning">Book your free session and also get a free copy of our digital marketing plan specifically designed for your business.</p>

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
                    <div class="card-body">  &nbsp;
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


    <div class=" shadow-sm">
        <div class=" text-center">
            <img src="/images/{{$personnel->user->avatar}}" height="100px" width="150px" alt="" class="elevation-1 img-circle p-1"> <br>
            <h5 class="text-center text-muted my-3">{{$personnel->user->name}}</h5>
            
        </div>
        

        <div class="glass">
              <div class="card-header">
                <h3 class="card-title" style="color: white;">Please fill in the required information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/appointments" method="post">
              @csrf
              <input type="hidden" name="personnel_id" value="{{$personnel->id}}">
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
                <div class="form-group col-md-4">
                    <label for="requester_name">Name</label>
                    <input type="text" class="form-control" id="requester_name" name="requester_name" placeholder="John Doe" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="requester_email">Email address</label>
                    <input type="email" class="form-control" id="requester_email" name="requester_email" placeholder="Enter email" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="requester_phone">Phone</label>
                    <input type="text" class="form-control" id="requester_phone" name="requester_phone" placeholder="" required>
                  </div>
                  
                  <div class="form-group col-md-4">
                    <label for="start">When</label>
                    <small class="text-muted">(Working hours: Mon-Fri, 10am - 4pm)</small>
                    <input type="datetime-local" class="form-control" id="start" name="start"
                     min="{{\Carbon\Carbon::now()->addDay()->format('Y-m-d').'T'.\Carbon\Carbon::now()->format('H:m')}}"  
                      max="{{\Carbon\Carbon::now()->addMonths(2)->format('Y-m-d').'T'.\Carbon\Carbon::now()->addMonths(2)->format('h:m')}}"
                      pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}"
                    >
                  </div>
                  
                  <div class="form-group col-md-4">
                    <label for="duration">How Long?</label>
                    <select name="duration" id="duration" class="form-control">
                        <option value="15"> 15 mins</option>
                        <option value="30"> 30 mins</option>
                        <option value="60"> 60 mins</option>
                        <option value="90"> 1 hr 30 mins</option>
                    </select>
                  </div>
                  

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="form-control btn btn-outline-warning">Book Meeting</button>
                </div>
              </form>
            </div>
        

       
       




    </div>

</div>


</div>  <!-- End of Wrapper  -->


<x-to-top></x-to-top>




<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dist/js/adminlte.min.js"></script>
 <script src="/plugins/jquery/jquery.min.js"></script>

<x-footer>

</x-footer>
   
    
</body>
</html>






