@extends('layouts.app')


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
        <div class="adv"></div>        
        <div class="indicator  small-indicator"><h1>{{__("indicators.recommended")}}</h1></div>  
        <small-card :key="article.article_id" v-for="article in {{$suggestions}}" :article="article"></small-card>
    </div>
</div>

    
@endsection
    
