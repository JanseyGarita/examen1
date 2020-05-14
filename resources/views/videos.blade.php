@extends('layout.layout')

@section('content')
<div class="container body-content mt-2">
    <div class="row form container">
        <form method="POST" action="{{ route('insert_video') }}">
            {{ csrf_field() }}
            <div class="card">

                <?php

                    if(true){
                        ?>
                <div class="card-content p-2">
                    <h5 class="center-align">Agregar videos</h5>
                    <div class="input-field mt-2">
                        <input type="url" id="video_url" name="url">
                        <label for="video_url">YouTube URL</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">
                        Agregar
                        <i class="material-icons right">save</i>
                    </button>
                    <?php
                }else{
    ?>
                    <div class="card-body flex-center p-2" style="flex-direction: column;">
                        <h4 style="margin-top: 1em">Jansey Garita</h4>
                        <p>88888888 | janseygarita@gmail.com</p>

                        <?php
                }
    ?>
                    </div>
                </div>
        </form>
    </div>

    <div class="row video-cards-container">
        <?php

foreach ($videos as $v) {

    ?>
        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-image">
                    <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$v['url']?>"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>

                    <a href="delete_video/<?=$v['id_video']?>/delete"
                        class="btn-floating halfway-fab waves-effect waves-light red">
                        <i class="material-icons">delete</i><!-- $v['id_video'] -->
                    </a>


                </div>
                <div class="card-content">
                    @php
                    echo get_video_name($v['url']);
                    @endphp
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
@endsection

<?php
function get_video_name($video_id){
$title = explode('</title>',explode('<title>',file_get_contents("https://www.youtube.com/watch?v=".$video_id))[1])[0];
    echo substr($title,0,-10);
}

function get_video_id($URL){
    $YouTubeCheck = preg_match('![?&]{1}v=([^&]+)!', $URL . '&', $Data);
    If($YouTubeCheck){
        $VideoID = $Data[1];
    }
    return $VideoID;
}
?>