@extends('adminpanel.cpanel')

@section('content')
@foreach($settingcontents as $settingcontent)
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 data-toggle="tooltip" data-placement="bottom" title="Here you can add content for your Settings Page">
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
              <h3 class="box-title text-bold">Add Logo</h3><br><br>
            
                        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
      <div class="col-xs-4">                          
  <div id="select_file" class="btn btn-success btn-lg" data-toggle="tooltip" data-placement="bottom" title="Click here to Upload your logo here" OnClick="display(this,logo,my_file,my_logo);">Select a file</div>
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
          <div class="col-md-12 text-center">
          {{ HTML::image('banners/'.$settingcontent->logo, 'FL Restaurant Lite Logo', array('height' => 150)) }}
        </div>
          </div>
        
              
                   
            <!-- /.box-body -->
          </div>
         

        
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>
@endforeach 
        <div class="col-md-6">
             <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title text-bold">Update Login Details</h3>   
                              
                                  <label class="pull-right">
                                    <input type="checkbox"> Check to update login details
                                  </label>
               
 
            </div>
              <div class="form-group{{ $errors->has('login-name') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                <input id="login_name" type="text" class="form-control" name="login_name" value=" {{ Auth::user()->name }}  " required autofocus>

                                @if ($errors->has('login-name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login-name') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                            <div class="form-group{{ $errors->has('login_email') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                <input id="login_email" type="email" class="form-control" name="login_email" value=" {{ Auth::user()->email }}  " required autofocus>

                                @if ($errors->has('login_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>

                            


                            <div class="form-group{{ $errors->has('login_pwd') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                <input type="password" class="form-control " disabled autofocus>

                                @if ($errors->has('login_pwd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login_pwd') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>    <div class="form-group{{ $errors->has('login_pwd') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                <input id="login_pwd" type="password" class="form-control" name="login_pwd" placeholder="New Password" required autofocus>

                                @if ($errors->has('login_pwd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login_pwd') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>    <div class="form-group{{ $errors->has('login_pwd') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                <input id="login_pwd" type="password" class="form-control" name="login_pwd" placeholder="Confirm Password" required autofocus>

                                @if ($errors->has('login_pwd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login_pwd') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
          </div>
        </div>
      </div>
 @foreach($contactinfos as $contactinfo)
 <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title text-bold">Here you can add your address</h3>
            </div>
            <!-- /.box-header -->
           
<!-- form start -->
              {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('branchname') ? ' has-error' : '' }}">
                            

                            <div class="col-md-12">
                                <input id="branchname" type="text" class="form-control" name="branchname" placeholder="Add Name of Restaurant/Pub" value="{{$contactinfo->branchname}}">

                                @if ($errors->has('branchname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('branchname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                 
                        <div class="form-group{{ $errors->has('streetname') ? ' has-error' : '' }}">
                             

                            <div class="col-md-12">
                                <input id="streetname" type="text" class="form-control" name="streetname" placeholder="Street Name" value="{{$contactinfo->address}}">
                                @if ($errors->has('streetname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('streetname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="town" type="text" class="form-control" name="town" placeholder="Town" value="{{$contactinfo->location}}">
                                @if ($errors->has('town'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('town') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="county" type="text" class="form-control" name="county" placeholder="County" value="{{$contactinfo->county}}">
                                @if ($errors->has('county'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('county') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
                           

                            <div class="col-md-12">
                                <input id="postcode" type="text" class="form-control" name="postcode" placeholder="Postcode" value="{{$contactinfo->postcode}}">
                                @if ($errors->has('postcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
               
          </div>
          <!-- /.box -->
</div>
 <div class="col-md-6">
  <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title text-bold">Add Contact details</h3>
            </div>
 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="email" type="text" class="form-control" name="email" placeholder="Email" value="{{$contactinfo->email}}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control" name="phone" placeholder="Telephone" value="{{$contactinfo->phone}}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-12">
                                <input id="fax" type="text" class="form-control" name="fax" placeholder="Fax" value="{{$contactinfo->fax}}">
                            </div>
                        </div>
                          <div class="form-group{{ $errors->has('web_url') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="web_url" type="text" class="form-control" name="web_url" placeholder="Enter Website address" value="{{$contactinfo->weburl}}">
                                @if ($errors->has('web_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('web_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> <div class="form-group{{ $errors->has('googlemap') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="googlemap" type="text" class="form-control" name="googlemap" placeholder="Embed Map URL" value="{{$contactinfo->googlemap}}" >
                                @if ($errors->has('googlemap'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('googlemap') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                   <input id="contactid" type="hidden" name="contactid" value="{{$contactinfo->id}}" >

 </div>
 </div>
   @endforeach
        </div> 
     @foreach($settingcontents as $settingcontent) 
      <div class="row">
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title text-bold">Add Social Media Links</h3>
            </div>
            <!-- /.box-header -->
            
                   <div class="form-group{{ $errors->has('facebook_url') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                        <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                <input id="facebook_url" type="text" class="form-control" name="facebook_url" value="{{$settingcontent->facebookurl}}"  placeholder="Add your Facebook profile here"   data-toggle="tooltip" data-placement="bottom" title="Add your Facbook profile here"  autofocus>

                                @if ($errors->has('facebook_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facebook_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                          </div>
                            <div class="form-group{{ $errors->has('twitter_url') ? ' has-error' : '' }}">
                              <div class="col-md-12">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                <input id="twitter_url" type="text" class="form-control" name="twitter_url" value="{{$settingcontent->twitterurl}}"  placeholder="Add your Twitter profile here"  data-toggle="tooltip" data-placement="bottom" title="Add your Twitter profile here" autofocus>

                                @if ($errors->has('twitter_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('twitter_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                          </div>
              <div class="form-group{{ $errors->has('google_url') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                    <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-google"></i></span>
                                <input id="google_url" type="text" class="form-control" name="google_url" value="{{$settingcontent->googleurl}}"  placeholder="Add your Google profile here"    data-toggle="tooltip" data-placement="bottom" title="Add your Google profile here" autofocus>

                                @if ($errors->has('google_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('google_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                          </div>
                            <div class="form-group{{ $errors->has('youtube_url') ? ' has-error' : '' }}">
                              <div class="col-md-12">
                                  <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                                <input id="youtube_url" type="text" class="form-control" name="youtube_url" value="{{$settingcontent->youtubeurl}}" placeholder="Add your Youtube profile here"   data-toggle="tooltip" data-placement="bottom" title="Add your Youtube profile here" autofocus>

                                @if ($errors->has('youtube_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('youtube_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                   </div>
          </div>
      

        
          <!-- /.box -->
         
         </div>
      </div>
    
    <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title text-bold">Add footer banner</h3>
            </div>

                        <div class="form-group{{ $errors->has('footer') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
      <div class="col-xs-4">                          
  <div id="select_footer" class="btn btn-success btn-lg" data-toggle="tooltip" data-placement="bottom" title="Click here to Upload your logo here" OnClick="display(this,footer,my_footerfile,my_footer);">Select a file</div>
        <input class='file' type="file" style="display: none" class="form-control" name="footer" id="footer" placeholder="Please choose your image">
  
  </div>    <div class="col-xs-8">

  <input id="my_footer" type="hidden" name="my_footer" class="form-control input-lg" value="{{$settingcontent->footerbanner}}" >
          
                                @if ($errors->has('footer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('footer') }}</strong>
                                    </span>
                                @endif


                            </div>                     
                  <div id="my_footerfile">{{$settingcontent->footerbanner}}</div> 

          </div>
          <div class="col-md-12 text-center">
          {{ HTML::image('banners/'.$settingcontent->footerbanner, 'FL Restaurant Lite Footer', array('height' => 150)) }}
        </div>
          </div>
          </div>
        </div>
</div>
@endforeach
</form>
</div>
@endsection
@section('pagescripts')


  <script type="text/javascript">
    function display(div,inputfile,divfilename,hiddeninput ) {
        var id = $(div).attr('id');
        alert(id);
        $(inputfile).trigger('click');
        $(inputfile).change(function() {
        var filename = $(inputfile).val();
        if (filename.substring(3,11) == 'fakepath') {
            filename = filename.substring(12);
        } // Remove c:\fake at beginning from localhost chrome
       $(divfilename).html(filename);
          $(hiddeninput).val(filename);
   });
    }
</script>
@endsection