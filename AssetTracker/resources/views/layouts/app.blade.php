<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/app2.css')}}">
  <link rel="stylesheet" href="{{ asset('css/app3.css')}}">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <style>
        body {
          font-family: "Lato", sans-serif;
        }
        
        .sidenav {
          height: 100%;
          width: 0px;
          position: fixed;
          z-index: 1;
          top: 15;
          left: 0;
          background-color: #005073;
          overflow-x: hidden;
          transition: 0.5s;
          padding-top: 60px;
        }
        
        .sidenav a {
          padding: 8px 8px 8px 32px;
          text-decoration: none;
          font-size: 25px;
          color: blue;
          display: block;
          transition: 0.3s;
        }
        
        .sidenav a:hover {
          color: black;
        }
        
        .sidenav .closebtn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
          margin-left: 50px;
        }
        
        @media screen and (max-height: 450px) {
          .sidenav {padding-top: 10px;}
          .sidenav a {font-size: 18px;}
        }
        </style>

<script>
    function openNav() {
        console.log(document.getElementById("mySidenav").style.width)
        if(document.getElementById("mySidenav").style.width == "15%"){
            document.getElementById("mySidenav").style.width = "0px";
            document.getElementById("maincontent").style.marginLeft = "0%";
            document.getElementById("maincontent").style.width = "100%";
            ;
            
        }else{
            document.getElementById("mySidenav").style.width = "15%";
            document.getElementById("maincontent").style.marginLeft = "15%";
            document.getElementById("maincontent").style.width = "85%"
            
        }
      
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
            document.getElementById("maincontent").style.width = "100%";
            document.getElementById("maincontent").style.marginLeft = "0%";
    }
    </script>

<div class="w3-bar w3-blue" style = " height: 50px;">
@auth
  <span class="w3-bar-item w3-button" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776</span>
@endauth
    <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'TrackYourAssets') }}
                </a>
    <ul class = "navbar-nav mr-autostyle" style="float:right;margin-right:50px;list-style-type:none;">
        <li class="nav-item">
            <a class="navbar-brand" href="/logout">Logout</a>
          </li>
    </ul>
    
 {{-- <a href="\" class="w3-bar-item w3-button">Home</a>  --}}
   {{-- <a href="#" class="w3-bar-item w3-button">Login</a>
  <a href="#" class="w3-bar-item w3-button">Register</a> --}}
  
</div>

@auth
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  @yield('sidenav')
</div>
@endauth

<div id="maincontent" style="width:100%;transition : 0.5s;">
@yield('content')
</div>



   
<!-- <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
  <a href="#" class="w3-bar-item w3-button">Link 1</a>
</div>

<div class="w3-main" style="margin-left:200px">
<div class="w3-white">
  <button class="w3-button w3-xlarge w3-hide-large" onclick="w3_open()"></button>
  </div>

</div>

<script>
function w3_open() 
{
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script> -->
</body>
</html>
