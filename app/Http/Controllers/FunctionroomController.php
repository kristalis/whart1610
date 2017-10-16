<?php

namespace App\Http\Controllers;

use App\Functionroom;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;

class FunctionroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageheaders = \App\Page::get()->where('id','8');
        $roomcontents =  \App\Room::get()->where('roomtype','1');
        $contactinfos = \App\Contact::where('loctype', 'Main')->get();

        return view('functionsroom', ['roomcontents'=> $roomcontents, 'contactinfos'=> $contactinfos, 'pageheaders'=> $pageheaders]);
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
        $pageheaders = \App\Page::get()->where('id','8');
        $roomcontents =  \App\Room::get()->where('roomtype','1');;
       return view('accommodationpages.createfunctionsroom', ['roomcontents'=> $roomcontents, 'pageheaders'=> $pageheaders]);
  
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

        if(Input::hasFile('room_image') )
      {

        $image = $request->file('room_image');
        $roomImage = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $image->move(base_path('images'),$roomImage);


        $rooms = new \App\Room;
  
        $rooms->roomtitle = $request->room_title;
        $rooms->bookingurl = $request->booking_url;
        $rooms->roomprice = $request->room_price;
        $rooms->roomdesc = $request->rooms_txt;
        $rooms->roomimage = $roomImage;
        $rooms->roomtype = '1';
        $rooms->save();

}
     $data['savedRoom'] = 'Functions Room added Successfully';
        
     return redirect()->action('FunctionroomController@create')->with( $data );
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Functionroom  $functionroom
     * @return \Illuminate\Http\Response
     */
    public function show(Functionroom $functionroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Functionroom  $functionroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Functionroom $functionroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Functionroom  $functionroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

   
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
        $pages->headertext = $request->roomsheader_txt;
        $pages->banner = $request->my_banner;
        $pages->save();

        $data['status']  = 'Functionroom Page saved Successfully';
         return redirect()->action('FunctionroomController@create')->with( $data );  
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Functionroom  $functionroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $rooms = \App\Room::find($id);
          
       if(\File::exists('images/'.$rooms->roomimage))
        {
     \File::delete('images/'.$rooms->roomimage);
}
            $rooms->delete();
            $data['status'] = 'Function room details deleted Successfully';
        
       
         return redirect()->action('FunctionroomController@create')->with( $data );
    }
}

