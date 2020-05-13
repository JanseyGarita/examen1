@extends('layout.layout')

@section('content')
<div class="container body-content">
    <div class="row form container">
        <form action="" method="post">

        </form>
    </div>
    <div class="row video-cards-container">
        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-image">
                    <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/APjVO-COYog" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i
                            class="material-icons">delete</i></a>
                </div>
                <div class="card-content">
                    @php
                    echo get_video_name('APjVO-COYog');
                    @endphp
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@php
    function get_video_name($video_id){
    $title = explode('</title>',explode('<title>',file_get_contents("https://www.youtube.com/watch?v=".$video_id))[1])[0];
        echo substr($title,0,-10);
    }
@endphp