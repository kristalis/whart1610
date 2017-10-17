<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SettingController extends Controller
{


      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return redirect()->action('SettingController@create'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settingcontents = \App\Setting::get();
        $contactinfos = \App\Contact::where('loctype', 'Main')->limit(1)->get();
        return view('settings.create',['settingcontents'=>$settingcontents, 'contactinfos'=>$contactinfos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Input::hasFile('logo'))
        {
        $image = $request->file('logo');
        $logoImage = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $image->move(base_path('banners'),$logoImage);
    }
   if(Input::hasFile('footer'))
        {
        $image = $request->file('footer');
        $footerImage = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $image->move(base_path('banners'),$footerImage);
    }

        $settings = \App\Setting::first();
        $settings->logo = $request->my_logo;
        $settings->footerbanner = $request->my_footer;
        $settings->facebookurl = $request->facebook_url;
        $settings->twitterurl = $request->twitter_url;
        $settings->googleurl = $request->google_url;
        $settings->youtubeurl = $request->youtube_url;
         
       
        $settings->save();
        
        $contacts = \App\Contact::find($request->contactid);
        $contacts->branchname = $request->branchname;
        $contacts->address = $request->streetname;
        $contacts->location = $request->town;
        $contacts->county = $request->county;
        $contacts->postcode = $request->postcode;
        $contacts->phone = $request->phone;
        $contacts->email = $request->email;
        $contacts->fax = $request->fax;
        $contacts->googlemap = $request->googlemap;
        $contacts->weburl = $request->web_url;
        $contacts->loctype = 'Main';
        $contacts->save();



        $data['status']  = 'Details Updated Successfully';  
        return redirect()->action('SettingController@create')->with( $data ); 
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
     public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password'     => 'required',
            'new_password'     => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);
        $data = $request->all();
     
        $user = User::find(auth()->user()->id);
        if(!Hash::check($data['old_password'], $user->password)){
             return back()
                        ->with('error','The specified password does not match the database password');
        }else{
           // write code to update password
        }
    }
}
