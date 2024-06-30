@extends('layout')
@section('content')
@foreach ($claims as $claim)
@if ($claim->active)
<h3 style="color: green;">Автомобиль появился в наличии, сообщите клиенту</h3>
@endif
<div style="border: 1px solid black; padding:5px">
<p>ID {{$claim->id}}</p>
<p>Марка {{$claim->brand}}</p>
<p>Объем двигателя {{$claim->engincapacity}}</p>
<p>Год выпуска {{$claim->releasedate}}</p>
<p>Модель {{$claim->model}}</p>
<p>ID клиента {{$claim->client}}</p>
<form method="POST" action="{{ route('deleteclaim', ['id' => $claim->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Удалить</button>
</form>
</div>
<br>
<br>
@endforeach
@endsection
