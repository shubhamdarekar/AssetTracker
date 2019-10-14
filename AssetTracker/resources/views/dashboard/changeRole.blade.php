<?php
    use App\User;
    $users=User::get()->where('role','!=',6); 
?>

@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        *{
            text-decoration: none;
        }
        label{
            font-size: 20px;
        }
    </style>
    <div style="width:inherit;height:inherit;vertical-align:middle;" align="center">
        <span class="border">
            <form action="/home/changedRole" method="POST">
                @csrf
                <div class="form-group row">
                        <label class="col-3">Name of the Users</label>
                        <select name="userDropdown" class="col-2">
                                @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name,$user->role}}
                        {{-- :{{@if ($user->role == 0)
                           System Admin 
                        @elseif(($user->role == 1)
                        Student
                        @elseif(($user->role == 2)
                        Lab Assistant or Peon
                        @elseif(($user->role == 3)
                        Teacher
                        @elseif(($user->role == 4)
                        HOD or Deputy HOD
                        @elseif(($user->role == 5)
                        Purchase Officer
                        @endif}} --}}
                        </option>
                                @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group row">
                        if
                        <label class="col-3">Role</label>
                        <select name="roleDropdown" class="col-2">
                                <option value="0">System Admin</option>
                                <option value="1">Student</option>
                                <option value="2">Lab Assitant</option>
                                <option value="2">Peon</option>
                                <option value="3">Teacher</option>
                                <option value="4">Deputy HOD</option>
                                <option value="4">HOD</option>
                                <option value="5">Purchase Officer</option>
                        </select>
                    </div>
                    <div class = "row col-4 form-group">
                                <button type="submit" class = "btn btn-primary" name="submit">Submit</button>
                    </div>
            </form>
        </span>
    </div>
@endsection 