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
 
           
    <!-- Main content -->
    <section class="content">
        

<form class="form-horizontal" method="POST" action="{{ url('contacts/updatecontact') .'/'. $contactinfo->id  }}"  enctype="multipart/form-data"  id="frmloc"   >
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
                                <input id="branchname" type="text" class="form-control" name="branchname" placeholder="White Hart" value="{{$contactinfo->branchname}}">

                            </div>
                        </div>
                 
                        <div class="form-group{{ $errors->has('streetname') ? ' has-error' : '' }}">
                             

                            <div class="col-md-12">
                                <input id="streetname" type="text" class="form-control" name="streetname" placeholder="Street Name" value="{{$contactinfo->address}}">
                             
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="town" type="text" class="form-control" name="town" placeholder="Town" value="{{$contactinfo->location}}">
                           
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="county" type="text" class="form-control" name="county" placeholder="County" value="{{$contactinfo->county}}">
                             
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
                           

                            <div class="col-md-12">
                                <input id="postcode" type="text" class="form-control" name="postcode" placeholder="Postcode" value="{{$contactinfo->postcode}}">
                             
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
                   
                      
            </div>
 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="email" type="text" class="form-control" name="email" placeholder="Email" value="{{$contactinfo->email}}">
                              
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control" name="phone" placeholder="Telephone" value="{{$contactinfo->phone}}">

                    
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-12">
                                <input id="faxline" type="text" class="form-control" name="faxline" placeholder="Fax" value="{{$contactinfo->fax}}">
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
                          </div>
                              <div class="form-group{{ $errors->has('googlemap') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="googlemap" type="text" class="form-control" name="googlemap" placeholder="Embed Map URL" value="{{$contactinfo->googlemap}}">
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