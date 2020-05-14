@extends('layout.layout')

@section('content')

<div class="container body-content">
    <div class="row flex-center m-2">
        <div class="card" style="width: 100%;">
            <div class="card-body flex-center" style="flex-direction: column;">

                <h5 style="margin-top: 1em">Buscar usuarios</h5>
                <div class="row container">
                    <div class="input-field col s9 m10">
                        <input type="text" id="autocomplete-input" class="autocomplete">
                        <label for="autocomplete-input">Nombre del usuario</label>
                    </div>
                    <div class="col s3 m2">
                        <a class="btn-floating btn-medium waves-effect waves-light mt-2">
                            <i class="material-icons prefix">search</i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row users-container">
        @foreach($users as $item)
        <?php
        if($item->id != $_COOKIE['user']){
    ?>
        <div class="col s12 m6 l4">
            <div class="card" style="padding: 1em 0 2em 0;">
                <div class="card-body flex-center" style="flex-direction: column; padding: 0.5em; text-align: center;">
                    <h5 style="padding-bottom: 0.4em;">{{$item->user_name}}</h5>
                    <a class="waves-effect waves-light btn-small" href="{{ route('view_profile', $item) }}">
                        <i class="material-icons left">remove_red_eye</i>
                        Ver
                    </a>
                </div>
            </div>
        </div>

        <?php } ?>
        @endforeach()

    </div>
</div>

@endsection

@section('scripts')
<script>
    $list = null;

    $(document).ready(function(){
    $('input.autocomplete').autocomplete({
      data: $list
    });
  });
</script>
@endsection