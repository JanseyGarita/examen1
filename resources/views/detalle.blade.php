@extends('layout.layout')

@section('links')

@endsection

@section('content')

<div class="container body-content">

      <h1 scope="row">{{$profile->id}}</h1>

            <h2>{{$profile->user_name}}</h2>

      <h3>{{$profile->mail}}</h3>
      <h4>{{$profile->phone}}</h4>

</div>

@endsection

@section('scripts')
    
@endsection