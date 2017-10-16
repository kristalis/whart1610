<?php

namespace App\Http\Controllers;
use App\Gallery;
use App\About;
use App\Page;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;

class AboutController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageheaders = \App\Page::get()->where('id','2');
        $aboutcontents = \App\About::orderBy('created_at', 'asc')->first()->get();
        $homecontents = \App\Home::all();
        $aboutimages = \App\Gallery::get()->where('pageid','2');
       $contactinfos = \App\Contact::where('loctype', 'Main')->get();
       return view('about', ['aboutcontents'=> $aboutcontents, 'aboutimages'=> $aboutimages,  'contactinfos'=> $contactinfos,  'homecontents'=> $homecontents, 'pageheaders'=> $pageheaders]);
    }

    /**
     * Show the form for creating a new admin aboutpage.
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
             $aboutimages = \App\Gallery::get()->where('pageid','2');
             $pageheaders = \App\Page::get()->where('id','2');
            $aboutcontents = \App\About::orderBy('created_at', 'desc')->limit(1)->get();
         return view('aboutpages.create',['aboutcontents'=>$aboutcontents,'pageheaders'=> $pageheaders,'aboutimages'=>$aboutimages ]);
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
       

        if(Input::hasFile('chefimages'))
        {
        $image = $request->file('chefimages');
        $chefImage = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $image->move(base_path('images'),$chefImage);
    }


        $abouts = new \App\About;
        $abouts->chefname = $request->chefname;
        $abouts->chefimage = $chefImage;
        $abouts->chefdesc = $request->chefdesc;
        $abouts->save();
      
        $data['status'] = 'Chef details added Successfully';
        return redirect()->action('AboutController@create')->with( $data );
            }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         //
            //Validate Data
        $this->validate($request, [
        'bannertext' => 'required',
        'bannertext1' => 'required',
        ]);

        //store data:['id', 'bannertext', 'bannertext1', 'abouttext', 'banner', 'chefname','chefimage','chefdesc'];
        
        if(Input::hasFile('banner'))
        {
        $image = $request->file('banner');
        $imageName = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $image->move(base_path('banners'),$imageName);
}

        $pages = \App\Page::find($id);
        $pages->bannertext = $request->bannertext;
        $pages->bannertext1 = $request->bannertext1;
        $pages->headertext = $request->aboutus_txt;
        $pages->banner = $request->my_banner;
        $pages->save();

        $data['status'] = 'About Page saved Successfully';
        return redirect()->action('AboutController@create')->with( $data );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $abouts = \App\Gallery::find($id);
       if(\File::exists('images/'.$abouts->original_filename))
        {
     \File::delete('images/'.$abouts->original_filename);
    }
            $abouts->delete();
            $data['status'] = 'Images deleted Successfully';
        
       
         return redirect()->action('AboutController@create')->with( $data );
    }
}
