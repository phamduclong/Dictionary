<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h3>Tra từ</h3>
    <form method="POST" action="{{route('handleTranToVi')}}">
        <input type="text" name="word">
        <button type="submit">Dịch</button>

        {{csrf_field()}}
    </form>

    <div style="float: right">
        <a href="{{route('home')}}">Home</a>
        <a href="{{route('practive')}}">Practive</a>
        <a href="{{route('practiveListening')}}">Practive Listening</a>
        <a href="{{route('gameMatchWords')}}">Game Match Words</a>
        <a href="{{route('gameGhepChu')}}">Game Ghép Chữ</a>
        <a href="{{route('gameLatOChu')}}">Game Lật Ô Chữ</a>
        <a href="{{route('list-vocabulary')}}">List Vocabulary</a>
    </div>

    @if(isset($nghia))
    {{-- {{$nghia}} --}}
        <?php
            // var_dump($nghia)
            var_dump($nghia)
        ?>
    @endif
</body>
</html>