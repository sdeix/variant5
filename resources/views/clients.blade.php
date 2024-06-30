@extends('layout')
@section('content')
@foreach ($clients as $client)
<div style="border: 1px solid black; padding:5px">
<p>ID {{$client->id}}</p>
<p>Имя {{$client->name}}</p>
<p>Контактная информация {{$client->contact}}</p>
<form method="POST" action="{{ route('deleteclient', ['id' => $client->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Удалить</button>
</form>
</div>
<br>
<br>
@endforeach
@endsection
