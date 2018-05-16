@extends('layouts.app')
@section("title", __("navbar.videos"))

@section('content')
    <div class="adv-wide"></div>    
    <videos category="all" page-direction="{{__("navbar.page-direction")}}" :isload="true" indicator="{{__("indicators.videos")}}" watch="{{__("buttons.watch")}}" load="{{__("buttons.load")}}" more="{{__("buttons.more")}}"></videos>

@endsection
    
