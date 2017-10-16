@extends('adminpanel.cpanel')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menu Page Details
         <small>
          @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
          @endif
        </small>
      </h1>
      <ol class="breadcrumb">
      <a href="{{ url('menus') }}"><button type="submit" class="btn btn-primary">Preview Page</button></a>
      <button type="submit" class="btn btn-primary" form="frmMenu">Save Page</button> 
      <button type="submit" class="btn btn-primary">Save & Exit</button> 
    </ol>
    </section>
<!-- form start -->
             <!-- form start -->
              <form class="form-horizontal" method="POST" action="{{ route('menus.store') }}" id="frmMenu" enctype="multipart/form-data">
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
              
                   
                          <div class="form-group{{ $errors->has('menuheader_txt') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                            <textarea class="form-control" rows="10" placeholder="Enter Accommodation Page text ..." id="menuheader_txt" name="menuheader_txt"  >{{$pageheader->headertext}}</textarea>

            
                        @if ($errors->has('menuheader_txt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('menuheader_txt') }}</strong>
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
        @endforeach   <!-- /.box -->
             <!-- /.row -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
               <h3 class="box-title text-bold">Here you can add your menus </h3>
               <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-info">
                Add Menu Details
              </button>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <!-- form start -->
         
              <div class="form-group{{ $errors->has('menu_title') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                <input id="menu_title" type="text" class="form-control" name="menu_title" placeholder="Enter menu type: [e.g. Breakfast Menu]">

                                @if ($errors->has('menu_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('menu_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                                   
                   <div class="form-group{{ $errors->has('menu_file') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                        
                    <div class="col-xs-4">                          
  
 <div id="select_file" class="btn btn-success">Upload menu file</div>
        <input class='file' type="file" style="display: none" class="form-control" name="menu_file" id="menu_file" placeholder="Please choose your file">
  
  </div>    <div class="col-xs-8">

          
                               @if ($errors->has('menu_file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('menu_file') }}</strong>
                                    </span>
                                @endif

                            </div>  

                  <div id="my_menufile"></div> 
          
                            </div>
                          </div>
                    
                   <div class="form-group{{ $errors->has('menu_image') ? ' has-error' : '' }}">
                          <div class="col-md-12">


                                  <div class="col-xs-4">                          
  
 <div id="select_image" class="btn btn-success">Upload menu image</div>
        <input class='file' type="file" style="display: none" class="form-control" name="menu_image" id="menu_image" placeholder="Please choose your file">
  
  </div>    
  <div class="col-xs-8">

           
                               @if ($errors->has('menu_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('menu_image') }}</strong>
                                    </span>
                                @endif

                            </div>  

                  <div id="my_menuimage"></div> 

                            </div>
                          </div>
                    
          </div>
          <!-- /.box -->
         
        </div>
        <!--/.col (left) -->
        <!-- right column -->
       
        <!--/.col (right) -->
      </div></form>

<form class="form-horizontal" method="POST" action="{{ route('abouts.store') }}" id="frmMod" enctype="multipart/form-data">
  {{ csrf_field() }}
 <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-bold">Here you can add your Menu(s) details</h4>
              </div>
              <div class="modal-body">

      
        <!-- left column -->

                
 
                    <label>Upload Menu File</label>
<div class="form-group{{ $errors->has('chefimages') ? ' has-error' : '' }}">
                  
      <input type="file" name="chefimages" id="chefimages" class="btn btn-primary" placeholder="Please choose your image">
    </div>
       
                        <label>Upload Menu background Image</label>
<div class="form-group{{ $errors->has('chefimages') ? ' has-error' : '' }}">
                  
      <input type="file" name="chefimages" id="chefimages" class="btn btn-primary" placeholder="Please choose your image">
    </div>
            
      
<div class="form-group{{ $errors->has('chefname') ? ' has-error' : '' }}">
                   
                      <label>Name of Chef(s)</label>
                      <input type="text" id="chefname" name="chefname" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Enter Name of your Chefs here">
                      @if ($errors->has('chefname'))
                          <span class="help-block">
                              <strong>{{ $errors->first('chefname') }}</strong>
                          </span>
                      @endif
                  
                  </div>
     
                       
        <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right"  form="frmMod"> Submit Menu Details</button>
  <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
        </div>
   
              <div class="modal-footer">
             
              </div>
       
            <!-- /.modal-content -->
           
          <!-- /.modal-dialog -->
        </div>
    
    </div>
        <!-- /.modal -->
    </div>
  </div>
</form>
      <!-- /.row -->
       <div class="row">
   <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title"><b>Menu list</b></h3>
            </div>
<table class="table table-bordered table-hover">
      <thead class="thead-default">
        <tr>
         
          <th>Menu Type</th>
          <th>Menu File Uploaded</th>
          <th>Picture</th>
          <th></th>

        </tr>
      </thead>
      <tbody>
        
        @foreach ($menucontents as $menu) 
        <tr>
          
          <td width="200px">{{$menu->menutitle}}</td>
          <td>{{ $menu->menufile}}</td>
          <td>{{ HTML::image('images/'.$menu->menuimage, 'FL Restaurant Lite', array('width' => '50', 'height' => '50')) }}</td>
          <td>
      <form action="{{@url('menus').'/'.$menu->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger">Delete</button>
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
    $('#menu_file').trigger('click');
    $('#menu_file').change(function() {
        var filename = $('#menu_file').val();
        if (filename.substring(3,11) == 'fakepath') {
            filename = filename.substring(12);
        } // Remove c:\fake at beginning from localhost chrome
       $('#my_menufile').html(filename);
         
   });
});
        </script>
        <script type="text/javascript">
    $('#select_image').click(function() {
    $('#menu_image').trigger('click');
    $('#menu_image').change(function() {
        var filename = $('#menu_image').val();
        if (filename.substring(3,11) == 'fakepath') {
            filename = filename.substring(12);
        } // Remove c:\fake at beginning from localhost chrome
       $('#my_menuimage').html(filename);
         
   });
});
        </script>

        @endsection