@extends('layout.layout')

@section('content')

<div class="container body-content">
    <div class="row flex-center m-2">
        <div class="card" style="width: 100%;">
            <div class="card-body flex-center" style="flex-direction: column;">
                <?php
                $search = '';           
            ?>

                <?php if(isset($text)){
                $search = $text;
            } ?>

                <h5 style="margin-top: 1em">Buscar usuarios</h5>
                <div class="row container">
                    <form action="{{ route('search_profiles') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="input-field col s9 m10">
                            <input type="text" id="autocomplete-input" class="autocomplete" name="search"
                                value="{{ $search }}">
                            <label for="autocomplete-input">Nombre del usuario</label>
                        </div>
                        <div class="col s3 m2">
                            <button class="btn-floating btn-medium waves-effect waves-light mt-2" type="submit">
                                <i class="material-icons prefix">search</i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="row users-container">
        @foreach($users as $item)
        <?php
        if($item->id != json_decode($_COOKIE['user'])->id){
    ?>
        <div class="col s12 m6 l4">
            <div class="card" style="padding: 1em 0 2em 0;">
                <div class="card-body flex-center" style="flex-direction: column; padding: 0.5em; text-align: center;">
                    <h5 style="padding-bottom: 0.4em;">{{$item->user_name}}</h5>
                    <a class="waves-effect waves-light btn-small" href="user/{{$item->id}}/view">
                        <i class="material-icons left">remove_red_eye</i>
                        Ver
                    </a>
                </div>
            </div>
        </div>

        <?php } ?>
        @endforeach()

        <?php
        if(count($users) == 0 || (count($users) == 1 && $users[0]->id == json_decode($_COOKIE['user'])->id)){
            ?>
        <div class="container-fluid flex-center">
            <h5 style="margin-top: 3.5em;">Sin coincidencias</h5>
        </div>
        <?php
        }
?>

    </div>
</div>

@endsection

@section('scripts')

@endsection