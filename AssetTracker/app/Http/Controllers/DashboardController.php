<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\issuedBy;
use App\userIssues;
use App\newassetrequests;
use App\orders;
use DB;
use Illuminate\Support\Facades\Auth;

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

    public function return(){
        $return = DB::table('issuedby')
                  ->where('itemGranted','=',1)
                  ->where('itemReturned','=',0)->get();
        return view('dashboard.return')->with('return',$return);
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

    public function ordersRecieved()
    {
        $orders = orders::where('deliveredInGoodState','=',0)->orderBy('id','DESC')->get();
        return view('dashboard.ordersRecieved')->with('orders',$orders);
    }

    public function assignrole(){
        return view('dashboard.assignRole');
    }

    public function changerole(){
        return view('dashboard.changeRole');
    }

    public function userRequests(){
        
        $requests = issuedBy::where([
            ['itemGranted','=',0],
            ['userId','=',Auth::user()->id]])->orderBy('id','DESC')->get();
        return view('dashboard.userRequests')->with('requests',$requests);
    }

    public function userGranted(){
        $grants = issuedBy::where([
            ['itemGranted','=',1],
            ['userId','=',Auth::user()->id]])->orderBy('id','DESC')->get();
        return view('dashboard.userGranted')->with('grants',$grants);   
    }
}
