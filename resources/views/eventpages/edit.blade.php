@extends('adminpanel.cpanel')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Events Page Details
        <small>
          @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif
        </small>
      </h1>
      <ol class="breadcrumb">
    <a href="{{ url('events') }}"> <button type="submit" class="btn btn-primary">Preview Page</button> </a>
      <button type="submit" class="btn btn-primary" form="frmE">Save Page</button> 
   
    </ol>
    </section>
<!-- form start -->
        
    <!-- Main content -->
    <section class="content">
         <form class="form-horizontal" method="POST" action="{{ url('events/updateevent') .'/'. $eventinfo->id  }}"   enctype="multipart/form-data" id="frmE">
                        {{ csrf_field() }}
      <!-- /.row -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title text-bold">Add Event</h3>
            </div>

            <!-- /.box-header -->
            
                        <div class="form-group{{ $errors->has('event_title') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                <input id="event_title" type="text" class="form-control" name="event_title" placeholder="Enter event title.." value ="{{$eventinfo->eventtitle}}">
                            </div>
                          </div>
                          <div class="form-group{{ $errors->has('event_subtitle') ? ' has-error' : '' }}">
                             <div class="col-md-12">
                                <input id="event_subtitle" type="text" class="form-control" name="event_subtitle" placeholder="Enter subtitle" value ="{{$eventinfo->eventsubtitle}}">
                            </div>
                            </div>
              
                  
                        <div class="form-group{{ $errors->has('event_image') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                            <div class="col-xs-4">   
                                <div id="select_event" class="btn btn-success">Upload Event Image</div>
                                        <input class='file' type="file" style="display: none" class="form-control" name="event_image" id="event_image" >
                                  
                                 </div><div class="col-xs-8">
                                 <div id="my_events">{{$eventinfo->eventimage}}</div>
                                <input id="my_image" type="hidden" name="my_image" value="{{$eventinfo->eventimage}}" >

                              </div>
                            </div>
                          </div>
                            <div class="form-group{{ $errors->has('event_link') ? ' has-error' : '' }}">
                             <div class="col-md-12">
                                <input id="event_link" type="text" class="form-control" name="event_link" placeholder="Enter event external link [URL]" value ="{{$eventinfo->eventlink}}">

                           
                            </div>
                            </div>
                               <div class="form-group{{ $errors->has('event_file') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                            <div class="col-xs-4">   
                                  <div id="select_eventfile" class="btn btn-success">Upload Event File</div>
                                          <input class='file' type="file" style="display: none" class="form-control" name="event_file" id="event_file" >
                                <input id="my_file" type="hidden" name="my_file" value="{{$eventinfo->eventfile}}" >
                                   </div><div class="col-xs-8">
                                   <div id="my_eventfile">{{$eventinfo->eventfile}}</div>
                               
                              </div>
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
                         <div class="form-group{{ $errors->has('events_txt') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                            <textarea class="form-control" rows="8" placeholder="Enter brief header description ..." id="events_txt" name="events_txt">{{$eventinfo->eventtext}}"></textarea>
              
            
                        @if ($errors->has('events_txt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('events_txt') }}</strong>
                                    </span>
                                @endif
                       
                      </div>
                      </div>
                     
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div></form>
    
      <!-- /.row -->

     <div class="row">
      <!-- left column -->
        <div class="col-md-12">
   <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title"><b>Events list</b></h3>
            </div>
<table class="table table-bordered table-hover">
      <thead class="thead-default">
        <tr>
         
          <th>Event</th>
          <th>Brief</th>
          <th>Picture</th>
          <th></th>

        </tr>
      </thead>
      <tbody>
        
        @foreach ($eventcontents as $event) 
        <tr>
          
          <td width="25%">{{$event->eventtitle}}</td>
          <td>{{ str_limit($event->eventtext, $limit = 50, $end = '..... ') }}</td>
           <td>{{ HTML::image('images/'.$event->eventimage, 'Events', array('width' => '50', 'height' => '50')) }}</td>
          <td width="10%">
      <form action="{{@url('events').'/'.$event->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                 <button class="btn btn-danger pull-right"><i class="fa fa-trash-o"></i></button>
            </form>            
            <a href="{{@url('events').'/'.$event->id.'/edit'}}" class="btn btn-primary pull-right" ><i class="fa fa-edit"></i></a>

          </td>
        </tr>
        {{-- {{$i++}} --}}
        @endforeach
      </tbody>
    </table>
  </div>
</div></div>
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('pagescripts')

<script type="text/javascript">
    $('#select_banner').click(function() {
    $('#event_image').trigger('click');
    $('#event_image').change(function() {
        var filename = $('#event_image').val();
        if (filename.substring(3,11) == 'fakepath') {
            filename = filename.substring(12);
        } // Remove c:\fake at beginning from localhost chrome
       $('#my_banners').html(filename);
          $('#my_banner').val(filename);
   });
});

    $('#select_event').click(function() {
    $('#event_image').trigger('click');
    $('#event_image').change(function() {
        var filename = $('#event_image').val();
        if (filename.substring(3,11) == 'fakepath') {
            filename = filename.substring(12);
        } // Remove c:\fake at beginning from localhost chrome
       $('#my_events').html(filename);
          $('#my_event').val(filename);
   });
});

    $('#select_eventfile').click(function() {
    $('#event_file').trigger('click');
    $('#event_file').change(function() {
        var filename = $('#event_file').val();
        if (filename.substring(3,11) == 'fakepath') {
            filename = filename.substring(12);
        } // Remove c:\fake at beginning from localhost chrome
       $('#my_eventfile').html(filename);
          $('#my_eventfile').val(filename);
   });
});



        </script>
        @endsection