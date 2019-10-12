<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\issuedBy;
use App\asset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $rq = asset::get()->where('id','=',$itemId);
        $remainingQuantity = ($rq[0]['remainingQuantity']);
        if($remainingQuantity > 0){
            if($itemQuantity <= $remainingQuantity){
                $issuedBy->userId = Auth::user()->id;
                $issuedBy->itemIssued = $itemId;
                $issuedBy->quantityIssued = $itemQuantity;
                // return(Auth::user()->id);
                $issuedBy->save();
                return redirect('/home/issue')->with('success','Request Successful');
            }else{
                echo "<script>document.getElementById('demo').innerHTML('This much quantity not available')</script>";
            } 
        }
        else{
            echo"<script>documet.getElementById('demo').innerHTML('This asset is not available');</script>";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {
        //
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
}
