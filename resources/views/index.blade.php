@extends('layouts.app')

@section("title", __("navbar.home"))

@section('content')
<div class="container">
        <div class="indicator"><h1>{{__("indicators.featured")}}</h1></div>
        <headlines @cardclicked="getContent($event)" :articles="{{$articles}}" page-direction="{{__("navbar.page-direction")}}"></headlines>
    </div>
    <div class="indicator"><h1>{{__("indicators.latest")}}</h1></div>
    <div class="latest">
        <carousel @cardclicked="getContent($event)" :articles="{{$articles}}"></carousel>
    </div>
    <div class="videos">
        <videos category="{{$category}}" :isload="false" route="{{route('videosRoute')}}" page-direction="{{__("navbar.page-direction")}}" indicator="{{__("indicators.videos")}}" watch="{{__("buttons.watch")}}" more="{{__("buttons.more")}}"><videos>
    </div> 
    <div class="leagues-rank-container {{__("navbar.page-direction")}}">
        <div class="indicator"><h1>{{__("indicators.ranking")}}</h1></div>
        <div class="leagues-rank">
            <div class="league-btn-container">
                <button class="pl-btn" :class="{'active-tab' : activeTab==1}"  @click.stop="switchLeague('pl',1)"><img src="{{asset('images/pllogo.png')}}" alt="">{{__("buttons.epl")}}</button>
                <button class="laliga-btn" :class="{'active-tab' : activeTab==2}" @click.stop="switchLeague('laliga',2)"><img src="{{asset('images/laligalogo.png')}}">{{__("buttons.laliga")}}</button>
                <button  class="seriea-btn" :class="{'active-tab' : activeTab==3}" @click.stop="switchLeague('seriea',3)"><img src="{{asset('images/seriealogo.png')}}">{{__("buttons.seriea")}}</button>
                <button  class="botolapro-btn" :class="{'active-tab' : activeTab==4}" @click.stop="switchLeague('botolapro',4)"><img src="{{asset('images/botolalogo.png')}}">{{__("buttons.botola")}}</button>
            </div>
            <div class="tables-container">
                <league-rank rank='{{__("ranktable.rank")}}' played='{{__("ranktable.played")}}' team='{{__("ranktable.team")}}' points='{{__("ranktable.points")}}' :teams="{{$pl_rank}}" v-if="league=='pl'"></league-rank>
                <league-rank rank='{{__("ranktable.rank")}}' played='{{__("ranktable.played")}}' team='{{__("ranktable.team")}}' points='{{__("ranktable.points")}}' :teams="{{$laliga_rank}}" v-if="league=='laliga'"></league-rank>
                <league-rank rank='{{__("ranktable.rank")}}' played='{{__("ranktable.played")}}' team='{{__("ranktable.team")}}' points='{{__("ranktable.points")}}' :teams="{{$seriea_rank}}" v-if="league=='seriea'"></league-rank>
                <league-rank rank='{{__("ranktable.rank")}}' played='{{__("ranktable.played")}}' team='{{__("ranktable.team")}}' points='{{__("ranktable.points")}}' :teams="{{$botola_rank}}" v-if="league=='botolapro'"></league-rank>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="indicator"><h1>{{__("indicators.more")}}</h1></div>
        <headlines page-direction="{{__("navbar.page-direction")}}" @cardclicked="getContent($event)" :articles="{{$more_articles}}"></headlines>
    </div>
    
    @endsection
    
