<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Welcome to BIT2ATM</title>
      <link href="{{ asset('user/css/bootstrap.css')}}" type="text/css" rel="stylesheet" />
      <script src="{{ asset('user/js/jquery-1.11.0.min.js')}}"></script>
      <!---menu link-->
      <link rel="stylesheet" href="{{ asset('user/menu/styles.css')}}">
      <script src="{{ asset('user/menu/script.js')}}"></script>
      <!---menu link-->
      <!--home silder-->
      <link href="{{ asset('user/acheiver-slider/owl.carousel.css')}}" rel="stylesheet">
      <script src="{{ asset('user/acheiver-slider/owl.carousel.js')}}"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
      <script>
         $(document).ready(function() {
         
           
         $("#hometestslider").owlCarousel({
             navigation :true,
             autoHeight : true,
             autoPlay : true,
             pagination: false,
             items :4,
             itemsDesktop : [1199,3],
             itemsDesktopSmall : [979, 2],
             itemsTablet : [768, 2],
             itemsTabletSmall : false,
             itemsMobile : [480, 1]
           });
           
               
         });
      </script>
      <script>
         $( function() {
           $( ".datepicker" ).datepicker();
         } );
      </script>
      <link rel="stylesheet" href="{{ asset('user/css/style.css')}}" type="text/css" />
      <link rel="stylesheet" type="text/css" href="{{ asset('user/css/responsive.css')}}" />
   </head>
   <body style="background:#fff;">
      <!--header-start--->
      <div class="header-out" >
         <div class="container container-1400">
            <div class="col-md-2">
               <a href="index.html">
                  <div class="head-logo">
                     <img src="{{ asset('user/images/logo.png')}}" />
                  </div>
               </a>
            </div>
            <!--menu-->
            <div class="col-md-7">
               <div class="menu-out">
                  <div id='cssmenu'>
                     <ul>
                        <li class="first  "><a href='{{ url("/user/dashboard") }}'>Dashboard</a></li>
                        <li  class=" "><a href="#">Security</a></li>
                        <li  class=" "><a href="#">Identification</a></li>
                        <li  class=" "><a href="#">Payment</a></li>
                        <li  class=" "><a href="#">Referral</a></li>
                        <li  class="last active"><a href="#">Settings</a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <!--menu-->
            <div class="col-md-3">
               <div class="head-icons">
                  <div class="soci-out">
                     <!-- <div class="mail_id_img2 hvr-grow-rotate">
                        <a href="#" >
                        <img src="{{ asset('user/images/Layer 23.png')}}">
                        </a>
                        </div>
                        
                        <div class="mail_id_img2 hvr-grow-rotate">
                        <a href="#">
                        <img src="{{ asset('user/images/Group 1.png')}}">
                        </a>
                        </div> -->
                  </div>
               </div>
            </div>
            @if(auth::user())
            <div class="col-md-2">
               <div class="head-icons">
                  <div class="soci-out">
                     <div class="mail_id_img2 hvr-grow-rotate">
                        <a href="#" >
                        <img src="{{ asset('user/images/Layer 23.png') }}">
                        </a>
                     </div>
                     <div class="mail_id_img2 hvr-grow-rotate">
                        <a href="#">
                        <img src="{{ asset('user/images/Group 1.png') }}">
                        </a>
                     </div>
                     <div class="mail_id_img2 hvr-grow-rotate">
                        <a href="{{ url('/user/account') }}" >
                        <img src="{{ asset('user/images/Layer 21.png') }}">
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            @endif
         </div>
      </div>
      <!--header-end--->
      <div id="app">
         <main class="py-4">
            @yield('content')
         </main>
      </div>
      <div class="clear"></div>
      <!--footer-start--->
      <div class="footer-bg">
         <div class="container container-1500">
            <div class="col-md-3">
               <div class="foot-address">
                  <a href="index.html"><img src="{{ asset('user/images/logo-footer.png')}}" /></a>
               </div>
               <ul class="ul_footer-1">
                  <li><img src="{{ asset('user/images/Layer 724.png')}}" /><a href="#">Submit Request</a></li>
                  <li> <img src="{{ asset('user/images/Layer 7244.png')}}" /><a href="#">Join Us</a></li>
                  <li> <img src="{{ asset('user/images/Layer 713.png')}}" /><a href="#">Fees</a></li>
               </ul>
            </div>
            <div class="col-md-3">
               <div class="fot-heading">
                  QUICK MENU<br />
               </div>
               <div class="fot-links allmenu">
                  <ul>
                     <li class="fot-bullet"><a href="#"><span>Trade</span></a></li>
                     <li class="fot-bullet"><a href="exchange.html"><span>Exchange</span></a></li>
                     <li class="fot-bullet"><a href="api.html"><span>API</span></a></li>
                  </ul>
               </div>
            </div>
            <div class="col-md-3">
               <div class="fot-heading">
                  CONTACT US<br />
               </div>
               <div class="fot-links allmenu">
                  <ul>
                     <li class="fot-bullet"><a href="#"><span>Email</span></a></li>
                     <li class="fot-bullet"><a href="#"><span>Submit Feedback</span></a></li>
                  </ul>
               </div>
            </div>
            <div class="col-md-3">
               <div class="fot-out21">
                  <div class="fot-heading">
                     SOCIAL MEDIA <br />
                  </div>
                  <div style="background:none;" class="topcont__part1">
                     <a class="ft-so-icon" href="#"><img class="hvr-rotate" src="{{ asset('user/images/Layer 766.png')}}"></a>
                     <a class="ft-so-icon"href="#"><img class="hvr-rotate" src="{{ asset('user/images/Layer 767.png')}}"></a>
                     <a class="ft-so-icon"href="#"><img class="hvr-rotate" src="{{ asset('user/images/Layer 769.png')}}"></a>
                     <a class="ft-so-icon"href="#"><img class="hvr-rotate" src="{{ asset('user/images/Layer 769.png')}}"></a><br />
                     <a class="ft-so-icon"href="#"><img class="hvr-rotate" src="{{ asset('user/images/Layer 770.png')}}"></a>
                     <a class="ft-so-icon"href="#"><img class="hvr-rotate" src="{{ asset('user/images/Layer 771.png')}}"></a>
                     <a class="ft-so-icon"href="#"><img class="hvr-rotate" src="{{ asset('user/images/Layer 772.png')}}"></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="fot-pattern">
         <div class="container ">
            <div class="copyright-text-1">
               Copyright &copy; 2021 Bit2atm . All rights reserved.
            </div>
         </div>
      </div>
      <!--footer-end--->
   </body>
</html>