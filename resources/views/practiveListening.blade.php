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
    <div style="text-align: center">
        <?php 
                
                $arrayRandom=array("Render","Hello","Board","Hot","Captain",
                                "Car","MotoBike","Mouse","Key" 
                                );
        
                
            ?>
        @foreach($Cat as $cat)
        <?php
                $Code = rand(0,1);
                shuffle($arrayRandom);
        ?>
            <div>
                <button class="btn btn-danger" value="<?php echo $Code == 0 ? $arrayRandom[6] : $cat['Name'] ?>" point="<?php echo $Code == 0 ? 0 : 1 ?>">
                    @if($Code == 1)
                        {{$cat['Name']}}
                    @else 
                        {{$arrayRandom[6]}}
                    @endif    
                </button>
            </div>

            <div>
                <audio controls autoplay>
                    <source src="{{$cat['pronunciation']}}">
                </audio>
            </div>


            <?php
                if($Code == 0){
                    $Code = 1;
                }else{
                    $Code = 0;
                }
            ?>

            <div>
                <button class="btn btn-primary" value="<?php echo $Code == 0 ? $arrayRandom[6] : $cat['Name'] ?>" point="<?php echo $Code == 0 ? 0 : 1 ?>">
                    @if($Code == 1)
                        {{$cat['Name']}}
                    @else 
                        {{$arrayRandom[6]}}
                    @endif 
                </button>
            </div>
        @endforeach

        <div id='message'></div>
        
    </div>
    <br>

    <div class="pagination justify-content-center">{{ $Cat->links() }}</div>
</body>

<script>
    $(document).ready(function(){
        $('button').click(function(){
            if($(this).attr('point') == 1){
                $('#message').html('Bạn Giỏi Vê Lờ').css({"background-color": "green", "font-size": "200%","color":"white"});
            }else{
                $('#message').html('Bạn ngu quá').css({"background-color": "red", "font-size": "200%","color":"white"});
            }
        });
    });
</script>
</html>
