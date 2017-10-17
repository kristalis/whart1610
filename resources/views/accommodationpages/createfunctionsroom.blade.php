@extends('adminpanel.cpanel')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Function Rooms Page Details
         <small>
          @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif
        </small>
      </h1>
      <ol class="breadcrumb">
   <a href="{{ url('functionrooms') }}"> <button type="submit" class="btn btn-primary">Preview Page</button> </a>
      <button type="submit" class="btn btn-primary" form="frmF">Save Page</button> 

    </ol>
    </section>
<!-- form start -->
             <!-- form start -->
              <form class="form-horizontal" method="POST" action="{{ url('functionrooms/update/8') }}"  id="frmF" enctype="multipart/form-data">
                        {{ csrf_field() }}
    <!-- Main content -->
     <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title text-bold">Here you can add your intro text for the webpage</h3>
             <br>
             Feel free to change it - try to keep the style 
            </div>

            <!-- /.box-header -->
         @foreach($pageheaders as $pageheader)   
                        <div class="form-group{{ $errors->has('bannertext') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                <input id="bannertext" type="text" class="form-control" name="bannertext"  value="{{$pageheader->bannertext}}" autofocus>

                                @if ($errors->has('bannertext'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bannertext') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                            <div class="form-group{{ $errors->has('bannertext1') ? ' has-error' : '' }}">

                              <div class="col-md-12">
                                <input id="bannertext1" type="text" class="form-control" name="bannertext1" value="{{$pageheader->bannertext1}}" autofocus>

                                @if ($errors->has('bannertext1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bannertext1') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
              
                   
                          <div class="form-group{{ $errors->has('roomheader_txt') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                            <textarea class="form-control" rows="10" placeholder="Enter Accommodation Page text ..." id="roomsheader_txt" name="roomsheader_txt"  >{{$pageheader->headertext}}</textarea>

            
                        @if ($errors->has('roomheader_txt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('roomsheader_txt') }}</strong>
                                    </span>
                                @endif
                       
                      </div>
                      
                      </div>
            
                   
          </div>
          </div>
             <!-- right column -->
        <div class="col-md-6 ">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title text-bold">Here you can change the background banner</h3><br>
              Banner dimensions : yypx x zzpx <br>


                <div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
                          <div class="col-md-12 text-center">

                           
    <div id="select_banner" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Here you can upload your background banner">Click Here to Upload</div>
    <input class='file' type="file" style="display: none" class="form-control" name="banner" id="banner">
  
  

  <input id="my_banner" type="hidden" name="my_banner" class="form-control input-lg" value="{{$pageheader->banner}}" >
          
                                @if ($errors->has('banner'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('banner') }}</strong>
                                    </span>
                                @endif
                             <br>

                  <div id="my_banners">{{$pageheader->banner}}</div> 

  <div class="col-md-12 text-center">
          {{ HTML::image('banners/'.$pageheader->banner, 'FL Restaurant Lite', array('height' => 300)) }}
        </div>
                               
                            </div>
                          </div>
            </div>
            <!-- /.box-header -->
          
          
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
        </div>
        @endforeach    </form>
  
  <form class="form-horizontal" method="POST" action="{{ route('functionrooms.store') }}"  enctype="multipart/form-data">
       {{ csrf_field() }}

      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title text-bold">Here you can add your room details</h3>
             <br>
             Feel free to change it - try to keep the style 
            </div>

            <!-- /.box-header -->
            
                        <div class="form-group{{ $errors->has('room_title') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                <input id="room_title" type="text" class="form-control" name="room_title" placeholder="Enter [Function Room, etc ].." required>

                                @if ($errors->has('room_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                      
               <div class="form-group{{ $errors->has('room_price') ? ' has-error' : '' }}">
                             <div class="col-md-12">
                                <input id="room_price" type="text" class="form-control" name="room_price" placeholder="From £50 per night" required>

                                @if ($errors->has('room_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                        <div class="form-group{{ $errors->has('room_image') ? ' has-error' : '' }}">
                             <div class="col-md-12">
  <div class="col-xs-4">                          
  
 <div id="select_file" class="btn btn-success">Upload Function Room Image</div>
        <input class='file' type="file" style="display: none" class="form-control" name="room_image" id="room_image" placeholder="Please choose your image" required>
  
  </div>    <div class="col-xs-8">

  <input id="my_image" type="hidden" name="my_image" class="form-control input-lg"  >
          
                                @if ($errors->has('room_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_image') }}</strong>
                                    </span>
                                @endif

                            </div>  





                  <div id="my_file"></div> 
                               
                            </div>
                            </div>  
                                <div class="form-group{{ $errors->has('booking_url') ? ' has-error' : '' }}">
                             <div class="col-md-12">
                                <input id="booking_url" type="hidden" class="form-control" name="booking_url" placeholder="Enter booking URL- http://www." value="url" >

                                @if ($errors->has('booking_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('booking_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                       
                   
          </div>
          <!-- /.box -->
         
         
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
                <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
                         <div class="form-group{{ $errors->has('rooms_txt') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                            <textarea class="form-control" rows="7" placeholder="Enter brief description for the function room ..." id="rooms_txt" name="rooms_txt" required ></textarea>
              
            
                        @if ($errors->has('rooms_txt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rooms_txt') }}</strong>
                                    </span>
                                @endif
                       
                      </div>
                      </div>
                        <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right">Add Function Room</button> 
                      </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div></form>
<div class="row">
   <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title"><b>Function Roooms</b></h3>
            </div>
<table class="table table-bordered table-hover">
      <thead class="thead-default">
        <tr>
         
          <th>Function room</th>
          <th>Room Brief</th>
           <th>Picture</th>
          <th></th>

        </tr>
      </thead>
      <tbody>
        
        @foreach ($roomcontents as $room) 
        <tr>
          
          <td width="25%">{{$room->roomtitle}}</td>
          <td>{{ str_limit($room->roomdesc, $limit = 100, $end = '..... ') }}</td>
           <td>{{ HTML::image('images/'.$room->roomimage, 'FL Restaurant Lite', array('width' => '50', 'height' => '50')) }}</td>
          <td width="7%">
      <form action="{{@url('functionrooms').'/'.$room->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                 <button class="btn btn-danger pull-right"><i class="fa fa-trash-o"></i></button>
                 <a href="{{@url('rooms').'/'.$room->id.'/edit'}}" class="btn btn-primary pull-right"><i class="fa fa-edit"></i></a
            </form>
          </td>
        </tr>
        {{-- {{$i++}} --}}
        @endforeach
      </tbody>
    </table>
  </div>
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('pagescripts')

<script type="text/javascript">
    $('#select_banner').click(function() {
    $('#banner').trigger('click');
    $('#banner').change(function() {
        var filename = $('#banner').val();
        if (filename.substring(3,11) == 'fakepath') {
            filename = filename.substring(12);
        } // Remove c:\fake at beginning from localhost chrome
       $('#my_banners').html(filename);
          $('#my_banner').val(filename);
   });
});
        </script>
<script type="text/javascript">
    $('#select_file').click(function() {
    $('#room_image').trigger('click');
    $('#room_image').change(function() {
        var filename = $('#room_image').val();
        if (filename.substring(3,11) == 'fakepath') {
            filename = filename.substring(12);
        } // Remove c:\fake at beginning from localhost chrome
       $('#my_file').html(filename);
          $('#my_image').val(filename);
   });
});
        </script>
        @endsection