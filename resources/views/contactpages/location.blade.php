@extends('adminpanel.cpanel')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Location Details
        <small>branches</small>
      </h1>
      <ol class="breadcrumb">
           <button href="" class="btn btn-primary">
                                    Preview Page
                                </button>
         <button type="submit" class="btn btn-primary" form="frmloc">
                                    Save New Location
                                </button>
                                   <button type="submit" class="btn btn-primary">
                                    Save & Exit
                                </button>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             <h3 class="box-title">Add Branch details</h3>
            </div>
            <!-- /.box-header -->
    @foreach ($locs as $contact)         
<!-- form start -->
    <form class="form-horizontal" method="POST" action="{{ route('contacts.store') }}" id="frmloc">
              {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('branchname') ? ' has-error' : '' }}">
                            <label for="branchname" class="col-md-4 control-label">Restaurant Name</label>

                            <div class="col-md-6">
                                <input id="branchname" type="text" class="form-control" name="branchname" value="{{ $contact->branchname }}" required autofocus>

                                @if ($errors->has('branchname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('branchname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Address</label>
                             <div class="col-md-6">
                            <textarea class="form-control" id="address" name="address" placeholder="{{ old('address') }}" rows="3">{{ $contact->address }}</textarea>
                        @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{ $contact->location }}" required autofocus>
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
                            <label for="postcode" class="col-md-4 control-label">Postcode</label>

                            <div class="col-md-6">
                                <input id="postcode" type="text" class="form-control" name="postcode" value="{{ old('postcode') }}" required autofocus>
                                @if ($errors->has('postcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <div class="form-group{{ $errors->has('loctype') ? ' has-error' : '' }}">
                            <label for="loctype" class="col-md-4 control-label">Main or Branch</label>

                            <div class="col-md-6">
                              <select class="form-control" name="loctype" id="loctype" style="width: 100%;">
                                  <option selected="selected">Select Status</option>
                                  <option>Main</option>
                                  <option>Branch</option>
                                </select>
                                @if ($errors->has('loctype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('loctype') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                  </form>    
          </div>
          <!-- /.box -->

         @endforeach
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Contact</h3>
            </div>
            <!-- /.box-header -->
     @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <table class="table table-bordered table-hover">
      <thead class="thead-default">
        <tr>
         
          <th>Name</th>
          <th>Location</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Branch</th>
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
            <p><a href="#" class="btn btn-primary">Update</a></p>
        <p><a href="{{@url('contacts').'/'.$location->id.'/edit'}}" class="btn btn-primary">Update</a></p>
      <form action="{{@url('contacts').'/'.$location->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger">Detete</button>
            </form>
          </td>
        </tr>
        {{-- {{$i++}} --}}
        @endforeach
      </tbody>
    </table>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  </div>
@endsection