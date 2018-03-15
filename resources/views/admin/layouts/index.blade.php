<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Smart-Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('assets/css/style.css')}}" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('assets/css/font.css')}}" type="text/css"/>
<link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet"> 
@yield('css')
<!-- //font-awesome icons -->
<script src="{{asset('assets/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('assets/js/modernizr.js')}}"></script>
<script src="{{asset('assets/js/jquery.cookie.js')}}"></script>
<script src="{{asset('assets/js/screenfull.js')}}"></script>
    <script>
    $(function () {
      $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

      if (!screenfull.enabled) {
        return false;
      }

      

      $('#toggle').click(function () {
        screenfull.toggle($('#container')[0]);
      }); 
    });
    </script>
<!-- charts -->
<script src="{{asset('assets/js/raphael-min.js')}}"></script>
<script src="{{asset('assets/js/morris.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/css/morris.css')}}">
<!-- //charts -->
<!--skycons-icons-->
<script src="{{asset('assets/js/skycons.js')}}"></script>
<!--//skycons-icons-->
</head>
<body class="dashboard-page">
  <script>
          var theme = $.cookie('protonTheme') || 'default';
          $('body').removeClass (function (index, css) {
              return (css.match (/\btheme-\S+/g) || []).join(' ');
          });
          if (theme !== 'default') $('body').addClass(theme);
        </script>

  <!-- nav -->
  @include('admin.layouts.nav')

  <!--/nav-->
  <section class="wrapper scrollable">
    <nav class="user-menu">
      <a href="javascript:;" class="main-menu-access">
      <i class="icon-proton-logo"></i>
      <i class="icon-reorder"></i>
      </a>
    </nav>
    @include('admin.layouts.header')
    
    @yield('content')
    <!-- footer -->
    <div class="footer">
      <p>© 2016 Colored . All Rights Reserved . Design by <a href="http://w3layouts.com/">W3layouts</a></p>
    </div>
    <!-- //footer -->
  </section>
  <script src="{{asset('assets/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/js/proton.js')}}"></script>
  @section('script')
  @show
</body>
</html>
