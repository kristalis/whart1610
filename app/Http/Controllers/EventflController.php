<?php

namespace App\Http\Controllers;

use App\Room;
use App\Page;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;

class EventflController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $pageheaders = \App\Page::get()->where('id','4');
        $eventcontents =  \App\Room::all();
        $contactinfos = \App\Contact::where('loctype', 'Main')->get();
  
       return view('eventoffers', ['contactinfos'=> $contactinfos, 'pageheaders'=> $pageheaders, 'eventcontents'=> $eventcontents]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\eventfl  $eventfl
     * @return \Illuminate\Http\Response
     */
    public function show(eventfl $eventfl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\eventfl  $eventfl
     * @return \Illuminate\Http\Response
     */
    public function edit(eventfl $eventfl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\eventfl  $eventfl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, eventfl $eventfl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\eventfl  $eventfl
     * @return \Illuminate\Http\Response
     */
    public function destroy(eventfl $eventfl)
    {
        //
    }
}
