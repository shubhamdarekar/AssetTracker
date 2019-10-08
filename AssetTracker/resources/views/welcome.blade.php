<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','TrackYourAssets')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: transparent;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                margin: 0;
            }

            .title {
                font-size: 84px;
            }

            .card{
                position: relative;
                width:100%;
                height: 100%;
                transition: all 0.8s linear;
                transform-style: preserve-3d;
                border-radius: 45px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom:0%;
            }

            .front, .back {
                position: absolute;
                width: 100%;
                height: 100%;
                backface-visibility: hidden;
            }

            .front{
                z-index: 2;
                transform: rotateY(0deg);
                box-shadow: 5px 5px 5px #555;
            }

            .container:hover .card{
                transform: rotateY(180deg);
                box-shadow: -5px 5px 5px #555;
            }

            .back {
                display: block;
                transform: rotateY(-180deg);
                box-sizing: border-box;
                padding: 10px;
                color: white;
                text-align: center;
                background-color: rgba(52, 165, 217,0.8);
                backface-visibility: hidden;
                transform: rotateY(180deg);
                text-align: center;
                line-height: 31px;
                font-family: 'Titillium Web', sans-serif;
            }
        
            .container{
                margin: 100px auto;
                width: 350px;
                height: 300px;
                perspective: 1000px;
                background-color: transparent;
            }

            img{
                height:600px;
                margin-left: 10%;
            }

            .vl{
                border-left: 3px solid darkgray;
                height: 500px;
                margin-left: 9%;
                margin-top: 2.5%;
            }

            #secondpart{
                margin-top: 5%;
            }

            .row{
                background-color: transparent;
            }

            .nav-item{
                margin-right: 20%;
            }

            .nav-link{
                color:black;
                height:30px;
            }
        </style>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <nav class="navbar navbar-expand-sm fixed-top" style="background-color: rgba(52, 165, 217,1)">  
            <ul class="navbar-nav">
                @if(Route::has('login'))
                    @auth
                        <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        </li>
                        @else
                        <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}">Login</a>
                        </li>
                            @if(Route::has('register'))
                                <li class="nav-item">
                                <a class="nav-link" href="{{ url('register') }}">Register</a>
                                </li>
                            @endif
                    @endauth
                @endif
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>    
            </ul>
        </nav>
              
        <div class="row" style="margin-top:8%;width:100%">
            <h1 style="text-align:center;font-size: 100px;margin-top: 12%;margin-left: 6%">TrackYourAssets</h1>
            <div class="vl"></div>
            <img src="images/landing.png" alt="photo" class="rounded-circle img-responsive">    
        </div>
        <div id="row">
            <div class="row" style="margin-top: 3%">
                <div class="container col-lg-5">
                    <div class="card card-block d-flex">
                        <div class="front face">
                            <div class="card-body align-items-center d-flex justify-content-center">
                                <img src="/images/download.png" alt="photo" style="height:150px;margin-top:6%;">
                                <h1 style="margin-top: 6%">One stop to manage your assets</h1>
                            </div>
                        </div>
                        <div class="back face">
                            <br><br><br><br>
                            <h3>With systematic information of the assets possessed</h3>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="container col-lg-5 col-lg-offset-0">
                    <div class="card card-block d-flex">
                        <div class="front face">
                            <div class="card-body align-items-center d-flex justify-content-center">
                                <img src="/images/manageyourassets.png" alt="photo" style="height: 150px;margin-top:6%">
                                <h1 style="margin-left: 6%;margin-top: 7%">Keep track of the assets given</h1>
                            </div>
                        </div>
                        <div class="back face">
                            <br><br><br><br>
                            <h3>With this efficient tracking system</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 0%">
                <div class="container col-lg-5 col-lg-offset-0">
                    <div class="card card-block d-flex">
                        <div class="front face">
                            <div class="card-body align-items-center d-flex justify-content-center">
                                <img src="/images/inventory.png" alt="photo" style="height: 200px;margin-top: 4%">  
                                <h1 style="margin-top: 6%">Real-time Inventory Check</h1>
                            </div>
                        </div>
                        <div class="back face">
                            <br><br><br>
                            <h3>Get an up-to-date status of the inventory</h3>
                        </div>
                    </div>
                </div>
                <div class="container col-lg-5 col-lg-offset-0">
                        <div class="card card-block d-flex">
                            <div class="front face">
                                <div class="card-body align-items-center d-flex justify-content-center">
                                    <img src="/images/time.png" alt="photo" style="height: 200px">  
                                    <h2>Easy way to obtain assets</h2>
                                </div>
                            </div>
                            <div class="back face">
                                <br><br><br><br>
                                <h3>This saves time!</h3>
                            </div>
                        </div>
                    </div>
            </div>
        </div>    
    </body>
</html>
