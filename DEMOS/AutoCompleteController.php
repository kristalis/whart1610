<?php

namespace App\Http\Controllers;

use App\AutoComplete;
use Illuminate\Http\Request;
use App\User;

class AutoCompleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function index(){

            $details = \App\User::all();
   
        return view('welcome',['details' => $details])->withQuery ( $details );
   }


public function search(Request $request) {
    $q = $request->q;
    $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $user ) > 0)
        return view ( 'welcome' )->withDetails ( $user )->withQuery ( $q );
    else
        return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
}


}
