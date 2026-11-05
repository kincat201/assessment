<html>
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Koperasi Astra - Membangun Kesejahteraan Bersama</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
   <!--  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     -->

    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Bootstrap Core Css -->
    {!!Html::Style('assets/app/plugins/bootstrap/css/bootstrap.css')!!}
    
    <!-- Waves Effect Css -->
    {!!Html::Style('assets/app/plugins/node-waves/waves.css')!!}
    <!-- Animation Css -->
    {!!Html::Style('assets/app/plugins/animate-css/animate.css')!!}
    <!-- Morris Chart Css-->
    {!!Html::Style('assets/app/plugins/morrisjs/morris.css')!!}
    <!-- Custom Css -->
    {!!Html::Style('assets/app/css/style.css')!!}
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    {!!Html::Style('assets/app/css/themes/all-themes.css')!!}
    <!--Font Icon-->
    {!!Html::Style('assets/app/plugins/font-awesome/4.7.0/css/font-awesome.min.css')!!}
    <!--confirm dialog-->
    {!!Html::Style('assets/app/confirm-dialog/min/jquery.sweet-modal.min.css')!!}
    @yield('style')
    <!-- </head> -->
</head>

<body class="theme-red" style="background-color: #E4E6E7;">
    <div style="display:none;" id="spinner-preview"></div><!-- spin.js -->
    <!-- Page Loader -->
       <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
   
   <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                
                <a href="javascript:void(0);" class="bars"></a>
                &nbsp;&nbsp;<a class="navbar-brand"><small><img src="{{url('assets/login/images/book.png')}}" style="width:100px;height:100px;"></small></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                     <li><a href="{{url('/logout')}}"><i class="menu-icon fa fa-close fa-2x"></i>Logout</a></li>
                    <!-- #END# Call Search -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    
    @yield('content')
    

    <!--Start of Tawk.to Script-->
    <!-- Jquery Core Js --> 
    {!!Html::script('assets/app/plugins/jquery/jquery-2.2.4.js')!!}
    <!-- Bootstrap Core Js -->
    {!!Html::script('assets/app/plugins/bootstrap/js/bootstrap.js')!!}
    <!-- Select Plugin Js -->
    
    <!-- Slimscroll Plugin Js -->
    {!!Html::script('assets/app/plugins/jquery-slimscroll/jquery.slimscroll.js')!!}
    <!-- Waves Effect Plugin Js -->
    {!!Html::script('assets/app/plugins/node-waves/waves.js')!!}
    <!-- Jquery CountTo Plugin Js -->
    {!!Html::script('assets/app/plugins/jquery-countto/jquery.countTo.js')!!}
    <!-- Morris Plugin Js -->
    {!!Html::script('assets/app/plugins/raphael/raphael.min.js')!!}
    {!!Html::script('assets/app/plugins/morrisjs/morris.js')!!}

    <!-- ChartJs -->
    {!!Html::script('assets/app/plugins/chartjs/Chart.bundle.js')!!}


    <!-- Flot Charts Plugin Js -->
    {{--{!!Html::script('assets/app/plugins/flot-charts/jquery.flot.js')!!}
        {!!Html::script('assets/app/plugins/flot-charts/jquery.flot.resize.js')!!}
        {!!Html::script('assets/app/plugins/flot-charts/jquery.flot.pie.js')!!}
        {!!Html::script('assets/app/plugins/flot-charts/jquery.flot.categories.js')!!}
        {!!Html::script('assets/app/plugins/flot-charts/jquery.flot.time.js')!!} --}}

    <!-- Sparkline Chart Plugin Js -->
    {!!Html::script('assets/app/plugins/jquery-sparkline/jquery.sparkline.js')!!}
    {!!Html::script('assets/app/confirm-dialog/min/jquery.sweet-modal.min.js')!!}
    <!-- Custom Js -->
    {!!Html::script('assets/app/js/admin.js')!!}
      {{--  {!!Html::script('assets/app/js/pages/index.js')!!} --}}
    <!-- Demo Js -->
    {!!Html::script('assets/app/js/demo.js')!!}
    <!-- SPINNER -->
    {!!Html::script('assets/app/spin/spin.js')!!} 

    @yield('scripts')

    <script type="text/javascript">
        
    var Rats = {};
    
    Rats.UI = {};

    
    Rats.UI.LoadAnimation = {
        "start" : function() {
          $('#spinner-preview').css('display','inline');
          $('#spinner-preview').height('100%');
          $('#spinner-preview').width('100%');
          var top = $(window).height() / 2;
          var left = $(window).width() / 2;
          
          var opts = {
            lines:13,
            length:28,
            width:14,
            radius:42,
            scale:0.2,
            corners:1,
            color:'#FFFFFF',
            opacity:0.25,
            rotate:0,
            direction:1,
            speed:0.5,
            trail:60,
            fps:20,
            zIndex:2e9,
            className:'spinner',
            top:top + 'px',
            left:left + 'px',
            shadow:false,
            hwaccel:false,
            position:'fixed'};
        
            var target = document.getElementById('spinner-preview');
            return new Spinner(opts).spin(target);
        },
        "stop" : function(spinner) {
            spinner.stop();
            $('#spinner-preview').fadeOut(200);
            //$('#spinner-preview').css('display','none');
            //$('#spinner-preview').hide.empty();
        }
    };

    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5e8416d535bcbb0c9aac765d/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>
