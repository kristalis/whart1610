@extends('adminpanel.cpanel')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gallery Page Details
        <small>    @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif
        </small>
      </h1>
      <ol class="breadcrumb">
    <a href="{{ url('galleries') }}"> <button class="btn btn-primary">Preview Page</button></a>
      <button type="submit" class="btn btn-primary" form="frmGal">Save Page</button> 
      <button type="submit" class="btn btn-primary">Save & Exit</button> 
    </ol>
    </section>
<!-- form start -->
             <!-- form start -->
            
    <!-- Main content -->
    <section class="content">
        <form class="form-horizontal" method="POST" action="{{ route('galleries.store') }}"  id="frmGal"  enctype="multipart/form-data">
                        {{ csrf_field() }}
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
                              <div class="col-md-12">
                                <input id="bannertext1" type="text" class="form-control" name="bannertext1" value="{{$pageheader->bannertext1}}" autofocus>

                                @if ($errors->has('bannertext1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bannertext1') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
              
                   
                          <div class="form-group{{ $errors->has('galleryheader_txt') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                            <textarea class="form-control" rows="10" placeholder="Enter text ..." id="galleryheader_txt" name="galleryheader_txt"  autofocus>{{$pageheader->headertext}}</textarea>

            
                        @if ($errors->has('galleryheader_txt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('galleryheader_txt') }}</strong>
                                    </span>
                                @endif
                       
                      </div>
                      </div>
                      
                @endforeach       
                   
          </div>
          </div>
             <!-- right column -->
       <div class="col-md-6">
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
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
    </div>
     
        </form>
      <!-- /.row -->
       <div class="row">
           <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title"><b>Gallery Photos</b></h3>
             

            {!! Form::open(array('url'=>'upload/6', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload')) !!}

           
              <div class="dz-message">

                </div>
                <div class="dropzone-previews" id="dropzonePreview"></div>

                <h4 style="text-align: center;color:#428bca;">Drop images in this area  <i class="fa fa-upload"></i>  <br>Clck Here to Upload Images</h4>



            {!! Form::close() !!}
        </div>

         <div class="row">

                <div class='col-md-10'>
              <form action="/searchtracker" method="POST" role="search">
              {{ csrf_field() }}
                <div class="input-group">
                  <input type="text" class="form-control" name="q"
                  placeholder="Search users"> 
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                    </button>
                  </span>
                </div>
              </form>
</div>
</div>   
<div class="row">
    <div class='col-md-10'>
   @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Sample User details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                 
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr>
                <td>{{$user->original_filename}}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
  </div>
</div>   
            <div class="row">

                  @if($gallerycontents->count())

                @foreach($gallerycontents as $gallerycontent)

                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>

                    <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{$gallerycontent->original_filename }}">

                        <img class="img-responsive" alt="" src="/images/{{ $gallerycontent->original_filename }}" />

                        <div class='text-center'>

                            <small class='text-muted'>{{ $gallerycontent->original_filename }}</small>

                        </div> <!-- text-center / end -->

                    </a>

                    <form action="{{@url('galleries').'/'.$gallerycontent->id}}" method="POST">
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
      
      </div>




    </section>
    <!-- /.content -->
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