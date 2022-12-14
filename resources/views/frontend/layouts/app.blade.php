<!DOCTYPE html>
<html lang="en">


  <!-- Mirrored from themes.hody.co/html/comet/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Jan 2017 09:39:31 GMT -->

  <head>
    <title>@yield('title','Comet | Creative Multi-Purpose HTML Template')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{asset('frontend/css/bundle.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/custom/custom.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Halant:300,400" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-46276885-13', 'auto');
      ga('send', 'pageview');
    </script>
  </head>

  <body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v15.0"
      nonce="BhwIgnfr"></script>
    @include("frontend.layouts.preloader")
    <!-- Navigation Bar-->
    @include('frontend.layouts.header')
    <!-- End Navigation Bar-->

    @section('main')

    @show

    <!--   widgets Section-->
    @include('frontend.layouts.widgets')
    <!--   End widgets Section-->

    <!-- Footer-->
    @include('frontend.layouts.footer')
    <!-- end of footer-->
    <script type="text/javascript" src="{{asset('frontend/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/bundle.js')}}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script type="text/javascript" src="{{asset('frontend/js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/custom/custom.js')}}"></script>
  </body>


  <!-- Mirrored from themes.hody.co/html/comet/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Jan 2017 09:39:31 GMT -->

</html>