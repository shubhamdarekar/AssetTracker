<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\issuedBy;
use App\asset;
use App\userIssues;
use App\orders;
use App\assetRequest;
// use App\newassetrequests;
use App\totalQuantity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->validate($request,[
            'purchaseDropdown' => 'required',
            'purchaseQuantity' => 'required',
            'purchaseAmount' => 'required'
        ]);

        $order = new orders();
        $order->orderedBy = Auth::user()->id;
        $order->assetOrdered = $request->input('purchaseDropdown');
        $order->quantityOrdered = $request->input('purchaseQuantity');
        $order->amountToBePaid = $request->input('purchaseAmount');
        $order->save();
        return redirect('/home/purchase')->with('success','AssetOrdered');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request,[
            'createAssetName' => 'required',
            'createAssetQuantity' => 'required',
            'createAssetDepartment' => 'required'
        ]);

        $ids = asset::get();
        $name = $request->input('createAssetName');
        $quantity = $request->input('createAssetQuantity');
        $dept = $request->input('createAssetDepartment');
        foreach($ids as $id){
            if($name == $id->name && $dept == $id->belongsToDept){
                return redirect('/home/create')->with('success','Asset already exists');
                break;
            }
        }   
        $asset = new asset();
        $asset->name = $name;
        $asset->belongsToDept = $request->input('createAssetDepartment');
        $asset->totalQuantity = $request->input('createAssetQuantity');
        $asset->remainingQuantity = $request->input('createAssetQuantity');
        $asset->save();
        return redirect('home/create')->with('success','Asset Created');
        // echo($name);
        // echo($quantity);
        // $totalId = asset::get()->where('name','=',$name);
        // echo($totalId);
        // $totalQuantityRow = asset::get()->where('name','=',$name);
        // echo($totalQuantityRow);
        // $Id = ($totalQuantityRow[0]['id']);
        // echo($Id);
    }

    /**
     * Store a newly created resource in storage.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo'Its okay';
        $this->validate($request,[
            'assetDropdown' => 'required',
            'assetQuantity' => 'required'
        ]);
        // return($request->input('assetQuantity'));
        $asset = new asset();
        $issuedBy = new issuedBy();
        $itemId = $request->input('assetDropdown');
        $itemQuantity = $request->input('assetQuantity');
        // $remainingQuantity = asset::find($itemId)->remainingQuantity;
        // $rq = asset::get()->where('id','=',$itemId);
        $remaining = DB::table('assets')->where('id','=',$itemId)->select('remainingQuantity')->first();
        // $remainingQuantity = json_decode($remainingQuantity, false);
        // echo($rq);
        // $remainingQuantity = ($rq[0]['remainingQuantity']);
        $remainingQuantity = $remaining->remainingQuantity;
        if($remainingQuantity > 0){
            if($itemQuantity <= $remainingQuantity){
                // $issuedBy->userId = Auth::user()->id;
                // $issuedBy->itemIssued = $itemId;
                // $issuedBy->quantityIssued = $itemQuantity;
                // return(Auth::user()->id);
                DB::table('issuedby')->insert(
                    ['userId' =>Auth::user()->id, 'itemIssued' => $itemId,'quantityIssued'=>$itemQuantity]
                );
                DB::table('assets')
                ->where('id', $itemId)
                ->update(['remainingQuantity' =>($remainingQuantity - $itemQuantity)]);
                // $issuedBy->save();
                return redirect('/home/issue')->with('success','Request Successful');
            }else{
                return redirect('/home/issue')->with('error','Not Enough Assets available');
            } 
        }
        else{
            return redirect('/home/issue')->with('error','0 Assetes available');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assignrole(Request $request)
    {
        $this->validate($request,[
            'userDropdown' => 'required',
            'roleDropdown' => 'required'
        ]);
        $userid = $request->input('userDropdown');
        $role = $request->input('roleDropdown');
        DB::table('users')
            ->where('id', $userid)
            ->update(['role' => $role]);
            return redirect('/home/assignrole')->with('success','Request Successful');
    }
    public function changerole(Request $request)
    {
        $this->validate($request,[
            'userDropdown' => 'required',
            'roleDropdown' => 'required'
        ]);
        $userid = $request->input('userDropdown');
        $role = $request->input('roleDropdown');
        echo $role;
        DB::table('users')
            ->where('id', $userid)
            ->update(['role' => $role]);
            return redirect('/home/changerole')->with('success','Request Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function show( Request $id)
    {
        $newassetrequest = assetRequest::all()->toArray();
        // $requests = issuedBy::find($id);
        return view('dashboard.requests')->with('requests',compact('requests'));
    }

    public function fileIssues(Request $request){
        $this->validate($request,[
            'fileSubject' => 'required',
            'fileIssue' => 'required'
        ]);

        $issue = new userIssues();
        $issue->userId = Auth::user()->id;
        $issue->Subject = $request->input('fileSubject');
        $issue->issueFaced = $request->input('fileIssue');
        $issue->save();
        return redirect('/home/file')->with('success','Issue Filed');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
   
    public function file(Request $request)
    {
        $this->validate($request,[
            'filename' => 'required',
            'fileissue' => 'required'
        ]);
        // $asset = new asset();
        // $userIssues = new userIssues();
        $name = $request->input('filename');
        $issues = $request->input('fileissue');
        // $userIssues = new userIssues();
        // $userIssues->userId = Auth::user()->id;
        // $userIssues->assetid = $name;
        // $userIssues->issueFaced = $issues;
        // $userIssues->save();
        DB::table('userissues')->insert(['userId'=>Auth::user()->id,'assetid'=>$name,'issueFaced'=>$issues]);
        return redirect('home/file')->with('success','Issue Filed');
    }
    /**
     * Store a newly created resource in storage.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function newasset(Request $request)
     {
        $this->validate($request,[
            'newassetname' => 'required',
            'newdescription' => 'required',
            'newquantity' => 'required',
        ]);
        $name = $request->input('newassetname');
        $description = $request->input('newdescription');
        $quantity = $request->input('newquantity');
        DB::table('newassetrequests')->insert(['userId'=>Auth::user()->id,'assetOrdered'=>$name, 'reason'=>$description, 'quantity'=>$quantity]);
        return redirect('/home/requestnewasset')->with('success', 'New Asset Oredered');
       


     }

        
}   

