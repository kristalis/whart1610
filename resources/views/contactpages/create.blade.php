@extends('adminpanel.cpanel')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contact Page Details
        <small>@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif</small>
      </h1>
      <ol class="breadcrumb">
  <a href="{{ url('contacts') }}">   <button type="submit" class="btn btn-primary">Preview Page</button> </a>
      <button type="submit" class="btn btn-primary" form="frmloc">Save Page</button> 
       
    </ol>
    </section>
<!-- form start -->
             <!-- form start -->
              <form class="form-horizontal" method="POST" action="{{ url('contacts/update/7') }}" id="frmloc"  enctype="multipart/form-data">
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
                              <div class="col-md-12">
                                <input id="bannertext1" type="text" class="form-control" name="bannertext1" value="{{$pageheader->bannertext1}}" autofocus>

                                @if ($errors->has('bannertext1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bannertext1') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
              
                   
                          <div class="form-group{{ $errors->has('contactus_txt') ? ' has-error' : '' }}">
                          <div class="col-md-12">
                            <textarea class="form-control" rows="10" placeholder="Enter text ..." id="contactus_txt" name="contactus_txt"  autofocus>{{$pageheader->headertext}}</textarea>

            
                        @if ($errors->has('contactus_txt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contactus_txt') }}</strong>
                                    </span>
                                @endif
                       
                      </div>
                      </div>
                      
                     
                   
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
@endforeach  
              
</form>
<form class="form-horizontal" method="POST" action="{{ route('contacts.store') }}" enctype="multipart/form-data">
{{ csrf_field() }}
 <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title text-bold">Here you can add your branch contact details</h3>
            </div>
            <!-- /.box-header -->
           
<!-- form start -->
              {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('branchname') ? ' has-error' : '' }}">
                            

                            <div class="col-md-12">
                                <input id="branchname" type="text" class="form-control" name="branchname" placeholder="White Hart" required>

                                @if ($errors->has('branchname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('branchname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                 
                        <div class="form-group{{ $errors->has('streetname') ? ' has-error' : '' }}">
                             

                            <div class="col-md-12">
                                <input id="streetname" type="text" class="form-control" name="streetname" placeholder="Street Name" required>
                                @if ($errors->has('streetname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('streetname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="town" type="text" class="form-control" name="town" placeholder="Town" required>
                                @if ($errors->has('town'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('town') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="county" type="text" class="form-control" name="county" placeholder="County" required>
                                @if ($errors->has('county'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('county') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
                           

                            <div class="col-md-12">
                                <input id="postcode" type="text" class="form-control" name="postcode" placeholder="Postcode" required>
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
             <h3 class="box-title text-bold"></h3> 
                    <button type="submit" class="btn btn-primary pull-right">Click to add Branch details</button> 
                      
            </div>
 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="email" type="text" class="form-control" name="email" placeholder="Email" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control" name="phone" placeholder="Telephone" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-12">
                                <input id="faxline" type="text" class="form-control" name="faxline" placeholder="Fax" >
                            </div>
                        </div>
                        
                          <div class="form-group{{ $errors->has('web_url') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="web_url" type="text" class="form-control" name="web_url" placeholder="Enter Website address" >
                                @if ($errors->has('web_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('web_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                              <div class="form-group{{ $errors->has('googlemap') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="googlemap" type="text" class="form-control" name="googlemap" placeholder="Embed Map URL" >
                                @if ($errors->has('googlemap'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('googlemap') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        
 </div>
 </div>
</div>

      </form>
 <div class="row">
  <div class="col-md-12">
   <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title"><b>Branch list</b></h3>
            </div>
<table class="table table-bordered table-hover">
      <thead class="thead-default">
        <tr>
         
          <th>Branch Name</th>
          <th>Location</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Status</th>
          <th></th>

        </tr>
      </thead>
      <tbody>
        
        @foreach ($locs as $location) 
        <tr>
          
          <td width="200px">{{$location->branchname}}</td>
          <td>{{ $location->location}}</td>
          <td>{{ $location->phone }} </td>
          <td>{{ $location->email }}</td>
          <td>{{ $location->loctype }}</td>
         <td>
        <!--p><a href="{{@url('contacts').'/'.$location->id.'/edit'}}" class="btn btn-primary">Update</a></p> -->
      <form action="{{@url('contacts').'/'.$location->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                 <button class="btn btn-danger pull-right"><i class="fa fa-trash-o"></i></button>
            </form>            
            <a href="{{@url('contacts').'/'.$location->id.'/edit'}}" class="btn btn-primary pull-right" ><i class="fa fa-edit"></i></a>
          </td>
        </tr>
        {{-- {{$i++}} --}}
        @endforeach
      </tbody>
    </table>
  </div>
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

        @endsection