@extends('layouts.appview')


@section('content')
 
@foreach ($pageheaders as $pageheader)

        <div class="hero-image about-hero" style="background-image: url(banners/{{$pageheader->banner}})">        </div> 
          <div class="contact-content1">
           
            <div class="max-width">
                 
                <div class= "hero-text-container contact-hero ch-1">
                      <h2> {{ $pageheader->bannertext }} </h2>
                    <h1> {{ $pageheader->bannertext1 }} </h1>
                    <p> {{ $pageheader->headertext }} </p>

                    <div class="certificate-image-container">
                        <img alt="White Hart | AA Four Star certification | Welwyn" src="images/white-hart-AA-certificate.jpg">
                    </div>
                </div>
@endforeach

@endsection