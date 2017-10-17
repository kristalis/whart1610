<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactinfos = \App\Contact::where('loctype', 'Main')->limit(1)->get();
        $pageheaders = \App\Page::get()->where('id','4');
        $menucontents =  \App\Menu::all();
        

        return view('menu', ['menucontents'=> $menucontents, 'contactinfos'=> $contactinfos, 'pageheaders'=> $pageheaders]);
  
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
        
        $pageheaders = \App\Page::get()->where('id','4');
        $menucontents =  \App\Menu::all();
        return view('menupages.create', ['menucontents'=> $menucontents, 'pageheaders'=> $pageheaders]);

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
    
        //return response($request->menu_image, 200);
       if(Input::hasFile('menu_image') && Input::hasFile('menu_file') )
      {


        $image = $request->file('menu_image');
        $mImage = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $image->move(base_path('images'),$mImage);

        $doc = $request->file('menu_file');
        $mFile = $doc->getClientOriginalName();
        $extension = $doc->getClientOriginalExtension();
        $doc->move(base_path('files'),$mFile);
       }
        $menus = new \App\Menu;
        $menus->menutitle = $request->menu_title;
        $menus->menufile = $mFile;
        $menus->menuimage = $mImage;
        $menus->menutext = json_encode($request->fld_val3);
        $menus->save(); 
    
        $data['status'] = 'Menu added Successfully';
        return redirect()->action('MenuController@create')->with( $data );
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $menucontents =  \App\Menu::all();
        $menuinfo  = \App\Menu::find($id);

    
      $pageheaders = \App\Page::get()->where('id','4');
    
//    return view('menupages.create', ['menucontents'=> $menucontents,'menucontent'=> $menucontent, 'pageheaders'=> $pageheaders]);
return view('menupages.create',compact('menucontents','menuinfo','pageheaders'));
  //return response($menuinfo->menutitle,200);
   
    }
 public function updateMenu(Request $request, $id)
    {  

         $menus = \App\Menu::find($id);
          if(Input::hasFile('menu_image') && Input::hasFile('menu_file') )
      {


        $image = $request->file('menu_image');
        $mImage = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $image->move(base_path('images'),$mImage);

        $doc = $request->file('menu_file');
        $mFile = $doc->getClientOriginalName();
        $extension = $doc->getClientOriginalExtension();
        $doc->move(base_path('files'),$mFile);
       }
       
        $menus->menutitle = $request->menu_title;
        $menus->menufile = $mFile;
        $menus->menuimage = $mImage;
        $menus->save(); 
    
         $data['status'] = 'Menu updated Successfully';
        return redirect()->action('MenuController@create')->with( $data );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
           if(Input::hasFile('banner'))
        {
            $image = $request->file('banner');
            $imageName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $image->move(base_path('banners'), $imageName);
        }
            $pages = \App\Page::find($id);
            $pages->bannertext = $request->bannertext;
            $pages->bannertext1 = $request->bannertext1;
            $pages->headertext = $request->menuheader_txt;
            $pages->banner = $request->my_banner;
            $pages->save();

            if($request->fld_val3 != '')
            {
            $menus = new \App\Menu;
            $menus->menutitle = $request->menu_title;
            $menus->menufile = 'mf';
            $menus->menuimage = 'mi';
            $menus->menutext = json_encode($request->fld_val3);
            $menus->save(); 
        }

         $data['status'] = 'Menu Page saved Successfully';
        return redirect()->action('MenuController@create')->with( $data );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
      public function destroy(Request $request, $id)
    {
        $menus = \App\Menu::find($id);
       

        //   dd('images/'.$homeimages->original_filename);

    if(\File::exists('images/'.$menus->menuimage))
        {
     \File::delete('images/'.$menus->menuimage);
     \File::delete('files/'.$menus->menufile);
         }

            $menus->delete();
            $data['status'] = 'Menu deleted Successfully';
        
       
         return redirect()->action('MenuController@create')->with( $data );
    }
}
