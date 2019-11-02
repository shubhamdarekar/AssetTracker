<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\issuedBy;
use App\asset;
use App\userIssues;
use App\User;
use App\orders;
use App\assetRequest;
use App\newassetrequests;
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
        $asset->totalQuantity =0;
        $asset->remainingQuantity = 0;
        $asset->save();
        $order = new orders();
        $order->orderedBy = Auth::user()->id;
        $asset2 = asset::where('name','=',$request->input('createAssetName'))->get();
        $order->assetOrdered = $asset2[0]['id'];
        $order->quantityOrdered = $request->input('createAssetQuantity');
        $order->amountToBePaid = 0;
        $order->save();
        return redirect('home/create')->with('success','Asset Created');
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
    public function edit(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'asset' => 'required',
            'quantity' => 'required'
        ]);
        $assetname = $request->input('asset');
        $quantity = $request->input('quantity');
        $user = User::where('name','=',$request->input('name'))->get();
        $userId = $user[0]['id'];
        $assetIdDetails = asset::where('name','=',$assetname)->get();   
        // echo $assetIdDetails;
        $assetId = $assetIdDetails[0]['id'];
        // echo $assetId;
        $id = DB::table('issuedby')
                  ->where('userId','=',$userId)
                  ->where('itemIssued','=',$assetId)
                  ->where('quantityIssued',$request->input('quantity'))
                  ->where('itemGranted','=',0)
                  ->update(['itemGranted' => 1]);
        // $idDetails = issuedBy::find($id);
        // echo $idDetails;
        // $idDetails->where('id',$id)->update('itemGranted' => 1));
        $issued = DB::table('issuedby')->where('itemGranted','=', 0)->get();   
        return view('dashboard.requests')->with('issued',$issued);
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
        DB::table('userissues')->insert(['userId'=>Auth::user()->id,'asset'=>$name,'issueFaced'=>$issues]);
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
        return redirect('/home/requestnewasset')->with('success', 'New Asset Reuested');
     }

     public function markSolved(Request $request){
         $this->validate($request,[
            'asset' => 'required',
            'issueFaced' => 'required'
         ]);
        // $request->input('asset');
        $issues = DB::table('userissues')->where('id','=',$request->input('id'))
                  ->update(['solved' => 1]);

        $viewIssues = userIssues::where('solved','=',0)->orderBy('id','DESC')->get();
        return redirect('/home/viewissues')->with('viewIssues',$viewIssues);
     }

     public function createNew(Request $request){
        $assets = asset::get();
        $this->validate($request,[
            'asset' => 'required',
            'quantity' => 'required',
            'reason' => 'required'
        ]);
        $asset = new asset();
        $asset->name = $request->input('asset');
        $asset->totalQuantity = $request->input('quantity');    
        $asset->remainingQuantity = $request->input('quantity');
        $asset->save();
        $new = DB::table('newassetrequests')->where('assetOrdered','=',$request->input('asset'))
                                     ->where('reason','=',$request->input('reason'))
                                     ->where('quantity','=',$request->input('quantity'))
                                     ->where('addedToAssets','=',0)
                                     ->update(['addedToAssets' => 1]);
        $newassetrequests = newassetrequests::where('addedToAssets','=',0)->orderBy('id','DESC')->get();                             
        return view('dashboard.newassetrequests')->with('newassetrequests',$newassetrequests);
    }  
    public function approve(Request $request){
        $assets = asset::get();
        $this->validate($request,[
            'asset' => 'required',
            'quantity' => 'required',
            'reason' => 'required'
        ]);
        $asset = new asset();
        $asset->name = $request->input('asset');
        $asset->totalQuantity = 0;    
        $asset->remainingQuantity = 0;
        $asset->save();
        $order = new orders();
        $order->orderedBy = Auth::user()->id;
        $asset2 = asset::where('name','=',$request->input('asset'))->get();
        $order->assetOrdered = $asset2[0]['id'];
        $order->quantityOrdered = $request->input('quantity');
        $order->amountToBePaid = 0;
        $order->save();
        $new = DB::table('newassetrequests')->where('assetOrdered','=',$request->input('asset'))
                                     ->where('reason','=',$request->input('reason'))
                                     ->where('quantity','=',$request->input('quantity'))
                                     ->where('addedToAssets','=',0)
                                     ->update(['addedToAssets' => 1]);
        $newassetrequests = newassetrequests::where('addedToAssets','=',0)->orderBy('id','DESC')->get();                             
        return view('dashboard.newassetrequests')->with('newassetrequests',$newassetrequests);
    } 

    public function ordersRecieved(Request $request){
        $this->validate($request,[
            'asset' => 'required',
            'quantity' => 'required',
            'id' => 'required'
        ]);
        
        $asset = asset::where('name','=',$request->input('asset'))->get();

        $assetId = $asset[0]['id'];
        $remain = $asset[0]['remainingQuantity'];
        $total = $asset[0]['totalQuantity'];
        

        $new = DB::table('assets')->where('name','=',$request->input('asset'))
                                     ->update(['totalQuantity' => $request->input('quantity')+$total,'remainingQuantity' => $request->input('quantity')+$remain]);
        $new = DB::table('orders')->where('id','=',$request->input('id'))
                                     ->update(['deliveredInGoodState' => 1]);
        $orders = orders::where('deliveredInGoodState','=',0)->orderBy('id','DESC')->get();
        return view('dashboard.ordersRecieved')->with('orders',$orders);
    } 
    

    public function returned(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'asset' =>'required',
            'quantity' => 'required'
        ]);
        $username = $request->input('name');
        $user = User::where('name','=',$username)->get();
        // echo $user;
        $assetname = $request->input('asset');
        // echo $assetname;        
        $quantity = $request->input('quantity');
        // echo $quantity; 
        $asset = asset::where('name','=',$assetname)->get();
        // echo $asset;

        $assetId = $asset[0]['id'];
        // echo $assetId;
        // echo "<br>";
        $remain = $asset[0]['remainingQuantity'];
        // echo $remain;

        $id = issuedBy::where('itemIssued','=',$assetId);
        DB::table('assets')->where('name','=',$assetname)
                           ->update(['remainingQuantity' => ($remain + $quantity)]);

        DB::table('issuedby')
            ->where('id','=',$request->input('id'))
            ->update(['itemReturned' => 1]);

        $return = DB::table('issuedby')
                      ->where('itemGranted','=', 1)
                      ->where('itemReturned','=',0)->get();    
        return view('dashboard.return')->with('return',$return);
    }
}   

