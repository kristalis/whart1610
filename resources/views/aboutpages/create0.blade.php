@extends('adminpanel.cpanel')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 data-toggle="tooltip" data-placement="bottom" title="Here you can add your content for the About Page">
        <b>About Page Details</b>
        <small> @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
  </small>
      </h1>
      <ol class="breadcrumb">
    <a href="{{ url('abouts') }}"> <button type="submit" class="btn btn-primary">Preview Page</button> </a>
      <button type="submit" class="btn btn-primary"  form="frmAbout">Save Page</button> 
      <button type="submit" class="btn btn-primary">Save & Exit</button> 
    </ol>
    </section>
<!-- form start -->
             <!-- form start -->
              <form class="form-horizontal" method="POST" action="{{ route('abouts.store') }}" id="frmAbout" enctype="multipart/form-data">
                        {{ csrf_field() }}
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title text-bold">Here you can add your intro text for the website</h3>
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
              
                   
                          <div class="form-group{{ $errors->has('aboutus_txt') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                            <textarea class="form-control" rows="10" placeholder="Enter About US text ..." id="aboutus_txt" name="aboutus_txt"  autofocus>{{$pageheader->headertext}}</textarea>

            
                        @if ($errors->has('aboutus_txt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aboutus_txt') }}</strong>
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
        @endforeach
      @foreach($aboutcontents as $aboutcontent)  
                <!-- /.row -->
<div class="row">
      
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <div>
             <h3 class="box-title text-bold ">Here you can add your Chef(s) details</h3> -    
             Feel free to change it - try to keep the style</div><br>
        
            <!-- /.box-header -->
            <div class="col-md-5 text-center">
              
              <div class="form-group{{ $errors->has('chefimage') ? ' has-error' : '' }}">
        <input class='file' type="file" style="display: none" class="form-control" name="chefimage" id="chefimage" placeholder="Please choose your image"></div>
  <input id="my_image" type="hidden" name="my_image" class="form-control input-lg" value="{{$aboutcontent->chefimage}}" > 

              {{ HTML::image('images/'.$aboutcontent->chefimage, 'Chefs', array('height' => 300)) }}<br>
                <div id="my_file">{{$aboutcontent->chefimage}}</div>
