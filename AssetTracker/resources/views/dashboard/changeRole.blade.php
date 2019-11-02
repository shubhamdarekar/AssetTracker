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
        <h1><strong>Change Role</strong></h1>
        <span class="border">
            <form action="/home/changedRole" method="POST">
                @csrf
                <div class="form-group row">
                        <label class="col-3 col-lg-offset-3">Name of the Users</label>
                        <select name="userDropdown" id="dropdown" class="col-2">
                                @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}} : {{$user->role}} 
                          {{-- @if {{$user->role}} is 0
                           System Admin 
                        {% elif({{$user->role}} is 1 %}
                        Student
                        {% elif({{$user->role}} is 2 %}
                        Lab Assistant or Peon
                        {% elif({{$user->role}} is 3 %}
                        Teacher
                        {% elif({{$user->role}} is 4 %}
                        HOD or Deputy HOD
                        {% elif({{$user->role}} is 5 %}
                        Purchase Officer
                        {% endif %} --}}
                        </option>
                                @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-3 col-lg-offset-3">Role</label>
                        <select name="roleDropdown" class="col-2">
                                <option value="0">0: System Admin</option>
                                <option value="1">1: Student</option>
                                <option value="2">2: Lab Assitant</option>
                                <option value="2">2: Peon</option>
                                <option value="3">3: Teacher</option>
                                <option value="4">4: Deputy HOD</option>
                                <option value="4">4: HOD</option>
                                <option value="5">5: Purchase Officer</option>
                        </select>
                    </div>
                    <div class = "row col-4 form-group col-lg-offset-12">
                                <button type="submit" class = "btn btn-primary" name="submit">Submit</button>
                    </div>
            </form>
        </span>
    </div>
@endsection 