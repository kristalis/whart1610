@extends('adminpanel.cpanel')

@section('content')
@foreach($settingcontents as $settingcontent)
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Settings Page
        <small>  @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
  </small>
      </h1>
      <ol class="breadcrumb">
     <a href="{{ url('homes') }}"> <button type="submit" class="btn btn-primary">Visit Site</button> </a>
      <button type="submit" class="btn btn-primary" form="frmSettings">Save Settings</button> 
      <button type="submit" class="btn btn-primary">Save & Exit</button> 
    </ol>
    </section>
<!-- form start -->
             <!-- form start -->
              <form class="form-horizontal" method="POST" action="{{ route('spanel.store') }}" id="frmSettings" enctype="multipart/form-data">
                        {{ csrf_field() }}
    <!-- Main content -->
    <section class="content">
      <div class="row">
                <!-- left column -->
                        <div class="col-md-6">
                              
                                   <div class="col-xs-4"> 
                                <input id="admin_email" type="text" class="form-control input-lg" name="admin_email" value="{{$settingcontent->adminemail}}" required autofocus>

                                @if ($errors->has('admin_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admin_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                     
                              
                                   <div class="col-xs-4"> 
                                <input id="admin_email" type="text" class="form-control input-lg" name="admin_email" value="{{$settingcontent->adminemail}}" required autofocus>

                                @if ($errors->has('admin_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admin_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                         
                              
                                   <div class="col-xs-4"> 
                                <input id="admin_email" type="text" class="form-control input-lg" name="admin_email" value="{{$settingcontent->adminemail}}" required autofocus>

                                @if ($errors->has('admin_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admin_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                               <div class="col-xs-4"> 
                                <input id="admin_email" type="text" class="form-control input-lg" name="admin_email" value="{{$settingcontent->adminemail}}" required autofocus>

                                @if ($errors->has('admin_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admin_email') }}</strong>
                                    </span>
                                @endif
                                  <button type="submit" class="btn btn-primary">Submit your Booking</button>
                            </div>
                     
                              
                                   <div class="col-xs-4"> 

                                     

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                            
                            </div>
                         
                              
                                   <div class="col-xs-4"> 
                                     <!-- time Picker -->
              <div class="bootstrap-timepicker">
                               <div class="input-group">
                    <input type="text" class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                
                </div>
                            </div>


                                 





                        </div>
</div>
 <div class="row">
        <!-- left column -->
        <div class="col-md-6 text-center">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             <i class="fa fa-phone"></i><h3 class="box-title text-red ">We will contact you to Confirm Booking</h3>
            
            </div>
          </div>
        </div>
      </div>
          </section>
          
@endforeach
@endsection
@section('pagescripts')
<!-- bootstrap time picker -->
<script src="js/timepicker/bootstrap-timepicker.min.js"></script>
<script type="text/javascript">
    $('#select_file').click(function() {
    $('#logo').trigger('click');
    $('#logo').change(function() {
        var filename = $('#logo').val();
        if (filename.substring(3,11) == 'fakepath') {
            filename = filename.substring(12);
        } // Remove c:\fake at beginning from localhost chrome
       $('#my_file').html(filename);
          $('#my_logo').val(filename);
   });
});
        </script>

    <script type="text/javascript">    
    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  </script>
@endsection