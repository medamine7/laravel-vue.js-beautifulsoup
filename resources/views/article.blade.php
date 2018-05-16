@extends('layouts.app')

@section("title",$article->heading)

@section("facebook-script")
<div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v3.0&appId=449660888779943&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@endsection

@section('content')

<div class="article-box-container">
    <div class="article-box">
        <div class="white-box">
            <h2>{{$article->heading}}</h2>
            <hr>
            <div class="article-meta">
                <p><span>{{$article->category->category_name}}</span> <i class="far fa-calendar-alt"></i>{{$article->created_at->format("d/m/Y")}} <i class="far fa-clock"></i> {{$article->created_at->format("H:i")}}</p>
            </div>
            <img src="/storage/{{$article->image}}" alt="">
            {!!$article->body!!}
        </div>
        <div class="white-box facebook-box">
            <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5"></div>        
        </div>
    </div>
    <div class="suggestions">
        <img class="ad-tall" src="{{asset('images/ad-tall.jpg')}}" alt="">                
        <div class="indicator  small-indicator"><h1>{{__("indicators.recommended")}}</h1></div>  
        <small-card :key="article.article_id" v-for="article in {{$suggestions}}" :article="article"></small-card>
    </div>
</div>  

    
@endsection
    
