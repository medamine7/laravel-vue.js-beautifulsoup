<!--
    
    
                         created by :
 
 ________      ________      ___           ________      ________      ___     
|\   __  \    |\   __  \    |\  \         |\   __  \    |\   ___ \    |\  \    
\ \  \|\ /_   \ \  \|\  \   \ \  \        \ \  \|\  \   \ \  \_|\ \   \ \  \   
 \ \   __  \   \ \   __  \   \ \  \        \ \   __  \   \ \  \ \\ \   \ \  \  
  \ \  \|\  \   \ \  \ \  \   \ \  \____    \ \  \ \  \   \ \  \_\\ \   \ \  \ 
   \ \_______\   \ \__\ \__\   \ \_______\   \ \__\ \__\   \ \_______\   \ \__\
    \|_______|    \|__|\|__|    \|_______|    \|__|\|__|    \|_______|    \|__| 


                            Mohamed Amine

                            instagram : @_mab7

                                                                                                                                        


    
-->

<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="fb:admins" content="{1838137385}"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Al-Batal</title>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.css')}}">    
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
</head>

<body>
    @yield('facebook-script')
    <div id="app" >
        <div id="overlay">
            <div class="loader"></div>
        </div>
        <sub-alert invalid-email="{{__('sub-alert.invalid_email')}}" lang=" {{app()->getLocale()}} " subscribe-email-placeholder=" {{__('sub-alert.subscribe_email_placeholder')}} " subscribe-btn-text=" {{__('sub-alert.subscribe_btn_text')}} " subscribe-msg=" {{__('sub-alert.subscribe_msg')}} "></sub-alert>
        <div class="header {{__('navbar.page-direction')}}">
            <div class="links">
                <ul>
                    <li><a href=""><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter-square"></i></a></li>
                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                </ul>
                <div class="lang">
                    <a href="/ar"><h5>العربية</h5></a>
                    <a href="/en"><h5>English</h5></a>
                </div>
            </div>
            <div class="logo-container">
                <span class="logo"><a href="/"><img src="{{asset('images/logo.png')}}" alt="LOGO"></a></span>
                <img class="ad-wide" src="{{asset('images/ad-wide.png')}}" alt="">
            </div>
            <div class="navbar">
                <ul>
                    <a href="/" class="logo-scrolled"><li class="borderless"><img class="notwow" src="{{asset('images/logo.png')}}" alt="LOGO"></li></a>
                    <a href="/"><li>{{__("navbar.home")}}</li></a>
                    <a href="/leagues"><li>{{__("navbar.leagues")}}</li></a>
                    <a href=" {{route('videosRoute')}} "><li>{{__("navbar.videos")}}</li></a>
                    <a href=""><li>{{__("navbar.matches")}}</li></a>
                </ul>
                <div class="mobile-nav-container">
                    <a href="/" class="mobile-logo"><img src="{{asset('images/logo.png')}}" alt="LOGO"></a>
                    <menu-hamburger></menu-hamburger>
                    <div class="mobile-sidebar">
                        <ul>
                            <a href="/"><li>{{__("navbar.home")}}</li></a>
                            <a href="/leagues"><li>{{__("navbar.leagues")}}</li></a>
                            <a href=" {{route('videosRoute')}} "><li>{{__("navbar.videos")}}</li></a>
                            <a href=""><li>{{__("navbar.matches")}}</li></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-fix"></div>        
        @yield('content')
    </div>
    <footer class="{{__("navbar.page-direction")}}">
        <ul>
            <li><a href="">{{__("footer.aboutus")}}</a></li>
            <li><a href="">{{__("footer.privacy")}}</a></li>
            <li><a href="">{{__("footer.service")}}</a></li>
            <li><a href="">{{__("footer.contact")}}</a></li>
        </ul>
        <div class="copyright"><p>{{__("footer.copyright")}}</p></div>   
    </footer>

    
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/owl.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>

    <script>

        new WOW().init();
        $("img:not(.notwow)").addClass("wow fadeIn");
        
        $(document).ready(function(){
                
            setTimeout(function(){
                $(document.body).css("overflow-y","visible");
                $("#overlay").fadeOut(500,function(){
                    this.remove();
                });

            },2000);
            
              $('.owl-carousel').owlCarousel({
                items:3,
                loop:true,
                margin:15,
                autoplay:true,
                autoplaySpeed:1000,
                autoplayTimeout:6000,
                autoplayHoverPause:true
            });
            
            
            $(document).scroll(function(){
                if($(document).scrollTop()>=140){
                    $('.logo-scrolled').show();
                    $('.navbar').addClass("navbar-scrolled");
                    $('.mobile-sidebar').css("position","fixed");
                    $('.space-fix').css("padding-top","53px");
                    $(".mobile-logo img").fadeIn();
                }else{
                    $(".mobile-logo img").hide();
                    $('.space-fix').css("padding-top","0");
                    $('.logo-scrolled').hide();
                    $('.navbar').removeClass("navbar-scrolled");
                    $('.mobile-sidebar').css("position","absolute");
                }
            });
      

            $(".widget-menu").click(function(){
                $(".mobile-sidebar").toggleClass("mobile-sidebar-show");
            });
        });
        

    </script>

</body>
</html>