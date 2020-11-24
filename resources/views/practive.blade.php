<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <div id="diem" style="width:100px;height:50px;background-color:red"></div>
    {{-- <form action="{{route('handleAnswer')}}" method="POST"> --}}
        <?php 
            $array = array();
            $count = 0;
            $stt = 1;
            $arrayRandom=array("Đèn giao thông","Ngôi nhà","Bể bơi","Cái quần","Màn hình",
                               "Ô tô","Xe máy","Con chuột","Bàn Phím" 
                              );
            // $random_keys=array_rand($arrayRandom,5);
            
        ?>
        @foreach($Cat as $cat)

        <?php
            $Code = rand(1,4);
            shuffle($arrayRandom);
        ?>
            <div>{{$stt}} . {{$cat->Name}}</div>
            <input type="checkbox" id={{"answer1".$cat->Name}} name={{"answer1".$cat->Name}} value="<?php echo $Code == 1 ? $cat->Mean : $arrayRandom[0] ?>">
                @if($Code == 1)
                    {{$cat->Mean}}
                @else
                    {{$arrayRandom[0]}}
                @endif
            <br>
            <input type="checkbox" id={{"answer2".$cat->Name}} name={{"answer2".$cat->Name}} value="<?php echo $Code == 2 ? $cat->Mean : $arrayRandom[1] ?>">
                @if($Code == 2)
                    {{$cat->Mean}}
                @else
                    {{$arrayRandom[1]}}
                @endif
            <br>
            <input type="checkbox" id={{"answer3".$cat->Name}} name={{"answer3".$cat->Name}} value="<?php echo $Code == 3 ? $cat->Mean : $arrayRandom[2] ?>">
                @if($Code == 3)
                    {{$cat->Mean}}
                @else
                    {{$arrayRandom[2]}}
                @endif
            <br>
            <input type="checkbox" id={{"answer4".$cat->Name}} name={{"answer4".$cat->Name}} value="<?php echo $Code == 4 ? $cat->Mean : $arrayRandom[3] ?>">
                @if($Code == 4)
                    {{$cat->Mean}}
                @else
                    {{$arrayRandom[3]}}
                @endif
            <br><br>
            
            <?php
                //$array = array();
                array_push($array,$cat->Mean);
            ?>

            {{-- <script>
                $(document).ready(function(){
                    
                    $('input').click(function(){
                        if($(this).prop('checked') == true){
                            console.log($(this).attr('value'));
                        }
                        
                    });
                });
            </script> --}}
            <div id={{'note'.$count}}></div>
            <?php $count++;$stt++ ?>
        @endforeach
    {{-- <input type="submit"> --}}
    <button>Submit</button>
{{-- {{csrf_field()}}
</form> --}}

{{-- @dump($array) --}}
</body>

<script>
    $(document).ready(function(){
        $('button').click(function(){

            var array = <?php echo json_encode($array); ?>;
            var i = 0,diem=0;
            // console.log(array[0]);

            // var x = $('#answer4IT').prop('checked');
            // console.log(x);
            // if($('input:checked')){
            //     console.log($(this).attr('value'));
            // }
            // console.log($('input:checked').length);

            $('input:checked').each(function() {
                // `this` is the div
                // console.log($(this).attr('value'));
                if($(this).attr('value') == array[i]){
                    diem++;
                    $('#note'+i).html('Câu này đúng').css("background-color", "green");
                }else{
                    $('#note'+i).html('Câu này sai . Đáp án đúng là : ' + array[i]).css("background-color", "red");
                }
                i++;
            });

            console.log(diem);
            $("#diem").html("Điểm của bạn :" + diem);
            
        });

        // $('input').click(function(){
        //     if($(this).prop('checked') == true){
        //         console.log($(this).attr('value'));
        //     }
            
        // });
    });
</script>

</html>



