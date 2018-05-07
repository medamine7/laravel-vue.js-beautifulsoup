@extends('layouts.app')

@section('content')

<videos :isload="true" indicator="{{__("indicators.videos")}}" watch="{{__("buttons.watch")}}" load="{{__("buttons.load")}}" more="{{__("buttons.more")}}"></videos>

@endsection
    
