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
                    <a class="hero-button"> BOOK ONLINE </a>
                </div>

@endforeach
                <div class= "contact-hero ch-2">
                    <div class="banner-arrow-top"></div>

                    <div class="chb-pre">
                        <div class="flex-hero-title-block">
                            <div class="contact-title-flex"> 
                                 @foreach ($contactinfos as $contactinfo)
                                <h5><span> {{ $contactinfo->branchname }} Menu </span></h5>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="menu-pdf-container">
                    @foreach ($menucontents as $menucontent)
                        @if($menucontent->menutext == 'null')
                        <div class="menu-pdf-block mpd-1" style="background-image: url(images/{{$menucontent->menuimage}})">
                            <div class="menu-pdf-inner-block  text-center">
                                <h4> {{$menucontent->menutitle}}</h4>
                               
                                <a href="files/{{$menucontent->menufile}}" download="{{$menucontent->menutitle}}"> Download PDF</a>
                               
                            </div>
                        </div>
                        @else
                          <div class="menu-pdf-block mpd-1" style="background-color:white;">
                            <div class="menu-pdf-inner-block text-center">
                                <h4> {{$menucontent->menutitle}}</h4>
                               @foreach (json_decode($menucontent->menutext) as $menu)
                                    <li><i class="fa fa-circle" aria-hidden="true"></i></li>
                                    <li>  {!! $menu !!}</li>
                               @endforeach
                               
                            </div>
                        </div>
                        @endif
                    @endforeach
                      
                                  
                       
                    </div>
                
                
                    </div>
                </div> 
            </div>
        </div>

        

       @endsection