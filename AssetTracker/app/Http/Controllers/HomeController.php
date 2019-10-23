<?php

namespace App\Http\Controllers;

use Auth;
use App\issuedBy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        // echo($id);
        $data = array(
            'requests' => issuedBy::where('userId','=',$id)
                            ->where('itemGranted','=',0)
                             ->get(),

            'granted' => issuedBy::where('userId','=',$id)
                            ->where('itemGranted','=',1)
                            ->get()
        ); 
        // echo($requests);
        return view('Home')->with($data);
    }
}
