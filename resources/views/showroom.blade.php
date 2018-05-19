@extends("layouts.app")


@section("title", $video->heading )


@section('facebook-script')
<div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v3.0&appId=449660888779943&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@endsection

@section("content")
    <div class="adv-wide"></div>
    <div class="showroom-container {{__('navbar.page-direction')}}">
        <div class="video-container">
            {!!$video->body!!}
        </div>
        <h2 class="video-heading">{{$video->heading}}</h2>
        <div class="video-meta">
            <p><span>{{$video->category->category_name}}</span> <i class="far fa-calendar-alt"></i>{{$video->created_at->format("d/m/Y")}} <i class="far fa-clock"></i> {{$video->created_at->format("H:i")}}</p>        
        </div>
        <hr>
        <h3 class="other-videos">{{__('indicators.other-videos')}}</h3>
        <div class="showroom-suggestions-container">
            @foreach ($suggestions as $video)
            <div class="small-video-card video-card">
                <div class="video-thumbnail-container">
                    <img src="/storage/{{$video->image}}" alt="">
                </div>
                <div class="title-n-button">
                    <h3>{{$video->heading}}</h3>
                    <a class="watch-button" href="/{{$video->lang}}/video/{{$video->slug}}"><i class="fas fa-play-circle"></i>{{__("buttons.watch")}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="showroom-container">
        <div class="white-box facebook-box">
            <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5"></div>        
        </div>
    </div>
@endsection