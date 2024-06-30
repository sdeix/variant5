@extends('layout')
@section('content')

@foreach ($cars as $car)
<div style="border: 1px solid black; padding:5px">
<p>ID {{$car->id}}</p>
<p>Марка {{$car->brand}}</p>
<p>Объем двигателя {{$car->engincapacity}}</p>
<p>Год выпуска {{$car->releasedate}}</p>
<p>Модель {{$car->model}}</p>
<form method="POST" action="{{ route('deletecar', ['id' => $car->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Удалить</button>
</form>
</div>
<br>
<br>
@endforeach
<h1>Добавить машину</h1>
<form action="" method="post">
    @csrf
    <p> Марка <input type="text" name="brand" required></p> 
    <p>Объем двигателя <input type="text" name="engincapacity" required> </p>
    <p>Год выпуска <input type="number"  name="releasedate" min="1900" max="2024" required> </p>
    <p>Модель <input type="text" name="model" required> </p>

    <button type="submit">Отправить</button>

</form>
@endsection
