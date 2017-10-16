<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Auth;
use Illuminate\Support\Facades\Input;

class GalleryController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $pageheaders = \App\Page::get()->where('id','6');
        $gallerycontents =  \App\Gallery::orderBy('created_at', 'desc')->where('pageid','6')->get();
         $contactinfos = \App\Contact::where('loctype', 'Main')->limit(1)->get();
        return view('gallery',['gallerycontents' => $gallerycontents, 'contactinfos'=> $contactinfos, 'pageheaders'=> $pageheaders]);
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
        $pageheaders = \App\Page::get()->where('id','6');
        $gallerycontents =  \App\Gallery::get()->where('pageid','6');
         return view('gallerypages.create',['gallerycontents' => $gallerycontents, 'pageheaders'=> $pageheaders]);
   
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
         if(Input::hasFile('banner'))
        {
        $image = $request->file('banner');
        $imageHeader = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $image->move(base_path('banners'),$imageHeader);
}
        $pages = \App\Page::find(6);
        $pages->bannertext = $request->bannertext;
        $pages->bannertext1 = $request->bannertext1;
        $pages->headertext = $request->galleryheader_txt;
        $pages->banner = $request->my_banner;
        $pages->save();

       
      
        $data['status'] = 'Page saved Successfully';
         return redirect()->action('GalleryController@create')->with( $data );
    }

        public function storeGallery(Request $request, $id)
    {
        
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $image->move(base_path('images'),$imageName);

        $entry = new \App\Gallery;
        $entry->mimetype = $image->getClientMimeType();
        $entry->original_filename = $imageName;
        $entry->filename = $image->getFilename().'.'.$extension;
        $entry->pageid =$id;
        $entry->save();
 
    }

      public function deleteUpload()
    {

        $filename = Input::get('id');

        if(!$filename)
        {
            return 0;
        }

      
        $sessionImage = Gallery::where('filename', 'like', $filename)->first();


        if(empty($sessionImage))
        {
            return Response::json([
                'error' => true,
                'code'  => 400
            ], 400);

        }

       
        if( !empty($sessionImage))
        {
            $sessionImage->delete();
        }

        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200);
    }
    

    public function search()
    {
    $q = Input::get ( 'q' );
    $pageheaders = Gallery::where ( 'original_filename', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $pageheaders  ) > 0)
        return view ( 'gallery' )->withDetails ( $pageheaders  )->withQuery ( $q );
    else
        return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
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
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $id)
    {
        $galleryimages = \App\Gallery::find($id);
       if(\File::exists('images/'.$galleryimages->original_filename))
        {
     \File::delete('images/'.$galleryimages->original_filename);
    }
            $galleryimages->delete();
            $data['status'] = 'Image deleted Successfully';
        
       
         return redirect()->action('GalleryController@create')->with( $data );
    }

    
      




}
