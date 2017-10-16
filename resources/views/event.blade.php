@extends('layouts.appview')


@section('content')

@foreach ($pageheaders as $pageheader)
        <div class="hero-image about-hero" style="background-image: url(banners/{{$pageheader->banner}})">
        </div> 

        <div class="contact-content1">
            <div class="max-width">
                <div class= "hero-text-container contact-hero ch-1">
                      <h2> {{ $pageheader->bannertext }} </h2>
                    <h1> {{ $pageheader->bannertext1 }} </h1>
                    <p> </p>

                   
                    <a href="{{ url('contacts') }}" class="hero-button"> BOOK ONLINE </a>
                </div>

@endforeach

                <div class= "contact-hero ch-2">
    @foreach ($eventcontents as $eventcontent)
                    <div class="banner-arrow-top"></div>

                    <div class="chb-pre">
                        <div class="flex-hero-title-block">
                            <div class="contact-title-flex"> 
                                <h5><span> {{ $eventcontent->eventtitle }}</span></h5>
                            </div>
                        </div>
                    </div>

                    <div class="ch-2-block chb-1">
                        {{ HTML::image('images/'.$eventcontent->eventimage, 'Events') }}
                      
                    </div>

                    <div class="ch-2-block chb-2 accomodation-block-style-1">
                        <h6> {{ $eventcontent->eventsubtitle }} </h6></br> 
                        <p style="white-space: pre-wrap;"> {{ $eventcontent->eventtext }}  </p>
            
                    </div>
    @endforeach

                   


                
                    
                </div> 
            </div>
        </div>
      
       
       @endsection