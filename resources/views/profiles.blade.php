@extends('layout.layout')

@section('content')

<div class="container">
    <div class="row flex-center m-2 p-2">
        <div class="col s12 flex-center">
            <nav id="search-nav">
                <div class="nav-wrapper">
                    <form>
                        <div class="input-field">
                            <input id="search" type="search" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>

@endsection