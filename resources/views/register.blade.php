@extends('layout')
@section('content')
<div>
   <form action="" method="post">
    @csrf
    логин <input type="text" name="login"><br>
    Пароль <input type="text" name="password"><br>
    <button type="submit">Зарегистрироваться</button>
   </form>
</div>
@endsection
