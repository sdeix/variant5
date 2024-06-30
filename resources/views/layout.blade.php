<!DOCTYPE html>
<html>

<head>
    <style>
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0 0 10px 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }
    </style>
    <title>Картотека автомагазина</title>
</head>

<body>
    <ul>
    <li><a href="/">Главная</a></li>
        @if (Auth::user())


            
            
            
            <li><a href="/claims">Заявки</a></li>
            <li><a href="/clients">База клиентов</a></li>
            <li><a href="/cars">Автомобили</a></li>
            <li><a href="/logout">Выйти</a></li>
            @if (Auth::user()->notification==1)
            <li style="background-color: red;"><a href="claims">Внимание, перейдите на вкладку заявок</a></li>
            @endif
        @else
            <li> <a href="/register">Регистрация</a></li>
            <li> <a href="/login">Войти</a></li>


        @endif

    </ul>
    @yield('content')
</body>

</html>