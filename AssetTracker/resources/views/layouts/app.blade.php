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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

  <body>
      <div class="spinner-wrapper">
          <div class="sk-chase">
              <div class="sk-chase-dot"></div>
              <div class="sk-chase-dot"></div>
              <div class="sk-chase-dot"></div>
              <div class="sk-chase-dot"></div>
              <div class="sk-chase-dot"></div>
              <div class="sk-chase-dot"></div>
            </div>
          </div>
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
            background-color: rgba(116, 201, 237,0.6);
            overflow-x: hidden;
            transition: 0.5s;
            position: fixed;
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
          .sk-chase {
                position: absolute;
            top: 48%;
            left: 48%;
        width: 80px;
        height: 80px;
        animation: sk-chase 2.5s infinite linear both;
        }

        .sk-chase-dot {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0; 
        animation: sk-chase-dot 2.0s infinite ease-in-out both; 
        }

        .sk-chase-dot:before {
        content: '';
        display: block;
        width: 25%;
        height: 25%;
        background-color: #fff;
        border-radius: 100%;
        animation: sk-chase-dot-before 2.0s infinite ease-in-out both; 
        }

        .sk-chase-dot:nth-child(1) { animation-delay: -1.1s; }
        .sk-chase-dot:nth-child(2) { animation-delay: -1.0s; }
        .sk-chase-dot:nth-child(3) { animation-delay: -0.9s; }
        .sk-chase-dot:nth-child(4) { animation-delay: -0.8s; }
        .sk-chase-dot:nth-child(5) { animation-delay: -0.7s; }
        .sk-chase-dot:nth-child(6) { animation-delay: -0.6s; }
        .sk-chase-dot:nth-child(1):before { animation-delay: -1.1s; }
        .sk-chase-dot:nth-child(2):before { animation-delay: -1.0s; }
        .sk-chase-dot:nth-child(3):before { animation-delay: -0.9s; }
        .sk-chase-dot:nth-child(4):before { animation-delay: -0.8s; }
        .sk-chase-dot:nth-child(5):before { animation-delay: -0.7s; }
        .sk-chase-dot:nth-child(6):before { animation-delay: -0.6s; }

        @keyframes sk-chase {
        100% { transform: rotate(360deg); } 
        }

        @keyframes sk-chase-dot {
        80%, 100% { transform: rotate(360deg); } 
        }

        @keyframes sk-chase-dot-before {
        50% {
            transform: scale(0.4); 
        } 100%, 0% {
            transform: scale(1.0); 
        } 
        }
        .spinner-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(52, 165, 217,1);
        z-index: 999999;
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

  <div class="w3-bar" style="height: 50px;background-color: rgb(52,165,217);" >
  @auth
    <span class="w3-bar-item" style="font-size:30px;cursor:pointer" onclick="openNav()" id="sidenavButton">&#9776</span>
  @endauth
      <a class="navbar-brand" style = "font-size:30px; color:black;" href="{{ url('/') }}">
                      {{ config('app.name', 'TrackYourAssets') }}
                  </a>
      <ul class = "navbar-nav mr-autostyle" style="float:right;margin-right:50px;list-style-type:none;">
          <li class="nav-item">
            @auth
              <a class="navbar-brand" style="color:black;" href="\logout"><i class="fa fa-sign-out">Logout</i></a>                
            @endauth
            </li>
            @guest
            <li>
                <a class="nav-item" style="color:black;" href="\login"> </a>               
              </li>
            <li>
            <a class="nav-item" style="color:black;" href="\register"><i class="fa fa-user-plus">  Register</i></a>
          </li>
            @endguest
            
      </ul>

  </div>

  @auth
  @if (Auth::user()->role!=6)
  <div id="mySidenav" class="sidenav" style="width:230px;">
    <a href="/home"><i class="menu-icon fa fa-laptop">  Dashboard</i></a>
    <a href="/home/issue"><i class="fa fa-hand-stop-o" aria-gidden="true">  Issue Asset</i></a>
    @if(Auth::user()->role==0)
    <a href="/home/assignrole"><i class="fa fa-list-ul"> Assign Role</i></a>
    <a href="/home/changerole"><i class="fa fa-pencil-square-o">  Change Role</i></a>
    @endif
    @if(Auth::user()->role==4 || Auth::user()->role==5)
      <a href="/home/create"><i class="fa fa-plus" aria-gidden="true">  Add new asset to System</i></a>
    @endif
    @if(Auth::user()->role==1 || Auth::user()->role==2)
      <a href="/home/requestnewasset"><i class="fa fa-file-text-o" aria-gidden="true">  File Requests for Unavailable Asset</i></a>
    @endif
    @if(Auth::user()->role==3 || Auth::user()->role==4)
      <a href="/home/newassetrequests"><i class="fa fa-thumbs-o-up" aria-gidden="true">  Aprove Unavailable Asset Requests</i></a>
    @endif
    @if(Auth::user()->role==2)
        <a href="/home/requests"><i class="fa fa-bell-o" aria-gidden="true"> Grant Asset</i></a>
        <a href="/home/return"><i class="fa fa-arrow-circle-left">  Return Assets</i></a>
    @endif
    @if(Auth::user()->role == 1 || Auth::user()->role == 2)
    <a href="/home/file"><i class="fa fa-exclamation" aria-hidden="true">  Report a problem</i></a>
    @endif
    @if(Auth::user()->role==3 || Auth::user()->role==4 || Auth::user()->role==5)
        <a href="/home/viewissues"><i class="fa fa-exclamation-circle" aria-gidden="true">  See User Problems</i></a>
    @endif
    @if(Auth::user()->role==5 || Auth::user()->role==4)
        <a href="/home/purchase"><i class="fa fa-shopping-cart" aria-gidden="true">  Place Order For current assets</i></a>
    @endif
    @if(Auth::user()->role==5)
        <a href="/home/ordersRecieved"><i class="fa fa-tasks" aria-gidden="true">  Order Status </i></a>
    @endif
    <hr style="margin-left:7.5%;width:85%">
    <a href="/home/edit"><i class="fa fa-pencil" aria-gidden="true"> Edit Profile</i></a>
  </div>
@endif
  @endauth

  <div id="maincontent" style="width:100%;transition : 0.5s;margin-left:230px;margin-top:50px;">
  @include('layouts.messages')
  @yield('content')
  </div>



  <script>
      $(document).ready(function() {
      //Preloader
      $(window).on("load", function() {
      preloaderFadeOutTime = 500;
      function hidePreloader() {
      var preloader = $('.spinner-wrapper');
      preloader.fadeOut(preloaderFadeOutTime);
      }
      hidePreloader();
      });
      });
      </script>
  </body>
</html>
