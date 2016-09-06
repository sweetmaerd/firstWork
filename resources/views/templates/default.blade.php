<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>THEMELOCK.COM - Retail Only Themes & Templates</title>

    <link rel="stylesheet" type="text/css" media="print" href={{asset('css/print.css')}}  />

    <link rel="stylesheet" type="text/css" media="screen" href={{asset('css/prettyPhoto.css')}} />

    <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:light' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Just+Another+Hand' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" media="screen" href={{asset('css/main.css')}} />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" media="screen" href="css/ie-fix.css" /><![endif]-->


    <script type="text/javascript" src={{asset("js/jquery-1.5.2.min.js")}}></script>

    <script type="text/javascript" src={{asset("js/jquery.tweet.js")}}></script>

    <script type="text/javascript" src={{asset("js/jquery.ScrollTo.js")}}></script>

    <script type="text/javascript" src={{asset("js/jquery.prettyPhoto.js")}}></script>

    <script type="text/javascript" src={{asset("js/jquery.easing.1.3.js")}}></script>

    <script type="text/javascript" src={{asset("js/jquery.quicksand.js")}}></script>

    <script type="text/javascript" src={{asset("js/jquery.quicksand-config.js")}}></script>

    <script type="text/javascript" src={{asset("js/scripts.js")}}></script>



</head>
<body>

<div id="page-shadow">

    <div id="page">

        <div class="content-innertube">
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if(!Auth::user())
                <li><a  href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-log-in">Войти</span></a></li>
                <li><a  href="{{ url('/auth/register') }}"><span class="glyphicon glyphicon-user">Зарегистрироваться</span></a></li>
                @else
                <li>Привет {{Auth::user()->name}}<a  href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-log-out">выйти?</span></a></li>
                @endif
            </ul>
            <div id="header">


                <span><h1>BelHard work</h1></span>
                <ul id="main-nav">
                    <li class="current"><a href={{url("/content")}}>Контент</a></li>
                    <li class="current"><a href={{url("/home")}}>Кабинет пользователя</a></li>
                    <li class="current"><a href={{url("/admin")}}>Админка</a></li>
                </ul>
                <div class="clear"></div>

            </div><!-- header end -->

            <div id="text"><img src={{asset('img/resume.png')}} alt="" title=""></div>
            <div id="stripe"></div>
            <div class="clear"></div>

            @yield('content')

        </div><!-- content-innertube end -->
        <div class="clear"></div>

        <div id="footer">

            <div id="footer-innertube">

                <div id="footer-address">
                    <h5>Address</h5>
                    <ul>
                        <li>4 Melnikaite st.</li>
                        <li>Minsk</li>
                        <li>Belarus</li>

                    </ul>
                </div><!-- footer-address end -->

                <div id="footer-contact">
                    <h5>Contact</h5>
                    <ul>
                        <li>+375(33)6878674</li>
                        <li><a href="mailto:#" title="Send me an email">sweetmaerd@gmail.com</a></li>
                        <li><a href="/contact">Contact form<span class="raquo">&#187;</span></a></li>
                    </ul>
                </div><!-- footer-contact end -->

                <div id="footer-social">
                    <h5>Social</h5>
                    <ul>
                        <li><a href="#" title=""><img src={{asset("img/twitter.png")}} alt="twitter" title="My Twitter profile"></a></li>
                        <li><a href="#" title=""><img src={{asset("img/facebook.png")}} alt="facebook" title="My Facebook profile"></a></li>
                        <li><a href="#" title=""><img src={{asset("img/flickr.png")}} alt="flickr" title="My Flickr profile"></a></li>
                        <li><a href="#" title=""><img src={{asset("img/linkedin.png")}} alt="linkedin" title="My Linkedin profile"></a></li>
                    </ul>
                </div><!-- footer-social end -->

                <div id="footer-resume">
                    <h5>My resume</h5>
                    <div id="download-resume">
                        <a href="#"></a></div>
                </div><!-- footer-resume end -->

                <div class="clear"></div>

                <ul id="footer-nav">
                    <li><a href={{url("/resume")}}>Resume</a></li>
                    <li><a href={{url("/portfolio")}}>Portfolio</a></li>
                    <li><a href={{url("/about")}}>About me</a></li>
                    <li><a href={{url("/contact")}}>Contact</a></li>
                </ul>


                <div id="go-top"></div>

                <div class="clear"></div>

            </div><!-- footer-innertube end -->

        </div><!-- footer end -->

    </div><!-- page end -->

</div><!-- page-shadow end -->

</body>
</html>