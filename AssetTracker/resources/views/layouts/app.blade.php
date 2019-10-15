<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- <link rel="stylesheet" href="{{ asset('css/app.css')}}"> --}}
  <link rel="stylesheet" href="{{ asset('css/app2.css')}}">
  <link rel="stylesheet" href="{{ asset('css/app3.css')}}">

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

  <body>
    @auth
  @if (Auth::user()->role==6)
    </h1>Contact Admin To assign yourself a role</h1>  
  @endif
  @endauth
      <style>
          body {
            font-family: "Lato", sans-serif;
          }
          
          .sidenav {
            height: 100%;
            width: 230px;
            position: fixed;
            z-index: 1;
            top: 15;
            left: 0;
            background-color: #aaa;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
          }
          
          .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: black;
            display: block;
            transition: 0.3s;
            visibility:visible;
          }
          
          .sidenav a:hover {
            color: white;
          }
          
          

          #sidenavButton hover{
            background-color: rgba(52, 165, 217,1);
          }
          
          .container {
            position: absolute;
            /* background: #000; */
            left: 50%;
          top: 26%;
          font-size: 25px;
          
            height: 200px;
            margin-top: -100px /* half of you height */
            width: 400px;
            margin-left: -250px
          } 
          .container2
          {
              font-size: 20px;
          }
          /* .maincontent{
            margin-left:230px!important;
          }     */
          @media screen and (max-height: 450px) {
            .sidenav {padding-top: 10px;}
            .sidenav a {font-size: 18px;}
          }

          @media screen and (min-width:1500px){
            .sidenav{
              width: 230px;
            }
            .maincontent{
              margin-left: 230px%!important;
              width:85%;
            }
          }
          @media screen and (max-width:1500px){
            .sidenav{
              width: 0%; 
            }
            .maincontent{
              margin-left: 0%!important;
              width:100%;
            }
          }
          </style>

  <script>
      function openNav() {
          if(document.getElementById("mySidenav").style.width == "230px"){
              document.getElementById("mySidenav").style.width = "0px";
              document.getElementById("maincontent").style.marginLeft = "0%";
              document.getElementById("maincontent").style.width = "100%";
              ;
              
          }
          else{
            
              document.getElementById("mySidenav").style.width = "230px";
              document.getElementById("maincontent").style.marginLeft = "230px";
              document.getElementById("maincontent").style.width = "85%";        
          }
        
      } 
      
    
      </script>

  <div class="w3-bar" style="height: 50px;background-color: rgb(52,165,217)">
  @auth
    <span class="w3-bar-item" style="font-size:30px;cursor:pointer" onclick="openNav()" id="sidenavButton">&#9776</span>
  @endauth
      <a class="navbar-brand" style = "font-size:30px; color:black;" href="{{ url('/') }}">
                      {{ config('app.name', 'TrackYourAssets') }}
                  </a>
      <ul class = "navbar-nav mr-autostyle" style="float:right;margin-right:50px;list-style-type:none;">
          <li class="nav-item">
            @auth
              <a class="navbar-brand" style="color:black;" href="\logout">Logout</a>                
            @endauth
            </li>
            @guest
            <li>
                <a class="nav-item" style="color:black;" href="\login">Login</a>               
              </li>
            <li>
            <a class="nav-item" style="color:black;" href="\register">Register</a>
          </li>
            @endguest
            
      </ul>

  </div>

  @auth
  @if (Auth::user()->role!=6)
  <div id="mySidenav" class="sidenav" style="width:230px">
    <div id="gayab" style="transition: 0.1ms;">
    <a href="/home">Dashboard</a>
    <a href="/home/issue">Issue Asset</a>
    @if(Auth::user()->role==0)
    <a href="/home/assignrole">Assign Role</a>
    <a href="/home/changerole">Change Role</a>
    @endif
    @if(Auth::user()->role==4 || Auth::user()->role==5)
      <a href="/home/create">Add asset to System</a>
    @endif
    @if(Auth::user()->role==1 || Auth::user()->role==2)
      <a href="/home/requestnewasset">File Requests for New Asset</a>
    @endif
    @if(Auth::user()->role==3 || Auth::user()->role==4)
      <a href="/home/newassetrequests">Aprove New Asset Requests</a>
    @endif
    @if(Auth::user()->role==2 || Auth::user()->role==3)
        <a href="/home/requests">Show Asset Requests</a>
    @endif
    <a href="/home/file">Report a problem</a>
    @if(Auth::user()->role==3 || Auth::user()->role==4 || Auth::user()->role==5)
        <a href="/home/viewissues">See User Problems</a>
    @endif
    @if(Auth::user()->role==5 || Auth::user()->role==4)
        <a href="/home/purchase">Place Order For new assets</a>
    @endif
    <hr style="margin-left:7.5%;width:85%">
    <a href="/home/edit">Edit Profile</a>
      <a href="/home/history">View History</a>
  </div>
  </div>
@endif
  @endauth

  <div id="maincontent" style="width:100%;transition : 0.5s;margin-left:230px;">
  @include('layouts.messages')
  @yield('content')
  </div>



    
  </body>
</html>
