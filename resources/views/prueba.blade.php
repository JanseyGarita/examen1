@extends('layout.layout')

@section('content')

<div class="container body-content">
<table class="table highlight">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Teléfono</th>
    </tr>
  </thead>
  <tbody>
  @foreach($profiles as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
        <td>
          <a href="{{ route('detalle', $item) }}">
            {{$item->user_name}}
          </a>
        </td>
      <td>{{$item->mail}}</td>
      <td>{{$item->phone}}</td>
    </tr>
    @endforeach()
  </tbody>
</table>
</div>

@endsection

@section('scripts')
    
@endsection