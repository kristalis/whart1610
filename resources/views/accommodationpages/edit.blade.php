@extends('adminpanel.cpanel')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Accommodation/Function Room Update
        <small>
          @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif
        </small>
      </h1>
      <ol class="breadcrumb">
           <a href="{{ url('rooms') }}"> <button type="submit" class="btn btn-primary">Preview Page</button> </a>
            @if($roominfo->roomtype != 1)
              <button type="submit" class="btn btn-primary pull-right" form="frmE">Update Accommodation</button> 
            @else
              <button type="submit" class="btn btn-primary pull-right" form="frmE">Update Function Room</button> 
            @endif
              
      
    </ol>
    </section>
 
    <!-- Main content -->
    <section class="content">
      
  
 
  <form class="form-horizontal" method="POST" action="{{ url('rooms/updateroom') .'/'. $roominfo->id  }}"  enctype="multipart/form-data"    id="frmE" >

      {{ csrf_field() }}

      <!-- /.row -->
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

                                <input id="room_title" type="text" class="form-control" name="room_title" placeholder="Enter [Main Room, etc ].."  value="{{$roominfo->roomtitle}}">

                                @if ($errors->has('room_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                      
               <div class="form-group{{ $errors->has('room_price') ? ' has-error' : '' }}">
                             <div class="col-md-12">
                                <input id="room_price" type="text" class="form-control" name="room_price" placeholder="From £50 per night" value="{{$roominfo->roomprice}}">

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
  
 <div id="select_file" class="btn btn-success">Upload Room Image</div>
        <input class='file' type="file" style="display: none" class="form-control" name="room_image" id="room_image" placeholder="Please choose your image" >
  
  </div>    <div class="col-xs-8">

  <input id="my_image" type="hidden" name="my_image" class="form-control input-lg" value="{{$roominfo->roomimage}}" >
   <input id="room_type" type="hidden" name="room_type" value="{{$roominfo->roomtype}}" >
          
                              

                            </div>  

                  <div id="my_file">{{$roominfo->roomimage}}</div> 
                               
                            </div>
                            </div>  
                                <div class="form-group{{ $errors->has('booking_url') ? ' has-error' : '' }}">
                             <div class="col-md-12">
                                <input id="booking_url" type="text" class="form-control" name="booking_url" placeholder="Enter booking URL- http://www." value="{{$roominfo->bookingurl}}">

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
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title text-bold"></h3>
            
             
            </div>
            <!-- /.box-header -->
            
                        <div class="form-group{{ $errors->has('room_title') ? ' has-error' : '' }}">
                                 <div class="col-md-12">

                              
                         
                            <textarea class="form-control" rows="8" placeholder="Enter brief description for the room ..." id="rooms_txt" name="rooms_txt" >{{$roominfo->roomdesc}}</textarea>
              

                               
                            </div>
                          </div>
                      
             
                     
                          

                         
          </div>
          <!-- /.box -->
          
         
        </div>
      </div>

    </form>
 
      
<div class="row">
   <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title"><b>Accommodation/Function Rooms</b></h3>
            </div>
<table class="table table-bordered table-hover">
      <thead class="thead-default">
        <tr>
         
          <th>Accommodation</th>
          <th>Room Brief</th>
          <th>Picture</th>
          <th>Room Type</th>
          <th></th>

        </tr>
      </thead>
      <tbody>
        
        @foreach ($roomcontents as $room) 
        <tr>
          
          <td width="25%">{{$room->roomtitle}}</td>
          <td>{{ str_limit($room->roomdesc, $limit = 100, $end = '..... ') }}</td>
           <td>{{ HTML::image('images/'.$room->roomimage, 'FL Restaurant Lite', array('width' => '50', 'height' => '50')) }}</td>
           <td> @if($room->roomtype != 1)
                   Accommodation
                @else
                Function Room
            @endif</td>
          <td width="7%">            

      <form action="{{@url('rooms').'/'.$room->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger pull-right"><i class="fa fa-trash-o"></i></button>
            </form>
            <a href="{{@url('rooms').'/'.$room->id.'/edit'}}" class="btn btn-primary pull-right" data-toggle="modal"><i class="fa fa-edit"></i></a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@if(!empty($roominfo))
<script>
$(function() {
    $('#edit_modal').modal('show');
});
</script>
@endif

<script>
  $(document).ready(function(){
 $( '#rmalert').fadeOut(1000 );
});
</script>

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