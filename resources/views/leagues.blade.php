@extends('layouts.app')


@section('content')
    <div class="container">
        <table class="leagues-page-table">
            @foreach ($leagues as $category)
                <tr><td><a href="{{route('league_chosen',['lang'=>'en','choice'=> $category->category_name])}}">{{$category->category_name}}</a></td></tr>
            @endforeach
        </table>
        
    </div>
@endsection
    
