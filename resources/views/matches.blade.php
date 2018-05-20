@extends('layouts.app')

@section("title",__("navbar.matches"))


@section('content')
<div class="indicator"><h1>{{__("indicators.today_matches")}}</h1></div>    
<div class="container matches-container {{__('navbar.page-direction')}}">
    @foreach($leagues as $name => $league)
    <h4 class="matches-league-name">{{$name}}</h4>
    <div class="matches-wrapper">
        @foreach($league as $match)
        
        <div class="match-box"> 
            <p>
                <span class="match-time">{{date("H:i",strtotime($match->time))}}</span><span>{{$match->home_team}}</span>
                @if($match->home_team_score and $match->away_team_score )
                <span class="score-container"><span class="score">{{$match->home_team_score}}</span><span class="score">{{$match->away_team_score}}</span></span>
                @else
                <span class="vs">vs</span>
                @endif
                <span>{{$match->away_team}}</span>
            </p>
        </div>
        @endforeach
        
    </div>
    @endforeach
</div>

@endsection