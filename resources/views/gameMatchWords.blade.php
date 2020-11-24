<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
    
</body>
</html>

<div style="background-color:green;width:200px;text-align:center">
    {{-- @foreach($Cat as $cat)
        <div style="background-color:red;width:40%;height:50px">{{$cat->Name}}</div>
        <div style="background-color:blue;width:40%;height:50px;">{{$cat->Mean}}</div>
    @endforeach --}}
    @foreach($shuffledArray as $key=>$value)
        {{-- <div id={{$value}} style="background-color:red;width:40%;height:50px">{{$key}}</div> --}}
        <button class="btn btn-primary" point={{$value}} word={{$key}}>{{$key}}</button>
        {{-- <div style="background-color:blue;width:40%;height:50px;">{{$value}}</div> --}}
    @endforeach


<script>
    $(document).ready(function(){
        var array = [];
        $('button').click(function(){
            // $('div').find('button').removeClass('active');
            if(array.length == 0){
                array.push($(this).attr("point"));
                array.push($(this).attr("word"));
                $(this).addClass('active');
            }else{
                if($(this).attr('point') == array[0] && $(this).attr("word") != array[1]){
                    $(this).addClass('active');
                    $('.active').remove();
                    array = [];
                }else{
                    array = [];
                    $('.active').removeClass('active');
                }
            }
            // $(this).addClass('active');

            // if($(this).attr('point') == $('button').hasClass('active').attr('point')){
            //     console.log('ok');
            // }

        });
    });
</script>    
</div>