<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fl Restaurant lite CPanel</title>

     <!-- Bootstrap 3.3.7 -->
   <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
     
    <!-- Time Picker -->
   <link href="{{ asset('js/bootstrap-timepicker.min.css') }}" rel="stylesheet">
   <!-- bootstrap datepicker -->
  <link href="{{ asset('bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
   <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <!-- Ionicons -->
  <link href="{{ asset('Ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <!-- Theme style -->
  <link href="{{ asset('css/AdminLTE.css') }}" rel="stylesheet">
  <!-- Dropzone -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">

   <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link href="{{ asset('css/skins/_all-skins.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
   <!-- Site wrapper -->
    <div class="wrapper">
       @include('layouts.topbar')
       @include('layouts.sidebar')
       @yield('content')
    </div>

    <!-- Scripts -->
<script src="{{ asset('js/whart.js') }}"></script>    
<script src="{{ asset('js/app.js') }}"></script>
<!-- jQuery 3 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset('js/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('js/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('js/bootstrap-timepicker.min.js') }}"></script>
  

<!-- Page script -->
<script>
  $(function () {
       //Date picker
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })
  })
</script>
  @yield('pagescripts')

</body>
</html>
