<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
class ContactController extends Controller
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
        $contactinfos = \App\Contact::where('loctype', 'Main')->limit(1)->get();
        $branchinfos =  \App\Contact::where('loctype', 'Branch')->limit(1)->get();
        $pageheaders = \App\Page::get()->where('id','7');

        return view('contactus', ['contactinfos'=> $contactinfos, 'pageheaders'=> $pageheaders, 'branchinfos'=> $branchinfos]);
       

    }

    /** get all location details */
    public static function getLocations()
    {
        $locations = \App\Contact::orderBy('created_at', 'desc')->get();
        return $locations;
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
      $locs = $this->getLocations();
      // return view('contactpages.location', ['locs'=>$locs]); 
      $pageheaders = \App\Page::get()->where('id','7');
      return view('contactpages.create',['pageheaders'=>$pageheaders,'locs'=>$locs]);   
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
  /*  {$this->validate($request, [
        'phone', 'fax' => 'required|regex:/(01)[0-9]{9}/',
        'branchname','streetname','town' => 'required'
        ]);
*/

        //store data: ['branchname', 'address', 'location', 'postcode', 'phone','email'];
     
        $contacts = new \App\Contact;
        $contacts->branchname = $request->branchname;
        $contacts->address = $request->streetname;
        $contacts->location = $request->town;
        $contacts->county = $request->county;
        $contacts->postcode = $request->postcode;
        $contacts->phone = $request->phone;
        $contacts->email = $request->email;
        $contacts->fax = $request->faxline;
        $contacts->googlemap = $request->googlemap;
        $contacts->loctype = 'Branch';
        $contacts->weburl = $request->web_url;
        $contacts->save();

        $data['status'] = 'Contact details added Successfully';  
       return redirect()->action('ContactController@create')->with( $data );
     

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
         $locs = $this->getLocations();
         $pageheaders = \App\Page::get()->where('id','7');
         $contactinfo= \App\Contact::find($id);
         $pageheaders = \App\Page::get()->where('id','7');
          return view('contactpages.edit', compact('contactinfo','locs',' pageheaders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function updateContact(Request $request, $id)
    {
        
        $contacts = \App\Contact::find($id);
        $contacts->branchname = $request->branchname;
        $contacts->address = $request->streetname;
        $contacts->location = $request->town;
        $contacts->county = $request->county;
        $contacts->postcode = $request->postcode;
        $contacts->phone = $request->phone;
        $contacts->email = $request->email;
        $contacts->fax = $request->faxline;
        $contacts->googlemap = $request->googlemap;
        $contacts->loctype = 'Branch';
        $contacts->weburl = $request->web_url;
        $contacts->save();

        $data['status'] = 'Contact details updated Successfully';  

         return redirect()->back()->with( $data );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
       if(Input::hasFile('banner'))
        {
         $image = $request->file('banner');
        $imageName = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $image->move(public_path('banners'),$imageName);
        }

        $pages = \App\Page::find(7);
        $pages->bannertext = $request->bannertext;
        $pages->bannertext1 = $request->bannertext1;
        $pages->headertext = $request->contactus_txt;
        $pages->banner = $request->my_banner;
        $pages->save();

       
        $data['status'] = 'Contact Page saved Successfully';
       
       return redirect()->action('ContactController@create')->with( $data );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
      public function destroy(Request $request, $id)
    {
        $contacts = \App\Contact::find($id);
       
            $contacts->delete();
            $data['status'] = 'Contact deleted Successfully';
        
       
         return redirect()->action('ContactController@create')->with( $data );
    }
}
