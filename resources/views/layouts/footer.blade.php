


 
<footer>
 @foreach (json_decode($pageheader->setting()->get()) as $setting)
            <div class="pre-div-links-main-container">
                    <div class="pre-div-flex-container">
                        <div class="pre-div-flex-block pdfb1">
                            <h6>Join the Conversation</h6>
                            
                                  <a href="https://{{$setting->facebookurl}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                  <a href="https://{{$setting->twitterurl}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                  <a href="https://{{$setting->googleurl}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a>

                        </div>
                        <div class="pre-div-flex-block pdfb2">
                            <form name="newsletter" method="post">
                                <div class="row-fluid newsletter">
                                        <h6>Join our Mailing List</h6>
                                    <input type="email" name="erEmail" id="email" value="" placeholder="Enter your Email Address" required>

                                    <input type="submit" class="btn" value=">" />
                                    <input type="hidden" name="fFormThree" value="1" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
          
                <div class="footer-bottom" style="background-image: url(banners/{{$setting->footerbanner }})">
                <div class="overlay-layer"> 
                    <div class="container-fluid">
                        <section class="row-fluid">
                                <div class="fb-bottom-container">
                                    <div class="fb-bottom-block fb-bb-1">
                                        <ul> 
                                            <li><h4> QUICK LINKS </h4></li>
                                        <li><a href="{{ url('homes') }}">Home</a></li>
                                        <li><a href="{{ url('abouts') }}">About</a></li>
                                        <li><a href="{{ url('rooms') }}">Accommodation</a></li>
                                        <li><a href="{{ url('menus') }}">Menu</a></li>
                                        <li><a href="{{ url('events') }}">Events</a></li>
                                        <li><a href="{{ url('galleries') }}">Gallery</a></li>
                                       
                                        </ul>
                                    </div> 
                                @foreach ($contactinfos as $contactinfo)
                                    <div class="fb-bottom-block fb-bb-2">
                                        <ul> 
                                            <li><h4> FIND US </h4></li>
                                            <li>{{ $contactinfo->branchname }}</li>
                                            <li>{{ $contactinfo->address }}</li>
                                            <li>{{ $contactinfo->location }}</li>
                                            <li>{{ $contactinfo->postcode }}</li>
                                        </ul>
                                    </div>
                                    <div class="fb-bottom-block fb-bb-3">
                                        <ul> 
                                            <li><h4> CONTACT US</h4></li>
                                            <li>{{ $contactinfo->phone }}</li>
                                            <li>{{ $contactinfo->email }}</li>
                                        </ul>
                                    </div>
                                </div>
                            <div class="fb-bb-4 footer-copyright">
                            Copyright &copy; 2017 {{ $contactinfo->branchname }}
                            </div>
                            </article>
                        </section>
                    </div>
                </div>
        </footer>
 @endforeach