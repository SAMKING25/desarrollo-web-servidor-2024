<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media</title>
</head>
<body>
    <?php 
        $array1 = [];
        $array11 = [];
        $array12 = [];
        for($i = 0; $i < 5; $i++){
            $array11[$i] = rand(1,10);
            $array12[$i] = rand(10,100);
        }

        array_push($array1,$array11);
        array_push($array1,$array12);

        echo "<p>";
        for($i = 0; $i < 5; $i++){
            echo $array11[$i] . ", ";
        }
        echo "</p>";

        echo "<p>";
        for($i = 0; $i < 5; $i++){
            echo $array12[$i] . ", ";
        }
        echo "</p>";

        // Maximo
        $maximo1 = $array11[0];
        for($i = 1; $i < 5;$i++){
            if($array11[$i] < $maximo1){
                $maximo1 = $array11[$i];
            }
        }
    ?>
</body>
</html>