<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\issuedBy;
use App\userIssues;
use App\newassetrequests;
use DB;

class DashboardController extends Controller
{
    public function issue(){
        return view('dashboard.issueAsset');
    }

    public function create(){
        return view('dashboard.create');
    }

    public function requests(){
        $issued = DB::table('issuedby')->where('itemGranted','=', 0)->get();
        return view('dashboard.requests')->with('issued',$issued);
    }

    public function fine(){
        return view('dashboard.fine');
    }

    public function file(){
        return view('dashboard.file');
    }

    public function history()
    {
        return view('dashboard.history');
    }

    public function newasset()
    {
        return view('dashboard.requestNewAssets');
    }
    public function purchase()
    {
        return view('dashboard.purchase');
    }

    public function edit()  
    {
        return view('dashboard.edit');
    }

    public function assetrequests(){
        $newassetrequests = newassetrequests::where('addedToAssets','=',0)->orderBy('id','DESC')->get();
        return view('dashboard.newassetrequests')->with('newassetrequests',$newassetrequests);
    }

    public function viewissues(){
        $viewIssues = userIssues::where('solved','=',0)->orderBy('id','DESC')->get();
        return view('dashboard.viewIssues')->with('viewIssues',$viewIssues);
    }

    public function assignrole(){
        return view('dashboard.assignRole');
    }

    public function changerole(){
        return view('dashboard.changeRole');
    }
}
