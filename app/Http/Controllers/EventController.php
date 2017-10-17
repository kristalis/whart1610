<?php

namespace App\Http\Controllers;

use App\Event;
use App\Page;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageheaders = \App\Page::get()->where('id','5');
        $eventcontents =  \App\Event::all();
        $contactinfos = \App\Contact::where('loctype', 'Main')->get();
  
       return view('event', ['contactinfos'=> $contactinfos, 'pageheaders'=> $pageheaders, 'eventcontents'=> $eventcontents]);
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
        $pageheaders = \App\Page::get()->where('id','5');
        $eventcontents =  \App\Event::all();
        return view('eventpages.create', [ 'pageheaders'=> $pageheaders, 'eventcontents'=>$eventcontents]);
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
 


        if(Input::hasFile('event_file'))
        {
        $efile = $request->file('event_file');
        $eventFile = $efile->getClientOriginalName();
        $extension = $efile->getClientOriginalExtension();
        $efile->move(base_path('files'),$eventFile);
    } else
    {
        $eventFile = "No File";
    }


      if(Input::hasFile('event_image'))
      {
        $image = $request->file('event_image');
        $eventImage = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $image->move(base_path('images'),$eventImage);

        }

        $events = new \App\Event;
        $events->eventtitle = $request->event_title;
        $events->eventsubtitle = $request->event_subtitle;
        $events->eventtext = $request->events_txt;
        $events->eventimage = $request->my_image;
        $events->eventlink = $request->event_link;
        $events->eventfile = $request->my_file;
        $events->save();
         
  
         $data['status'] = 'Event added Successfully';
         return redirect()->action('EventController@create')->with( $data );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $pageheaders = \App\Page::get()->where('id','5');
        $eventcontents =  \App\Event::all();
        $eventinfo =  \App\Event::find($id);
        return view('eventpages.edit', compact('pageheaders','eventcontents','eventinfo'));
    }

    public function updateEvent(Request $request, $id)
    {
        $events = \App\Event::find($id);
        if(Input::hasFile('event_file'))
        {
        $efile = $request->file('event_file');
        $eventFile = $efile->getClientOriginalName();
        $extension = $efile->getClientOriginalExtension();
        $efile->move(base_path('files'),$eventFile);
    } 

      if(Input::hasFile('event_image'))
      {
        $image = $request->file('event_image');
        $eventImage = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $image->move(base_path('images'),$eventImage);
}
       

        
        $events->eventtitle = $request->event_title;
        $events->eventsubtitle = $request->event_subtitle;
        $events->eventtext = $request->events_txt;
        $events->eventimage = $request->my_image;
        $events->eventlink = $request->event_link;
        $events->eventfile = $request->my_file;
        $events->save();

          $data['status']  = 'Event updated Successfully';
         return redirect()->back()->with( $data );

   }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
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
        $pages->headertext = $request->eventsheader_txt;
        $pages->banner = $request->my_banner;
        $pages->save();

         $data['status'] = 'Event Page saved Successfully';
         return redirect()->action('EventController@create')->with( $data );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request, $id)
    {
        $events = \App\Event::find($id);
       
            $events->delete();
            $data['status'] = 'Event details deleted Successfully';
        
       
         return redirect()->action('EventController@create')->with( $data );
    }
}
