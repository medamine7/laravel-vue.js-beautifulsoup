@extends('layouts.app')

@section("title", __("navbar.leagues"))

@section('content')
    <div class="container {{__('navbar.page-direction')}}">
        <table class="leagues-page-table">
            @foreach ($leagues as $category)
                <tr><td><a href="leagues/{{$category->category_name}}">{{$category->category_name}}</a></td></tr>
            @endforeach
        </table>
        
    </div>
@endsection
    
