@extends('adminpanel.cpanel')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 data-toggle="tooltip" data-placement="bottom" title="Here you can add your content for the Home Page">
        Home Page Details
        <small>  @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
  </small>
      </h1>
      <ol class="breadcrumb">
     <a href="{{ url('homes') }}"> <button type="submit" class="btn btn-primary">Preview Page</button> </a>
      <button type="submit" class="btn btn-primary " form="frmHome" id="save_btn">Save Page</button> 
      <button type="submit" class="btn btn-primary">Save & Exit</button> 
    </ol>
    </section>
<!-- form start -->
             <!-- form start -->
              <form class="form-horizontal" method="POST" action="{{ route('homes.store') }}" id="frmHome" enctype="multipart/form-data">
                        {{ csrf_field() }}
    <!-- Main content -->
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
              
                   
                          <div class="form-group{{ $errors->has('home_txt') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                            <textarea class="form-control" rows="10" placeholder="Enter Home Page text ..." id="home_txt" name="home_txt"  >{{$pageheader->headertext}}</textarea>

            
                        @if ($errors->has('aboutus_txt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('home_txt') }}</strong>
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

                           
    <div id="select_banner" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Here you can upload your background banner">Click Here to Upload Header banner</div>
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
           <div class="col-md-12 text-center">
                <div class="form-group{{ $errors->has('footer_banner') ? ' has-error' : '' }}">
                               <div id="select_footerbanner" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Here you can upload your background banner">Click Here to Upload Footer banner</div> 

    <input class='file' type="file" style="display: none" class="form-control" name="footer_banner" id="footer_banner"> 
    <input id="my_footerbanner" type="hidden" name="my_footerbanner" class="form-control input-lg" value="{{$pageheader->footerbanner}}" >
                            </div>
                          </div>
          
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
        </div>
        @endforeach   
       <!-- /.row -->
       @foreach ($homecontents as $homecontent)
      <div class="row">
        <!-- left column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title text-bold">Add Opening Days & Times </h3><button fldnum="1" class="btn btn-success pull-right add_button" type="button"> <span class="glyphicon glyphicon-plus"></span> click to add</button><br>
          
            </div>
         <!-- /.box-header -->
     
            <div class="fld_wrap" id="fld1">
             
              
           @if($homecontent->openingtimes != 'null')
          @foreach (json_decode($homecontent->openingtimes) as $opening)  
                         
            <div class="input-group">
                  <input class="form-control" type="text" name="fld_val1[]" value="{{ $opening }}">
                  <span class="input-group-btn"><button fldnum="1" class="btn btn-danger remove_button" type="button"><span class="glyphicon glyphicon-minus"></span></button></span>
              </div>
             
            @endforeach
       @endif


       </div>   
       <button fldnum="4" class="btn btn-success add_tbutton" type="button">Add New Menu </button>
       <button fldnum="4" class="btn btn-info add_mbutton" type="button">  Add Menu List </button><br>
           <!-- /.box-header -->
           
          <div class="fld_wrap" id="fld4"></div>          
                          

    
     
            
          </div>
          <!-- /.box -->
         
         
        </div>
        <!--/.col (left) -->
         <!-- middle column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title text-bold">Add Contact Information </h3><button fldnum="2" class="btn btn-success pull-right  add_button" type="button"><span class="glyphicon glyphicon-plus"></span> click to add</button>
             
            </div>
            <!-- /.box-header -->

                <div class="fld_wrap" id="fld2">
  @if($homecontent->homeaddress != 'null')
                   @foreach (json_decode($homecontent->homeaddress) as $address)     
                                          
            <div class="input-group">
                  <input class="form-control" type="text" name="fld_val2[]" value="{{ $address }}">
                  <span class="input-group-btn"><button fldnum="2" class="btn btn-danger remove_button" type="button"><span class="glyphicon glyphicon-minus"></span></button></span>
              </div>
         
            @endforeach
            @endif
                 </div>  

            



      
                   
          </div>
          <!-- /.box -->
         
         
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-4">
                <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title text-bold">Add Specials</h3> <button fldnum="3" class="btn btn-success pull-right  add_button" type="button"><span class="glyphicon glyphicon-plus"></span> click to add</button>
            </div>
            <!-- /.box-header -->
                <div class="fld_wrap" id="fld3">
                   @if($homecontent->specials != 'null')
                   @foreach (json_decode($homecontent->specials) as $special) 
                    
                  <div class="input-group">
                        <input class="form-control" type="text" name="fld_val3[]" value="{{ $special }}">
                                  <span class="input-group-btn"><button fldnum="3" class="btn btn-danger remove_button" type="button"><span class="glyphicon glyphicon-minus"></span></button></span>
                  </div>
                   
                  @endforeach
                  @endif
                 </div>  
         
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
        <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title text-bold">How are you taking Bookings ?</h3>
            </div>
            <!-- /.box-header -->
            
                        <div class="form-group{{ $errors->has('opentablebooking') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                          @if($homecontent->bookingtype == 1)
                                          <input type="radio" name="optionsBookings" value="1" checked="true">
                                          @else
                                          <input type="radio" name="optionsBookings" value="1">
                                          @endif
                                        </span>
                                          <input type="text" class="form-control" name="opentable_booking" value="{{$homecontent->opentableid}}" placeholder="Add your OpendTable ID here">
                                  </div>
                                @if ($errors->has('opentablebooking'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('opentablebooking') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                             <div class="form-group{{ $errors->has('opentablebooking') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                        @if($homecontent->bookingtype == 0)
                                          <input type="radio" name="optionsBookings" value="0" checked="true">
                                          @else
                                          <input type="radio" name="optionsBookings" value="0">

                                          @endif
                                        </span>
                                          <input type="text" class="form-control"  placeholder="EMAIL: Add your Email address here" name="email_booking" value="{{$homecontent->emailid}}">
                                  </div>
                                @if ($errors->has('about_us'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('about_us') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                        
              </div>
            </div>
               
                
                      
                       
                   
          
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
     
  <div class="box box-primary">
            <div class="box-header with-border">
             <h1 class="box-title"><b>Nice Review</b></h1>
            </div>
            <!-- /.box-header -->
            
                      
                      
              
                          <label class="text-bold">What did they say?</label>
                          <div class="form-group{{ $errors->has('customer_review') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                            <textarea class="form-control" rows="7" placeholder="Enter brief header description ..." id="customer_review" name="customer_review" > {{ $homecontent->customerreview }}  </textarea>

            
                        @if ($errors->has('customer_review'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('customer_review') }}</strong>
                                    </span>
                                @endif
                       
                      </div>
                      </div>
                      <label class="text-bold">What is their name</label>
                        <div class="form-group{{ $errors->has('customer_name') ? ' has-error' : '' }}">
                                 <div class="col-md-12">
                                <input id="customer_name" type="text" class="form-control" name="customer_name" value="{{ $homecontent->customername }}"  required autofocus>

                                @if ($errors->has('customer_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('customer_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-md-12">
                        
                            </div>
                      
                       
                   
          </div>
          <!-- /.box -->
         
         
        </div>




  </div>
  </div>


     
       @endforeach</form>
    <div class="row">
           <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title text-bold">Here you can add your gallery photos for the home page <small>Maximum of 8 Images</small></h3>
               <br><br>
             
            {!! Form::open(array('url'=>'upload/1', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload')) !!}
           
              <div class="dz-message">

                </div>
                <div class="dropzone-previews" id="dropzonePreview" height="300px"></div>

                <h4 style="text-align: center;color:#428bca;">Drop images in this area  <i class="fa fa-upload"></i><br>
                    Click Here to Upload
                </h4>


            {!! Form::close() !!}
        </div>
                                 
          <!-- /.box -->
      </div>
      </div>
    </div>
    <div class="row">

                  @if($homeimages->count())

                @foreach($homeimages as $homeimage)

                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>

                    <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{$homeimage->original_filename }}">

                        <img class="img-responsive" alt="" src="/images/{{ $homeimage->original_filename }}" />

                        <div class='text-center'>

                            <small class='text-muted'>{{ $homeimage->original_filename }}</small>

                        </div> <!-- text-center / end -->

                    </a>

                    <form action="{{@url('homes').'/'.$homeimage->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>

                   
                    </form>

                </div> <!-- col-6 / end -->

                @endforeach

            @endif
      
            </div>
                    
        </section>
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

    $('#select_footerbanner').click(function() {
    $('#footer_banner').trigger('click');
    $('#footer_banner').change(function() {
        var filename = $('#footer_banner').val();
        if (filename.substring(3,11) == 'fakepath') {
            filename = filename.substring(12);
        } // Remove c:\fake at beginning from localhost chrome
       $('#my_footerbanner').html(filename);
          $('#my_footerbanner').val(filename);
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

 <script type="text/javascript">

        $(document).ready(function(){
           
    $('.add_button').click(function(){
      var kakoi=$(this).attr('fldnum');
    var insHTML = '<div class="input-group"><input class="form-control text-bold" type="text" name="fld_val'+kakoi+'[]"></textarea><span class="input-group-btn"><button class="btn btn-danger remove_button" type="button"><span class="glyphicon glyphicon-minus"></span></button></span></div>';
    $("#fld"+kakoi).append(insHTML);

    });

  

   
    $('.fld_wrap').on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parents(':eq(1)').remove();
    });
});


   
</script>

<script type="text/javascript">

        $(document).ready(function(){
       var i=0;  var j=1;  
    $('.add_tbutton').click(function(){
    i++; j=1
    var kakoi=$(this).attr('fldnum');
    
    var titleHTML ='<div class="input-group"><input class="form-control" type="text" name="fld_val'+kakoi+'[i-1][0]" placeholder="Enter menu title"><span class="input-group-btn"><button class="btn btn-danger remove_button" type="button"><span class="glyphicon glyphicon-minus"></span></button></span></div>';
    $("#fld"+kakoi).append(titleHTML);
  
  });

 $('.add_mbutton').click(function(){
 // alert(i-1 + '' + j)
    var kakoi=$(this).attr('fldnum');
    var insHTML = '<div class="input-group"><input class="form-control" type="text" name="fld_val'+kakoi+'[i-1][j]" placeholder="Enter menu: [e.g. Spicy Vegi Pizza]"><span class="input-group-btn"><button class="btn btn-danger remove_button" type="button"><span class="glyphicon glyphicon-minus"></span></button></span></div>';
    $("#fld"+kakoi).append(insHTML);
j++
    });

   

   
    $('.fld_wrap').on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parents(':eq(1)').remove();
    });
});

  
   
</script>



        @endsection