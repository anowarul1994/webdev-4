<!DOCTYPE HTML>
<html>

<head>
     <title>E-Commerce Shop</title>
     <!--css-->
     <link href="{{ asset('/frontend/assets/') }}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
     <link href="{{ asset('/frontend/assets/') }}/css/style.css" rel="stylesheet" type="text/css" media="all" />
     <link href="{{ asset('/frontend/assets/') }}/css/font-awesome.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!--css-->
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
     @include('frontend.includes.style')
     <!--search jQuery-->
     @include('frontend.includes.script')
     <!--//End-rate-->
</head>

<body>
     <!--header-->
     @include('frontend.includes.header')
     <!--header-->
     @yield('content')
     <!--content-->
     <!---footer--->
     @include('frontend/includes.footer')


</body>

</html>
