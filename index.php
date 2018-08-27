<!DOCTYPE>
<html lang="ru">
    <head>
        <title>Дополнительное задание!</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        <style>
            body {
                font-family: 'Playfair Display', serif;  
            }
        </style>
    </head>
    <body>
    	<?php
            echo "Введите число больше нуля.</br>";
    		$x = $_GET['x'];//rand(0,100);
            
            echo "Случайное число: $x</br>";
            $a = 1;
            $b = 1;
            if (($a > $x) ||  ($a == $x)){
                echo "Задуманное число НЕ входит в числовой ряд!</br>"; die;
            }
            
            while ($a < $x && $a != $x) {
                echo "a=$a;</br>";
            	    $c = $a;
            		$a = $a + $b;
            		$b = $c;

                if ($a > $x){
                    echo "Задуманное число НЕ входит в числовой ряд!</br>";
                    break;
                } 
                if ($a == $x){
                    echo "Задуманное число НЕ входит в числовой ряд!</br>";
                    break;
                } 	
            };
		?>
    </body>
</html>