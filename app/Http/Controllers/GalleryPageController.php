<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\galleryPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class GalleryPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('gallerypages.create');  
    }


            /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('banner');
       $extension = $file->getClientOriginalExtension();
        $file->move('uploads', $file->getClientOriginalName());
            $gallery = new \App\GalleryPage;
            $gallery->bannertext = $request->bannertext;
            $gallery->bannertext1 = $request->bannertext1;
            $gallery->galleryheadertext = $request->galleryheader_txt;
            $gallery->banner = $file->getClientOriginalName();
            $gallery->save();


            return view('gallerypages.create');  
        }



    /**
     * Display the specified resource.
     *
     * @param  \App\galleryPage  $galleryPage
     * @return \Illuminate\Http\Response
     */
    public function show(galleryPage $galleryPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\galleryPage  $galleryPage
     * @return \Illuminate\Http\Response
     */
    public function edit(galleryPage $galleryPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\galleryPage  $galleryPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, galleryPage $galleryPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\galleryPage  $galleryPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(galleryPage $galleryPage)
    {
        //
    }
}
