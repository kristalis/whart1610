<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>
    @yield('title')
</title>
 <!-- Styles -->
    
 
    <!--[if lte IE 8]><link rel="stylesheet" href="css/iecompatibility.css"><![endif]-->
 
        <link href="{{ asset('csshome/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('csshome/bootstrap.responsive.css') }}" rel="stylesheet">
         <link href="{{ asset('csshome/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('csshome/animate-main.css') }}" rel="stylesheet">
        <link href="{{ asset('csshome/hover-min.css') }}" rel="stylesheet">
         <link href="{{ asset('csshome/main.css') }}" rel="stylesheet">
        <link href="{{ asset('csshome/jquery.cookiebar.css') }}" rel="stylesheet">
        
            <!-- main-->
   
        <!--[if lte IE 8]><link rel="stylesheet" href="css/iecompatibility.css"><![endif]-->
     
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Tinos:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather:300i,400,400i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    
       
        

        
</head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
        <header>
            <nav class="navbar">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <div class="row-fluid hidden-desktop">
                            <a class="btn btn-navbar span12" data-toggle="collapse" data-target=".nav-collapse">
                                <div class="menu-left">
                                    Click here for menu
                                </div>
                                <div class="menu-right">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </div>
                            </a>
                        </div>
                        <!--<a class="brand" href="#">Optional tag line</a>-->
                        <div class="nav-main-flex-container">
                            <div class="nav-container nc-logo">
                    @foreach (json_decode($pageheader->setting()->get()) as $setting)
                   
                                <a href ="{{ url('homes') }}">
                                    <img alt="" src="banners/{{$setting->logo}}">
                                </a>
                            @endforeach
                            </div>
                            <div class="nav-container nc-nav">
                                <div class="nav-collapse collapse">
                                    <ul class="nav">
                                        <li><a href="{{ url('homes') }}">Home</a>  </li>
                                        <li><a href="{{ url('abouts') }}">About</a></li>
                                        <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Rooms <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                        <li><a href="{{ url('rooms') }}">Accommodation</a></li>
                                        <li><a href="{{ url('functionrooms') }}">Functions</a></li>
                                        </ul>
                                    </li>
                                        <li><a href="{{ url('menus') }}">Menu</a></li>
                                        <li><a href="{{ url('events') }}">Events</a></li>
                                        <li><a href="{{ url('galleries') }}">Gallery</a></li>
                                        <li><a href="{{ url('contacts') }}">Contact</a></li>
                                
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>  

          @yield('content')
          
          @include('layouts.footer')
    
    <!-- Scripts -->
    

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
     
        <!-- bootstrap -->
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <script type="text/javascript" src="http://www.whitehartwelwyn.co.uk/js/vendor/jquery.cookiebar.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $.cookieBar({
                });
            });
        </script>
       <!-- bootstrap datepicker -->
            <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
            <!-- bootstrap datepicker -->
            <script src="{{ asset('js/bootstrap-timepicker.min.js') }}"></script>
     
        <script>

        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
        onRender: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
        }).on('changeDate', function(ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout.setValue(newDate);
        }
        checkin.hide();
        $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
        onRender: function(date) {
        return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
        }).on('changeDate', function(ev) {
        checkout.hide();
        }).data('datepicker');

        </script>
       

        <script src="{{ asset('/js/wow.min.js') }}"></script>
        <script src="{{ asset('/js/main.js') }}"></script>
        <script src="{{ asset('/js/index.js') }}"></script>
        <script src="{{ asset('/js/banner.js') }}"></script>
        <script src="{{ asset('/js/unitegallery.min.js') }}"></script>
   

        @yield('pagescripts')

        
    </body>
</html>

