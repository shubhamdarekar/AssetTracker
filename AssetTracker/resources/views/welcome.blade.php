<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <title>{{config('app.name','TrackYourAssets')}}</title>
        <!-- Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>  --}}
        <script src="{{asset('js/jquery.localscroll.js')}}" type="text/javascript"></script> 
        <script src="{{asset('js/jquery.scrollTo.js')}}" type="text/javascript"></script> 
        <script>
        $(document).ready(function() {
        $(window).scroll(function() {
            if ($(document).scrollTop() > 270) {
            $("#myid").addClass("myitem2");
            $("#myid").removeClass("myitem");
            } else {
            $("#myid").addClass("myitem");
            $("#myid").removeClass("myitem2");
            }
        });
        });
        </script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{asset('fontawesome-free-5.11.2-web/css/fontawesome.css')}}" rel="stylesheet">
        <link href="{{asset('fontawesome-free-5.11.2-web/css/brands.css')}}" rel="stylesheet">
        <link href="{{asset('fontawesome-free-5.11.2-web/css/solid.css')}}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                margin: 0;
                background-repeat: no-repeat;
                background-size: 1920px 1080px;
                background-attachment: fixed;
                overflow-x: hidden;
            }

            .title {
                font-size: 84px;
            }

            .card{
                position: relative;
                width:100%;
                height: 100%;
                transition: all 0.3s linear;
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
            }
            @media only screen and (min-width: 1500px){
            .vl{
                border-left: 3px solid darkgray;
                height: 500px;
                margin-left: 9%;
                margin-top: 2.5%;
            }
            .mainheading{
                margin-left: 6%; 
                text-align:center;
                font-size: 90px;
                margin-top: 12%;
                -webkit-transition: font-size 1s;
                -webkit-transition: margin-top 1s;
            }
            img
            {
                margin-left: 10%;
            }
            .imageparent{
                width:auto;
                align-content: center;
                align-items: center;
            }
            }
            @media only screen and (max-width: 1500px){
                .mainheading{
                margin-left: 0%; 
                text-align:center;
                font-size: 60px;
                margin-top: 0%;
                width: 100%;
                -webkit-transition: font-size 1s;
                -webkit-transition: margin-top 1s;
            } 
            .imageparent{
               width: 100%;
               align-self: center!important;
               align-content: center!important;
               align-items: center!important;
            }
            img
            {
                align-self: center!important;
                text-align: center!important;
                margin-left: auto;
                margin-right: auto;
                display: block;

            }
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
            .myitem{
                font-size: 0px;
                width:0px;
                transition:all 0.2s ease-in;
               
            }
            .myitem2{
                padding-top: 0%!important;
                font-size: 25px;
                width:155px;
                vertical-align: -webkit-baseline-middle;
                transition:all 0.2s ease-in;
                padding-bottom: 10px;
                
            }
            .sk-chase {
                position: absolute;
            top: 48%;
            left: 48%;
        width: 40px;
        height: 40px;
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
        .our-team{
    text-align: center;
    transition: all 0.5s ease 0s;
        }
        .our-team:hover{
            box-shadow: 0 15px 10px -10px rgba(0, 0, 0, 0.5), 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
        }
        .our-team .pic{
            overflow: hidden;
            position: relative;
        }
        .our-team .pic:before,
        .our-team .pic:after{
            content: "";
            width: 200%;
            height: 80%;
            background: rgba(38,37,37,0.8);
            position: absolute;
            top: -100%;
            left: -4%;
            transform: rotate(45deg);
            transition: all 0.5s ease 0s;
        }
        .our-team .pic:after{
            background: rgba(52, 165, 217,0.8);
            top: auto;
            left: auto;
            bottom: -100%;
            right: -4%;
        }
        .our-team:hover .pic:before{ top: 0; }
        .our-team:hover .pic:after{ bottom: 0; }
        .our-team .pic img{
            width: 100%;
            height: auto;
        }
        .our-team .social{
            width: 100%;
            padding: 0;
            margin: 0;
            list-style: none;
            position: absolute;
            bottom: 45%;
            left: 0;
            opacity: 0;
            z-index: 2;
            transition: all 0.5s ease 0.3s;
        }
        .our-team:hover .social{ opacity: 1; }
        .our-team .social li{ display: inline-block; }
        .our-team .social li a{
            display: block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            font-size: 20px;
            color: #fff;
            margin-right: 10px;
            position: relative;
            transition: all 0.3s ease 0s;
        }
        .our-team .social li a:after{
            content: "";
            width: 100%;
            height: 100%;
            background: #db162f;
            border-radius: 0 20px 20px 20px;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            transition: all 0.3s ease 0s;
        }
        .our-team .social li a:hover:after{ transform: rotate(180deg); }
        .our-team .team-content{ padding: 20px; }
        .our-team .title{
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 2px;
            color: rgba(52, 165, 217,1);
            text-transform: uppercase;
            margin-bottom: 7px;
        }
        .our-team .post{
            display: block;
            font-size: 17px;
            font-weight: 600;
            color: #707070;
            text-transform: capitalize;
        }
        @media only screen and (max-width: 990px){
            .our-team{ margin-bottom: 30px; }
        }
        </style>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body background="/images/download.jfif">
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
        <nav class="navbar navbar-expand-sm fixed-top" style="background-color: rgba(52, 165, 217,1)">  
            <div class="container-fluid">
            <button class="navbar-toggler hidden-md-up pull-right" type="button" data-toggle="expand" data-target="#navbar2"> ☰ </button>
                    

                            <a id ="myid" class="nav-item myitem" style="padding:0%; color:black; margin-right:5%" href="#top">TrackYourAssets</a>
                <div class="collapse navbar-expand-sm navbar-collapse justify-content-between" id="navbar2">
                        <div class="navbar-nav">
                @if(Route::has('login'))
                    @auth
                        <a class="nav-item nav-link" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="nav-item nav-link" href="{{ url('login') }}">Login</a>
                            @if(Route::has('register'))
                                <a class="nav-item nav-link" href="{{ url('register') }}">Register</a>
                            @endif
                    @endauth
                @endif
                    <a class="nav-item nav-link" href="#about">About</a>

                    <a class="nav-item nav-link" href="#contact">Team</a>
                    </div>
                @auth
                <div class="navbar-nav">
                        <a class="nav-item nav-link" href="\logout">LogOut</a>
                </div> 
                @endauth
                </div>
            </div>
        </nav>
              
        <div class="row" id ='top' style="margin-top:8%;width:100%">
            <h1 class = "mainheading" >TrackYourAssets</h1>
            <div class="vl"></div>
            <div class = "imageparent">
                <img src="images/landing.png" alt="photo" class="img-responsive">  
            </div>  
        </div>
        <div id="about">
            <div class="row" style="margin-top: 3%; margin-right:0%">
                <div class="container col-lg-5">
                    <div class="card card-block d-flex">
                        <div class="front face">
                            <div class="card-body align-items-center d-flex justify-content-center">
                                <img src="/images/download.png" alt="photo" style="height:150px;margin-top:6%;">
                                <h1 style="margin-top:6%">One stop to manage your assets</h1>
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
            <div class = "col-lg-12" id="contact">
                <div style="background-color:#191919; width:100%; height:750px">
                    <div style="-ms-flex-align: center;
                    align-items: center;
                    display: -ms-flexbox;
                    display: flex;
                    -ms-flex-pack: center;
                    justify-content: center;
                    font-size: 40px;
                    color:white;">
                        Our Team
                    </div>
                    <div class='container' style="margin-top:0%;height:500px">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="our-team">
                                        <div class="pic">
                                            <img src="images/img-1.jpg">
                                            <ul class="social">
                                                <li><a href="#" class="fab fa-facebook"></a></li>
                                                <li><a href="https://www.instagram.com/daarekar/" class="fab fa-instagram"></a></li>
                                                <li><a href="#" class="fab fa-linkedin"></a></li>
                                            </ul>
                                        </div>
                                        <div class="team-content">
                                            <h3 class="title">Shubham</h3>
                                            <span class="post">Member</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="our-team">
                                        <div class="pic">
                                            <img src="images/img-2.jpg">
                                            <ul class="social">
                                                <li><a href="#" class="fab fa-facebook"></a></li>
                                                <li><a href="https://www.instagram.com/narayanipatil/" class="fab fa-instagram"></a></li>
                                                <li><a href="#" class="fab fa-linkedin"></a></li>
                                            </ul>
                                        </div>
                                        <div class="team-content">
                                            <h3 class="title">Narayani</h3>
                                            <span class="post">Member</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                        <div class="our-team">
                                            <div class="pic">
                                                <img src="images/img-3.jpg">
                                                <ul class="social">
                                                    <li><a href="#" class="fab fa-facebook"></a></li>
                                                    <li><a href="https://www.instagram.com/p_sparsh999/" class="fab fa-instagram"></a></li>
                                                    <li><a href="#" class="fab fa-linkedin"></a></li>
                                                </ul>
                                            </div>
                                            <div class="team-content">
                                                <h3 class="title">Sparsh</h3>
                                                <span class="post">Member</span>
                                            </div>
                                        </div>
                                    </div> 
                            </div>
                        </div>

                        <div style="color:white;text-align:center;font-size:14px;">Copyright © 2019. All Rights Reserved.</div> 
                    </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
               $.localScroll({duration:800});
            });
            </script>
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
