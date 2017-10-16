@extends('layouts.appview')
@section('title')
@foreach ($contactinfos as $contactinfo)
{{$contactinfo->branchname}} in {{$contactinfo->location}} | One of the Best Restaurants near you
@endforeach
@endsection

@section('content')
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
         
    @foreach ($pageheaders as $pageheader)
            
        <div class="index-hero-image" style="background-image: url(banners/{{$pageheader->banner}})">
        </div> 
        <div class="hero-text-wrap">
            <div class= "hero-text-container">
                <div class="certificate-image-container rosette-container">
                    <img alt="White Hart | AA Four Star certification | Welwyn" src="images/white-hart-aa_rosette.png">
                </div>
                    <h2> {{ $pageheader->bannertext }} </h2>
                    <h1> {{ $pageheader->bannertext1 }} </h1>
                <div class="hero-desc-block">
                 <p style="white-space: pre;">  {{ $pageheader->headertext }} </p>
                  

                </div>
                    <a href="{{ url('contacts') }}" class="hero-button"> BOOK ONLINE </a>
            </div>
        </div>
@endforeach
@foreach ($homecontents as $homecontent)
        <section class="content1">
            <div class="max-width">
                <article class="container-fluid">
                    <section class="row-fluid">
                        <div class="contact-info-container">
                            <div class="contact-info-block cib-1">
                               
                                <div class="contact-i-text-container">
                                    <h4>Opening Times </h4>
                                    <hr> 
                                    <ul> 
                                    <li></li>
                                    @if($homecontent->openingtimes != 'null')
                                    @foreach (json_decode($homecontent->openingtimes) as $opening)
                                    <li>  {!! $opening !!}</li>
                                    <li><i class="fa fa-circle" aria-hidden="true"></i></li>
                                    @endforeach
                                    @endif
                                    </ul>
                                        <div class="index-home-button">
                                            <a href = "{{ url('menus') }}" class="hero-button"> VIEW MENUS </a>
                                        </div>
                                <div class="contact-icon-container">
                                    <img alt = "The White Hart | Pub & Restaurant | Old Welwyn" src="images/icon-opening-times.svg"/>
                                </div> 

                                </div> 
                            </div>

                            <div class="contact-info-block cib-1">
                                <div class="contact-i-text-container">
                                    <h4>Contact Us </h4>
                                    <hr> 
                                    <ul> 
                                @if($homecontent->homeaddress != 'null')
                                    @foreach (json_decode($homecontent->homeaddress) as $contactinfo)
                                    <li>  {{ $contactinfo}}</li>
                                    <li><i class="fa fa-circle" aria-hidden="true"></i></li>
                                    @endforeach
                                    @endif
                                    <li><b></b></li>
                                    </ul>

                                        <div class="index-home-button">
                                            <a href="{{ url('contacts') }}" class="hero-button"> Contact Us</a>
                                        </div>

                                <div class="contact-icon-container">
                                    <img alt = "The White Hart | Pub & Restaurant | Old Welwyn" src="images/icon-location.svg"/>
                                </div>

                                </div> 
                            </div>

                            <div class="contact-info-block cib-1">
                                <div class="contact-icon-container">
                                    <img alt= "The White Hart | Bistro Restaurant | Hertfordshire" src="images/icon-food.svg"/>
                                </div> 
                                <div class="contact-i-text-container">
                                    <h4>Specials </h4>
                                    <hr> 
                                    <ul> 
                                    @if($homecontent->specials != 'null')
                                    @foreach (json_decode($homecontent->specials) as $specialmenu)
                                    <li>  {{ $specialmenu }}</li>
                                    <li><i class="fa fa-circle" aria-hidden="true"></i></li>
                                    @endforeach
                                    @endif
                                    </ul>
                                        <div class="index-home-button">
                                            <a href="{{ url('menus') }}" class="hero-button"> Our Other Venues </a>
                                        </div>
                                </div> 
                            </div>
                        </div>
                    </div> 
                    </section>       
                </article><!-- /container-fluid -->
            </div>
        </section>

        <section class="content2">
            <div class="max-width">
                <article class="container-fluid content2-inner-container">
                    <section class="row-fluid">
                        <article class="span12">

                                                        <h4>BOOK A TABLE  </h4>
                        @if($homecontent->bookingtype == '1')

                     <div class="OTButton"><script type="text/javascript" src="https://www.opentable.co.uk/ism/link.aspx?rid=123036&restref=123036&bgimage=https://www.opentable.co.uk/img/frontDoor/ot_btn_red.png&hover=1"></script><noscript id="OT_noscript"><a href="http://www.opentable.co.uk/single.aspx?rid=123036&rtype=ism&restref=123036" >Reserve now on www.opentable.co.uk</a></noscript><a id="OTPoweredBy" class="OTPoweredBy" href="http://www.opentable.co.uk/single.aspx?rid=123036&rtype=ism&restref=123036" >Powered By OpenTable</a></div>
                   
                        @else

                         


                                <form name="contact" method="post">

                                    <div class="booking-container">

                                        <div class="booking-flex bf-date">

                                        DATE </br> 



                                        <div class="input-append date" id="dp3" data-date="26-09-2017" data-date-format="dd-mm-yyyy">

                                            <input class="span12 mobile-date-width" name="date" size="16" type="text" value="26-09-2017">

                                                <span class="add-on"><i class="icon-th"></i></span>

                                        </div>

                                        </div>

                                        

                                        <div class="booking-flex bf-time-counters">

                                        <div class="bf-time-counters-block bf-cb-pre">

                                            TIME </br>

                                        </div>

                                            <div class="bf-time-counters-block bf-cb-1">

                                                 <select name="hour" class="span12" value="">

                                                        <option value="08">08</option>

                                                        <option value="09">09</option>

                                                        <option value="10">10</option>

                                                        <option value="11">11</option>

                                                        <option value="12">12</option>

                                                        <option value="13">13</option>

                                                        <option value="14">14</option>

                                                        <option value="15">15</option>

                                                        <option value="16">16</option>

                                                        <option value="17">17</option>

                                                        <option value="18">18</option>       

                                                </select>

                                            </div>



                                            <div class="bf-time-counters-block bf-cb-2">

                                                <select name="mins" class="span12" value="">

                                                        <option value="00">00</option>

                                                        <option value="15">15</option>

                                                        <option value="30">30</option>

                                                        <option value="45">45</option> 

                                                </select>

                                            </div>

                                        </div>



                                        <div class="booking-flex bf-time-counters">

                                        <div class="bf-time-counters-block bf-cb-pre">

                                        PEOPLE </br>

                                        </div>

                                            <div class="bf-time-counters-block bf-cb-3">

                                                <div class="control-group full-width-control">

                                                    <div class="controls">

                                                        <input type="text" name="people" id="name" class="span12" required placeholder="2">

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <input type="hidden" name="nocaptchaTimestamp" id="nocaptcha-timestamp" value="1507279666">
        <input type="hidden" name="nocaptchaHoneypot" id="nocaptcha-honeypot">
        <div style="display:none;"><input type="text" name="nocaptchaName" id="nocaptcha-name"></div> 

                                        <div class="booking-flex b-contact">

                                            <div class="control-group">

                                                <div class="controls">

                                                    <input type="text" name="name" id="name" class="span12" required placeholder="Name">

                                                </div>

                                            </div>



                                        </div>

                                        <div class="booking-flex b-contact">

                                            <div class="control-group">

                                                <div class="controls">

                                                    <input type="text" name="tel" id="tel" class="span12" required placeholder="Telephone">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="booking-flex bf-go">

                                            <div class="control-group">

                                                <div class="controls">

                                                    <input type="submit" class="span12 btn" value="BOOK A TABLE" />

                                                    <input type="hidden" name="cFormSubmitted" value="1" />



                                                </div>

                                            </div>   

                                        </div>

                                    </div>

                                </form>


                       @endif

                        </article>
                    </section>
                </article><!-- /container-fluid -->
            </div>
        </section>

        <section class="content2-3-quarters">
        </section>     

        <section class="content3">
            <div class="max-width">
                <article class="container-fluid">
                    <div class="title-flex"> 
                        <h5><span> Restaurant Gallery </span></h5>
                    </div>
                    <section class="row-fluid home-gallery-container">
                    
                        @foreach ($homeimages as $homeimage)

                        <div class="home-gallery-block hgb-1">
                         <img alt="" src="images/{{ $homeimage->original_filename }}"> 
                        </div>
                        @endforeach
                    <a href ="{{ url('galleries') }}" class="hero-button"> VIEW GALLERY </a>
                      </section>  
                       
                     
                </article><!-- /container-fluid -->
            </div>
        </section>

        <section class="content4">
            <div class="max-width">
                <article class="container-fluid">
                    <section class="row-fluid">
                        <article class="span12 quote-container">
                            <h5> What Our Customers are Saying </h5> <br> 
                            <div class="quote-container">
                                <div class="quote-block qb-1">
                                    <img alt = "The White Hart | reviews | Welwyn" alt="The White Hart | Gastro Pub & Restaurant | Hertfordshire" src="images/quote-left.png" style="height:50px; width:50px; ">

                                </div>

                                <div class="quote-block qb-2">
                                {{ $homecontent->customerreview }}                             
                                <h6>{{ $homecontent->customername }} </h6>
                                
                                </div>
                                <div class="quote-block qb-3">
                                    <img alt = "The White Hart | reviews | Welwyn" src="images/quote-right.png" style="height:50px; width:50px; ">
                                </div>
                            </div>
                            <div class="footer-container">
                                <div class="footer-block fb-1 span4">
                                    <a href="https://www.opentable.co.uk/the-white-hart-welwyn" target="_blank">
                                        <img src="images/open-table-logo.png" alt="The White Hart | Restaurant Reviews | Welywyn North">
                                    </a>
                                </div>

                                <div class="footer-block fb-1 span4">
                                    <a href="accomodation.html">
                                        <img src="images/white-hart-aa-certificate-2.png" alt="The White Hart | Restaurant Reviews | Welywyn North"></a>
                                </div>
                                <div class="footer-block fb-1 span4">
                                    <a target="_blank" href="https://www.tripadvisor.co.uk/Hotel_Review-g2091417-d593797-Reviews-The_White_Hart_Hotel-Welwyn_Hertfordshire_England.html">
                                        <img src="images/trip-advisor-logo.png" alt="The White Hart | Restaurant Reviews | Welywyn North"></a>
                                </div>
                            </div>
                        </article>
                    </section>       
                </article><!-- /container-fluid -->
            </div>
        </section>
   @endforeach
        <section class="content5">
            <div class="max-width">
                <article class="container-fluid">
                    <div class="title-flex"> 
                        <h5><span> Events & Offers </span></h5>
                    </div>
                    <div class="events-preview-container">
                        @if ($eventcontents->count() > 0)
                        <div class="events-prev-block e-p-b-1" style="background-image: url(images/{{$eventcontents[0]->eventimage}})">
                            <div class="e-p-b-1-content">
                                 
                                <h6> {{$eventcontents[0]->eventsubtitle}} </h6>
                            
                                <p> {{ str_limit($eventcontents[0]->eventtext, $limit = 100, $end = '..... ') }}<a href="{{ url('events') }}">Read More</a></p>
                                
                             
                            </div>
                        </div>
                          @endif
                        <div class="events-preview-cont-column">
                            <div class="events-prev-block e-p-b-2">
                                <div class="events-img-text-container">
                                      @if ($eventcontents->count() > 1)
                                    <div class="events-img-text-block ei-block">
                                        <img alt = "The White Hart | Blogs & Events | Welwyn" src="images/{{$eventcontents[1]->eventimage}}"/>
                                    </div>
                                    <div class="events-img-text-block et-block">
                                    
                                           <h6> {{$eventcontents[1]->eventsubtitle}} </h6>
                                            <p> {{$eventcontents[1]->eventtext}}</p>
                                            
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="events-prev-block e-p-b-3">
                                <div class="events-img-text-container">
                                    @if ($eventcontents->count() > 2)
                                    <div class="events-img-text-block ei-block">
                                        <img alt = "The White Hart | Blogs & Events | Welwyn" src="images/{{$eventcontents[2]->eventimage}}"/>
                                    </div>
                                    <div class="events-img-text-block et-block">
                                        
                                      <h6> {{$eventcontents[2]->eventsubtitle}} </h6>
                                            <p> {{$eventcontents[2]->eventtext}}</p>
                                            
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
               
                    </div>
                </article><!-- /container-fluid -->
            </div>
        </section>
     
         
@endsection
