@extends('layouts.appview')


@section('content')
@foreach ($pageheaders as $pageheader)
        <div class="hero-image " style="background-image: url(banners/{{$pageheader->banner}})">>
        </div> 
        @endforeach

        <div class="contact-content1">
            <div class="max-width">
                <div id="gallery">
                        @foreach ($gallerycontents as $gallerycontent)
                        <img alt="" src="images/{{$gallerycontent->original_filename}}" data-image="images/{{$gallerycontent->original_filename}}" data-description=""> 
                        @endforeach
  
                </div>
            </div> 
        </div>
      
           
@endsection
   @section('pagescripts')
        <script src="{{ asset('js/ug-theme-tiles.js') }}"></script>
        <script>
            $('#gallery').unitegallery();
        </script>
       
        @endsection
       