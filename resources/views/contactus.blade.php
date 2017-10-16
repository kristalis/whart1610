@extends('layouts.appview')


@section('content') 
@foreach ($pageheaders as $pageheader)
        <div class="hero-image about-hero" style="background-image: url(banners/{{$pageheader->banner}})">
        </div> 

        <div class="contact-content1">
            <div class="max-width">
                <div class= "hero-text-container contact-hero ch-1 ">
                       <h2> {{ $pageheader->bannertext }} </h2>
                    <h1> {{ $pageheader->bannertext1 }} </h1>
                </div>
@endforeach
                <div class= "contact-hero ch-2">
                    <div class="banner-arrow-top"></div>

                    <div class="chb-pre">
                        <div class="flex-hero-title-block">
                            <div class="contact-title-flex"> 
                                <h5><span> Get in touch  </span></h5>
                            </div>
                        </div>
                    </div>
                
                    <div class="ch-2-block chb-1 ipad-contact-flex ip-cf-1">
@foreach ($contactinfos as $contactinfo)
                    <ul>
                            <li>{{ $contactinfo->branchname }}</li>
                            <li>{{ $contactinfo->address }}</li>
                            <li>{{ $contactinfo->location }}</li>                                       
                            <li> {{ $contactinfo->county }}, {{ $contactinfo->postcode }} </li>
                            <li> <b>Email:</b> {{ $contactinfo->email }} </li>
                            <li> <b>Telephone: </b> {{ $contactinfo->phone }} </li>
                    </ul>
@endforeach

                    <a class="hero-button"> BOOK A TABLE </a>

                    <ul class="ch-2-address-2"> 
                    <li> Other Locations... </li> 
                   @foreach ($branchinfos as $branchinfo)
                    </br> 
                       <li><b>{{ $branchinfo->branchname }}</b></li>
                        <li>{{ $branchinfo->address }}</li>
                        <li>{{ $branchinfo->location }}</li>                                       
                        <li> {{ $branchinfo->county }}, {{ $branchinfo->postcode }} </li>
                        <li> <b>Email:</b> {{ $branchinfo->email }} </li>
                        <li> <b>Telephone: </b> {{ $branchinfo->phone }} </li>
                    @endforeach
                    <ul> 

                    </div>

                    <div class="ch-2-block chb-2 ipad-contact-flex">
                    <div id="contact-form-One">
                                <form name="contact" class="form-style" method="post" onsubmit="return ValForm();">
                                    <div class="row-fluid">
                                        <div class="span12">
                                        Name 
                                            <div class="control-group">
                                                <div class="controls">
                                                    <input type="text" name="srName" id="name" class="span12" placeholder="Please enter" required>
                                                </div>
                                            </div>
                                            Email
                                            <div class="control-group">
                                                <div class="controls">
                                                    <input type="text" name="snTel" class="span12" id="tel" placeholder="Please enter">
                                                </div>
                                            </div>
                                            Telephone
                                            <div class="control-group">
                                                <div class="controls">
                                                    <input type="email" name="erEmail" id="email" class="span12" placeholder="Please enter" required>
                                                </div>
                                            </div>
                                            Message
                                            <div class="control-group">
                                                <div class="controls">
                                                    <textarea rows="6" name="mrMessage" id="msg" class="span12" placeholder="Please enter"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                                
                                       <div class="control-group">
                                            <div class="controls">
                                                <input type="submit" class="span6 btn" value="SEND" />
                                                <input type="hidden" name="fFormOne" value="1" />
                                            </div>
                                        </div>                                  
                                    </div>
                                </form>    
                            </div>   
                    </div>
                    </div>

                    
                </div> 
            </div>
        </div>


        <section class="contact-content2">
            <article class="container-fluid">
                <div class="map-cover">
                    <div class="map-absolute" onclick="style.pointerEvents='none'"></div>
                    @foreach ($contactinfos as $contactinfo)
                        <iframe src="{{$contactinfo->googlemap}}" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
                        @endforeach
                </div>
            </article>
        </section>
            

       @endsection