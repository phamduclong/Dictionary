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

{{-- @dump(json_encode($Cat)) --}}
<body>
    {{-- <div align="center">
        <div style="background-color: blue;width:500px;height:100px">
            <div id="dapan"></div>
        </div>
        <div>
            <button point="h">h</button>
            <button point="o">o</button>
            <button point="l">l</button>
            <button point="e">e</button>
            <button point="l">l</button>
        </div>
    </div> --}}

    
    <div align="center">
        @foreach($Cat as $cat)
            <div align="center">{{$cat['Mean']}}</div>

            <?php

                $array = array();
                $len = strlen($cat['Name']);
                for($i = 0 ; $i < $len ;++$i){
                    $array[$i] = $cat['Name'][$i];
                }
                $arrayReflection = $array;
                shuffle($array);
            ?>
            <div align="center">
                <div style="background-color: blue;width:500px;height:100px">
                    <div id="dapan" answer="{{$cat['Name']}}"></div>
                </div>
                <div>
                    @for($i = 0 ; $i < $len ; ++$i)
                         <button class="btn btn-warning" point="{{$array[$i]}}" stt="{{$i}}">{{$array[$i]}}</button>
                        {{-- <button id="subtitude"></button> --}}
                    @endfor

                    {{-- <span id="goiy" class="btn btn-warning"></span> --}}
                </div>
            </div>

            
        @endforeach

        <br>
        <div class="btn btn-danger" id="submit">OK</div>
        {{-- <br><br>
        <div class="btn btn-dark" id="back">Back</div> --}}
    </div>
    <br>
    <div id='message' style="text-align: center"></div>
    <br>
    <div class="pagination justify-content-center">{{$Cat->links()}}</div>
</body>

<script>
    $(document).ready(function(){

        // var array = [];
        var arrayReflect = <?php echo json_encode($arrayReflection); ?>;
        var stt = 0;
        // console.log(arrayReflect);
        $('button').click(function(){
            

            // $('#dapan').append($(this).attr('point'));
            // array.push($(this).attr('point'));

            // var stt = $(this).attr('stt');

            if($(this).html() == arrayReflect[stt]){
                $('#dapan').append($(this).html());
                // array.push($(this).html());
                $(this).remove();
                stt++;
            }else{
                alert("Chữ cái không đúng");
            }
            
            
        });

        $('#submit').click(function(){
            var dapan = $('#dapan').html();
            if(dapan == $('#dapan').attr('answer')){
                $('#message').html('Bạn Giỏi Vê Lờ').css({"background-color": "green", "font-size": "200%","color":"white"});
            }else{
                $('#message').html('Bạn ngu quá').css({"background-color": "red", "font-size": "200%","color":"white"});
            }
        });

        // $('#back').click(function(){
            
            
        //     // var length = array.length;
        //     // $('#goiy').append(function(){
        //     //     var n = array[length-1];
        //     //     if(array.length > 0){
                    
        //     //         return "<button>" + n + "</button>";
        //     //     }
                
        //     // });
        //     // array.pop();
        //     var button = $("<button></button>").text("T")
        //     $('#goiy').append(button);

        // });

        // $('span').click(function(){
        //     console.log("kkkk");
        // });

    });
</script>
</html>