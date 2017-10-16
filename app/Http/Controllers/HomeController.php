<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use App\Gallery;
use Auth;
use Illuminate\Support\Facades\Input;


class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $pageheaders = \App\Page::get()->where('id','1');
        $homecontents = \App\Home::orderBy('created_at', 'asc')->first()->get();
        $homeimages = \App\Gallery::where('pageid','1')->limit(8)->get();
        $contactinfos = \App\Contact::where('loctype', 'Main')->get();
        $eventcontents =  \App\Event::orderBy('created_at', 'desc')->limit(3)->get();
      //  return view('welcome', ['homecontents'=> $homecontents, 'homeimages'=>$homeimages, 'contactinfos'=> $contactinfos,'eventcontents'=> $eventcontents, 'pageheaders'=> $pageheaders]);
       return view('home', ['homecontents'=> $homecontents, 'homeimages'=>$homeimages, 'contactinfos'=> $contactinfos,'eventcontents'=> $eventcontents, 'pageheaders'=> $pageheaders]);
       
    }

       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          if( Auth::guest())
        {
            return view('auth.login');
        }
        else
        {
           $homeimages = \App\Gallery::get()->where('pageid','1');
           $homecontents = \App\Home::orderBy('created_at', 'asc')->first()->get();
           $pageheaders = \App\Page::get()->where('id','1'); 
           return view('homepages.create', ['pageheaders'=> $pageheaders,'homecontents'=> $homecontents, 'homeimages'=> $homeimages]);
    }
}



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //   return response($request->fld_val4, 200);
     
        //
            //Validate Data
       $this->validate($request, [
        'bannertext' => 'required',
        'bannertext1' => 'required',
        ]);

        //store data:['id', 'bannertext', 'bannertext1', 'abouttext', 'banner', 'chefname','chefimage','chefdesc'];
       if(Input::hasFile('banner') && Input::hasFile('footer_banner'))
        {
        $image = $request->file('banner');
        $imageName = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $image->move(base_path('banners'),$imageName);

        $imagefoot = $request->file('footer_banner');
        $imagefootName = $imagefoot->getClientOriginalName();
        $extension = $imagefoot->getClientOriginalExtension();
        $imagefoot->move(base_path('banners'),$imagefootName);
}
        

        $pages = \App\Page::find(1);
        $pages->bannertext = $request->bannertext;
        $pages->bannertext1 = $request->bannertext1;
        $pages->headertext = $request->home_txt;
        $pages->banner = $request->my_banner;
        $pages->footerbanner = $request->my_footerbanner;
        $pages->save();




        $homes = \App\Home::first();

     $homes->openingtimes =  json_encode($request->fld_val1);
        $homes->homeaddress = json_encode($request->fld_val2);
        $homes->specials = json_encode($request->fld_val3);
        $homes->bookingtype = $request->optionsBookings;
        $homes->opentableid = $request->opentable_booking;
        $homes->emailid = $request->email_booking;
        $homes->customername= $request->customer_name;
        $homes->customerreview = $request->customer_review;

        $homes->save();

         $data['status'] = 'Page saved Successfully';
         return redirect()->action('HomeController@create')->with( $data );
    
    }

     public function destroy(Request $request, $id)
    {
            $homeimages = \App\Gallery::find($id);
            $path = public_path().'/';
        //   dd('images/'.$homeimages->original_filename);

    if(\File::exists('images/'.$homeimages->original_filename))
        {
     \File::delete('images/'.$homeimages->original_filename);
    }
       
            $homeimages->delete();
            $data['status'] = 'Image deleted Successfully';
        
       
         return redirect()->action('HomeController@create')->with( $data );
    }


 }
