@extends('layouts.app')

@section("title",__("navbar.matches"))


@section('content')
<div class="container">
    <div class="indicator"><h1>{{__("indicators.today_matches")}}</h1></div>    
    <div class="matches-container {{__('navbar.page-direction')}}">
        @foreach($matches as $match)
        
        <div class="match-box"> 
            <p><span class="match-time">{{date("H:i",strtotime($match->time))}}</span> {{$match->home_team}}
                @if($match->home_team_score)
                <span class="score">{{$match->home_team_score}}</span><span class="score">{{$match->away_team_score}}</span>
                @else
                <span class="vs">vs</span>
                @endif
            {{$match->away_team}}</p>
        </div>
        @endforeach
        
    </div>
</div>

@endsection