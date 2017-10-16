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
             <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Logo</h3>
            </div>
                        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
      <div class="col-xs-4">                          
  <div id="select_file" class="btn btn-success btn-lg">Select a file</div>
        <input class='file' type="file" style="display: none" class="form-control" name="logo" id="logo" placeholder="Please choose your image">
  
  </div>    <div class="col-xs-8">

  <input id="my_logo" type="hidden" name="my_logo" class="form-control input-lg" value="{{$settingcontent->logo}}" >
          
                                @if ($errors->has('logo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                @endif


                            </div>                     
                  <div id="my_file">{{$settingcontent->logo}}</div> 
          </div>
          
            <!-- /.box-body -->
          </div>
            <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Add Email</h3>
            </div>
                       <div class="form-group{{ $errors->has('admin_email') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                <input id="admin_email" type="text" class="form-control input-lg" name="admin_email" value="{{$settingcontent->adminemail}}" required autofocus>

                                @if ($errors->has('admin_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admin_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
          
            <!-- /.box-body -->
          </div>
          
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title">Add Social icons URL</h3>
            </div>
            <!-- /.box-header -->
            
                   <div class="form-group{{ $errors->has('facebook_url') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                <input id="facebook_url" type="text" class="form-control" name="facebook_url" value="{{$settingcontent->facebookurl}}" autofocus>

                                @if ($errors->has('facebook_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facebook_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                            <div class="form-group{{ $errors->has('twitter_url') ? ' has-error' : '' }}">
                              <div class="col-md-12">
                                <input id="twitter_url" type="text" class="form-control" name="twitter_url" value="{{$settingcontent->twitterurl}}" autofocus>

                                @if ($errors->has('twitter_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('twitter_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
              <div class="form-group{{ $errors->has('google_url') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                <input id="google_url" type="text" class="form-control" name="google_url" value="{{$settingcontent->googleurl}}" autofocus>

                                @if ($errors->has('google_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('google_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                            <div class="form-group{{ $errors->has('youtube_url') ? ' has-error' : '' }}">
                              <div class="col-md-12">
                                <input id="youtube_url" type="text" class="form-control" name="youtube_url" value="{{$settingcontent->youtubeurl}}" autofocus>

                                @if ($errors->has('youtube_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('youtube_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                   
          </div>
      

        
          <!-- /.box -->
         
         </div>
         <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title">Add Association Icons</h3>
            </div>
            <!-- /.box-header -->
            
              
            <!-- general form elements -->

 <div class="form-group{{ $errors->has('facebook_url') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                              <div class="btn-group btn-toggle"> 
                <button class="btn btn-lg btn-default">ON</button>
                <button class="btn btn-lg btn-primary active">OFF</button> <b> : OPENTABLE</b>
              </div>
                                @if ($errors->has('facebook_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facebook_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                            <div class="form-group{{ $errors->has('twitter_url') ? ' has-error' : '' }}">
                              <div class="col-md-12">
                            <div class="btn-group btn-toggle"> 
                <button class="btn btn-lg btn-default">ON</button>
                <button class="btn btn-lg btn-primary active">OFF</button>  <b> : AA REVIEW CERTIFICATE</b>
              </div>
                                @if ($errors->has('twitter_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('twitter_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
              <div class="form-group{{ $errors->has('google_url') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                              <div class="btn-group btn-toggle"> 
                <button class="btn btn-lg btn-default">ON</button>
                <button class="btn btn-lg btn-primary active">OFF</button>  <b> : TRIPADVISOR</b>
              </div>
                                @if ($errors->has('google_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('google_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                            <div class="form-group{{ $errors->has('youtube_url') ? ' has-error' : '' }}">
                              <div class="col-md-12">
                             <div class="btn-group btn-toggle"> 
                <button class="btn btn-lg btn-default">ON</button>
                <button class="btn btn-lg btn-primary active">OFF</button>
              </div>
                                @if ($errors->has('youtube_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('youtube_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                   
          </div>

        
          <!-- /.box -->
         
         </div>
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>
@endforeach   
@endsection
@section('pagescripts')
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
@endsection