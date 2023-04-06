<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Báo Mới - Tin tức mới nhất cập nhật</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    @include('wed.layout.style')
    @stack('style')
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">
        @include('wed.layout.header')
            @yield('content')
        <div class="dmtop">Scroll to Top</div>
        @include('wed.layout.footer')
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    @include('wed.layout.script')
    @stack('script')
</body>
</html>