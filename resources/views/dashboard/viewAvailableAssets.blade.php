@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<style>
    *{
        text-decoration: none;
    }

    th{
        padding: 10px 75px;
        borer
    }
    td{
        text-align:center;
    }
</style>
<div style="width:inherit;height:inherit;vertical-align:middle;" align="center">
    <h1><strong>System Assets</strong></h1>
    <br><br>
    <table class="table-bordered">
        <tr>
            <th>No.</th>
            <th>Asset</th>
            <th>Total Quantity</th>
            <th>Remaining Quantity</th>
        </tr>
        <?php $id = 1?>
        @foreach ($assets as $asset)
          <tr>
            <td>{{$id}}</td>
            <td>{{$asset->name}}</td>
            <td>{{$asset->totalQuantity}}</td>
            <td>{{$asset->remainingQuantity}}</td>      
        </tr>
        <?php $id = $id + 1; ?>  
        @endforeach
    </table>
    <br><br><br><br>        
</div>
@endsection