<div id="select_file" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Upload Chefs' picture here">Click here to Upload Chef's Picture</div>
            </div>
            <div class="col-md-7">
                <div class="form-group{{ $errors->has('chefname') ? ' has-error' : '' }}">
                   
                      <label>Name of Chef(s)</label>
                      <input type="text" id="chefname" name="chefname" class="form-control" value="{{$aboutcontent->chefname}}" data-toggle="tooltip" data-placement="bottom" title="Enter Name of your Chefs here">
                      @if ($errors->has('chefname'))
                          <span class="help-block">
                              <strong>{{ $errors->first('chefname') }}</strong>
                          </span>
                      @endif
                  
                  </div>
                    <div class="form-group{{ $errors->has('chefdesc') ? ' has-error' : '' }}">
                  <label>History on Chef(s)</label>
                  <textarea class="form-control" rows="8"  id="chefdesc" name="chefdesc"  data-toggle="tooltip" data-placement="bottom" title="Enter Information about your Chefs' here">{{$aboutcontent->chefdesc}}</textarea>
                      @if ($errors->has('chefdesc'))
                          <span class="help-block">
                              <strong>{{ $errors->first('chefdesc') }}</strong>
                          </span>
                      @endif
    
                  </div>
                   <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-info">
                Add Chef Details
              </button>
                   

              </div>
                    
          </div>
          <!-- /.box -->
        </div>
      </div>
    </div>
    </form>
      <div class="row">

        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title text-bold">Here you can add your Chef(s) details for the website</h3><br>
             Feel free to change it - try to keep the style 
            </div>
            <!-- /.box-header -->
            
                          <div class="form-group{{ $errors->has('chefname') ? ' has-error' : '' }}">
                             <div class="col-md-12">
                          
                                <input type="text" id="chefname" name="chefname" class="form-control" value="{{$aboutcontent->chefname}}" data-toggle="tooltip" data-placement="bottom" title="Enter Name of your Chefs here">
                                @if ($errors->has('chefname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('chefname') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                          </div>
                              <div class="form-group{{ $errors->has('chefdesc') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                            <textarea class="form-control" rows="5"  id="chefdesc" name="chefdesc"  data-toggle="tooltip" data-placement="bottom" title="Enter Information about your Chefs' here">{{$aboutcontent->chefdesc}}</textarea>
                                @if ($errors->has('chefdesc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('chefdesc') }}</strong>
                                    </span>
                                @endif
                       
                      </div>
                      </div>
                        <div class="form-group{{ $errors->has('chefimage') ? ' has-error' : '' }}">
                               <div class="col-md-12">
                                 <div class="col-xs-4">                          
  <div id="select_file" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Upload Chefs' picture here">Click here to Upload</div>
        <input class='file' type="file" style="display: none" class="form-control" name="chefimage" id="chefimage" placeholder="Please choose your image">
  
  </div>    <div class="col-xs-8">

  <input id="my_image" type="hidden" name="my_image" class="form-control input-lg" value="{{$aboutcontent->chefimage}}" >
          
                                @if ($errors->has('chefimage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('chefimage') }}</strong>
                                    </span>
                                @endif


                            </div>                     
                  <div id="my_file">{{$aboutcontent->chefimage}}</div> 
          </div>
</div>

          </div>
          <!-- /.box -->
      </div></form>
 <div class="col-md-6 text-center">
  <div class="box box-success">
            <div class="box-header with-border">
             <h3 class="box-title">Chef's Picture</h3>
            </div>
            {{ HTML::image('images/'.$aboutcontent->chefimage, 'Chefs', array('height' => 300)) }}
</div>
 </div>
 
    </div>  @endforeach
      <!-- /.row -->
    <div class="row">
           <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title text-bold">Here you can add your gallery photos for the home page</h3>
               <br><br>
             
            {!! Form::open(array('url'=>'upload/2', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload')) !!}


              <div class="dz-message">

                </div>
                <div class="dropzone-previews" id="dropzonePreview"></div>

                <h4 style="text-align: center;color:#428bca;">Drop images in this area  <i class="fa fa-upload"></i></h4>

            {!! Form::close() !!}
        </div>
           <div class="row">

                  @if($aboutimages->count())

                @foreach($aboutimages as $aboutimage)

                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>

                    <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{$aboutimage->original_filename }}">

                        <img class="img-responsive" alt="" src="/images/{{ $aboutimage->original_filename }}" />

                        <div class='text-center'>

                            <small class='text-muted'>{{ $aboutimage->original_filename }}</small>

                        </div> <!-- text-center / end -->

                    </a>

                    <form action="{{@url('abouts').'/'.$aboutimage->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>

                   
                    </form>

                </div> <!-- col-6 / end -->

                @endforeach

            @endif
      
            </div>                         
                      
                   
          </div>
          <!-- /.box -->
      </div>
      </div>
    </section>
    <!-- /.content -->


 <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Info Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <div>
             <h3 class="box-title text-bold ">Here you can add your Chef(s) details</h3> -    
             Feel free to change it - try to keep the style</div><br>
        
            <!-- /.box-header -->
            <div class="col-md-5 text-center">
              
              <div class="form-group{{ $errors->has('chefimage') ? ' has-error' : '' }}">
        <input class='file' type="file" style="display: none" class="form-control" name="chefimage" id="chefimage" placeholder="Please choose your image"></div>
  <input id="my_image" type="hidden" name="my_image" class="form-control input-lg" value="{{$aboutcontent->chefimage}}" > 

              {{ HTML::image('images/'.$aboutcontent->chefimage, 'Chefs', array('height' => 300)) }}<br>
                <div id="my_file">{{$aboutcontent->chefimage}}</div>
<div id="select_file" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Upload Chefs' picture here">Click here to Upload Chef's Picture</div>
            </div>
            <div class="col-md-7">
                <div class="form-group{{ $errors->has('chefname') ? ' has-error' : '' }}">
                   
                      <label>Name of Chef(s)</label>
                      <input type="text" id="chefname" name="chefname" class="form-control" value="{{$aboutcontent->chefname}}" data-toggle="tooltip" data-placement="bottom" title="Enter Name of your Chefs here">
                      @if ($errors->has('chefname'))
                          <span class="help-block">
                              <strong>{{ $errors->first('chefname') }}</strong>
                          </span>
                      @endif
                  
                  </div>
                    <div class="form-group{{ $errors->has('chefdesc') ? ' has-error' : '' }}">
                  <label>History on Chef(s)</label>
                  <textarea class="form-control" rows="8"  id="chefdesc" name="chefdesc"  data-toggle="tooltip" data-placement="bottom" title="Enter Information about your Chefs' here">{{$aboutcontent->chefdesc}}</textarea>
                      @if ($errors->has('chefdesc'))
                          <span class="help-block">
                              <strong>{{ $errors->first('chefdesc') }}</strong>
                          </span>
                      @endif
    
                  </div>
                   <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-info">
                Add Chef Details
              </button>
                   

              </div>
                    
          </div>
          <!-- /.box -->
        </div>
      </div>
      </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    
  </div>

@endsection
@section('pagescripts')
    <!-- References: https://github.com/fancyapps/fancyBox -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<!-- Dropzone -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
  <script src="{{ asset('js/dropzoneconfig.js') }}"></script>

<script type="text/javascript">
    $('#select_file').click(function() {
    $('#chefimage').trigger('click');
    $('#chefimage').change(function() {
        var filename = $('#chefimage').val();
        if (filename.substring(3,11) == 'fakepath') {
            filename = filename.substring(12);
        } // Remove c:\fake at beginning from localhost chrome
       $('#my_file').html(filename);
          $('#my_image').val(filename);
   });
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

    $(document).ready(function(){

        $(".fancybox").fancybox({

            openEffect: "none",

            closeEffect: "none"

        });

    });
        </script>
        @endsection