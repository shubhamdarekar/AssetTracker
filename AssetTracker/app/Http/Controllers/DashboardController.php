<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function issue(){
        return view('dashboard.issueAsset');
    }

    public function create(){
        return view('dashboard.create');
    }

    public function requests(){
        return view('dashboard.requests');
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
        return view('dashboard.newassetrequests');
    }

    public function otherDepartmentDetails()
    {
        return view('dashboard.otherDepartmentDetails');
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
        return view('dashboard.requestNewAsset');
    }

    public function viewissues(){
        return view('dashboard.viewIssues');
    }

    public function assignrole(){
        return view('dashboard.assignRole');
    }

    public function changerole(){
        return view('dashboard.changeRole');
    }
}
