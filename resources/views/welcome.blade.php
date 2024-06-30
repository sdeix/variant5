@extends('layout')
@section('content')


<h1>Найти автомобиль</h1>
<form action="" method="post">
    @csrf
    <p> Марка <input type="text" name="brand" ></p> 
    <p>Объем двигателя <input type="text" name="engincapacity" > </p>
    <p>Год выпуска <input type="number"  name="releasedate" min="1900" max="2024" > </p>
    <p>Модель <input type="text" name="model" > </p>

    <button type="submit">Отправить</button>

</form>


@if (count($cars)!=0 )
@foreach ($cars as $car)
<div style="border: 1px solid black; padding:5px">
<p>Марка {{$car->brand}}</p>
<p>Объем двигателя {{$car->engincapacity}}</p>
<p>Год выпуска {{$car->releasedate}}</p>
<p>Модель {{$car->model}}</p>
</div>
<br>
<br>
@endforeach
@endif
{{$message ?? ''}}
@if ($claimform==true)
<h1>Оставьте заявку чтобы вас уведомили когда автомобиль будет в наличии</h1>
<form action="" method="post">
    @csrf
    <p> Марка <input type="text" name="brand" ></p> 
    <p>Объем двигателя <input type="text" name="engincapacity" > </p>
    <p>Год выпуска <input type="number"  name="releasedate" min="1900" max="2024" > </p>
    <p>Модель <input type="text" name="model" > </p>
    <p>Имя <input required type="text" name="name" > </p>
    <p>Контактная информация <input required type="text" name="contact" > </p>
    <button type="submit">Отправить</button>

</form>
@endif



@endsection
