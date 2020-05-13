@extends('layout.layout')

@section('links')
<link rel="stylesheet" href="styles/profile.css">
@endsection

@section('content')

<svg viewBox="0 0 1440 320" style="position: relative; top: 0; z-index: 0;">
    <path fill="#00695c" fill-opacity="1"
        d="M0,224L120,234.7C240,245,480,267,720,272C960,277,1200,267,1320,261.3L1440,256L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z">
    </path>
</svg>

<div class="container info-card body-content">
    <div class="row flex-center" style="flex-direction: column;">
        <h3>Mi Información</h3>
        <form class="col s12" method="POST" action="{{ route('update') }}">
        {{ csrf_field() }}
        <input id="id" type="text" hidden name="id" required value="{{$profile->id}}">
            <div class="row">
                <div class="input-field col s6">
                    <input id="user_name" type="text" class="validate" name="user_name" required value="{{$profile->user_name}}">
                    <label for="user_name">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input id="phone_number" type="tel" class="validate" name="phone_number" required value="{{$profile->phone}}">
                    <label for="phone_number">Teléfono</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="email" type="email" class="validate" name="mail" required value="{{$profile->mail}}">
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s6">
                    <input id="password" type="password" class="validate" name="user_password" required value="{{$profile->user_password}}">
                    <label for="password">Password</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                <i class="material-icons right">save</i>
            </button>
        </form>
    </div>
</div>

@endsection

@section('scripts')

@endsection