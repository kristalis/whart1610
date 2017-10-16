@extends('layouts.appview')

@section('content')
      
    @foreach ($pageheaders as $pageheader)

        <div class="hero-image about-hero" style="background-image: url(banners/{{$pageheader->banner}})">
        </div> 

        <div class="about-content1">

                <div class= "hero-text-container contact-hero ch-1 about-margin-bottom">
                    <h2> {{ $pageheader->bannertext }} </h2>
                    <h1> {{ $pageheader->bannertext1 }} </h1>
                    <a href ="{{ url('contacts') }}" class="hero-button"> BOOK ONLINE </a>
                </div>
</div>

            <div class="max-width">

            <div class= "hero-text-container about-htc a-htc-1"> 
                <div class="banner-arrow-top"></div>

                <div class="chb-pre">
                    <div class="flex-hero-title-block">
                        <div class="contact-title-flex"> 
                            <h5><span> About Us  </span></h5>
                        </div>
                    </div>
                </div>
                <p style="white-space: pre-wrap;"> 
               {{ $pageheader->headertext }}  
                </p>
            </div> 
    @endforeach
    @foreach ($aboutcontents as $aboutcontent)
            <div class="about-htc a-htc-2">
            <article class="container-fluid content2-inner-container about-content2-ic">
                    <section class="row-fluid">
                        <article class="span12">
                                <h4>CHECK BOOKING AVAILABILITY</h4>
                                    <div class="booking-container">
                             <center>
                            @foreach ($homecontents as $homecontent)         
                            @if($homecontent->bookingtype == '1')
                        
                            <script type='text/javascript' src='//www.opentable.co.uk/widget/reservation/loader?rid=52369&domain=couk&type=standard&theme=wide&lang=en&overlay=true&iframe=false'></script>
                     
                        @else
                            {{ $homecontent->emailid }}
                       @endif
                       @endforeach
                          </center>
                                    </div>
                        </article>
                    </section>
                </article><!-- /container-fluid -->
            </div>
            </div>
           


        <section class="about2">
            <div class="max-width">
                <article class="container-fluid">

                <div class="title-flex"> 
                        <h5><span> Our Owners </span></h5>
                    </div>

                <div class="about-chef-container">
                <div class="about-chef-block acb-1">
                <img alt ="The White Hart | Our Chef | Welwyn" src="images/{{$aboutcontent->chefimage}}"/>
                </div>
                <div class="about-chef-block acb-2">
                <h6>  {{ $aboutcontent->chefname }} </h6>
                <hr class="about-hr2"> 
                <p>  {{ $aboutcontent->chefdesc }}   </p>
                </div>
                </div>
                    

                </article>
            </div>
        </section>

        <section class="about3">
            <div class="max-width">
                <article class="container-fluid">
                    <div id="gallery2">
                        @foreach($aboutimages as $aboutimage)
                         <img alt="" src="images/{{ $aboutimage->original_filename }}" data-image="images/{{ $aboutimage->original_filename}}" data-description=""> 
                        @endforeach


                </div>
                </article>
            </div>
        </section>
 
          
@endforeach

 
        @endsection
        @section('pagescripts')

         <script src="{{ asset('js/ug-theme-compact.js') }}"></script>
            <script>
            $('#gallery2').unitegallery({
                gallery_theme: "compact"
            });
        </script>
        @endsection
       