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
 
                <div class= "contact-hero ch-2">
 @foreach ($roomcontents as $roomcontent)
                    <div class="banner-arrow-top"></div>

                    <div class="chb-pre">
                        <div class="flex-hero-title-block">
                            <div class="contact-title-flex"> 
                                <h5><span> {{ $roomcontent->roomtitle }}   </span></h5>
                            </div>
                        </div>
                    </div>
                
                    <div class="ch-2-block chb-1">
                        <img src="images/{{ $roomcontent->roomimage }} "/>
                    </div>

                    <div class="ch-2-block chb-2 accomodation-block-style-1">
                     <p style="white-space: pre-wrap;">  {{ $roomcontent->roomdesc }} </p>


                    <div class="enquire-container">
                    <div class="enquire-block eb-1">
                 <!--    {{ $roomcontent->roomprice }} -->
                    </div>
                    <div class="enquire-block eb-2">
                 <!--      <a href=" {{ $roomcontent->bookingurl }} "> Enquire </a>-->
                    </div>
                    </div> 
                    </div>

               @endforeach     

 
                </div>  

               


            </div>
        </div>
     

        @endsection