<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>List Từ Vựng</title>
</head>
<body>
    <div style="float: right">
        <a href="{{route('home')}}">Home</a>
        <a href="{{route('practive')}}">Practive</a>
        <a href="{{route('list-vocabulary')}}">List Vocabulary</a>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Stt</th>
            <th scope="col">Nghĩa Tiếng Anh</th>
            <th scope="col">Nghĩa Tiếng Việt</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vocabulary as $voca)
            <tr>
            <th scope="row">{{$voca['id']}}</th>
            <td>{{$voca['English']}}</td>
            <td>{{$voca['Vietnamese']}}</td>
            <td><a href="{{route('add-vocabulary',$voca['id'])}}"><button class="btn btn-primary">Thêm vào mục luyện tập</button></a></td>
            </tr>
            @endforeach
            {{-- <tr>
            <th scope="row">2</th>
            <td>Phone</td>
            <td>Điện Thoại</td>
            <td><button class="btn btn-primary">Thêm vào mục luyện tập</button></td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Dog</td>
            <td>Con chó</td>
            <td><button class="btn btn-primary">Thêm vào mục luyện tập</button></td>
            </tr> --}}
        </tbody>
    </table>
</body>
</html>