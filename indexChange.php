
<!DOCTYPE>
<html lang="ru">
    <head>
        <title>Дополнительное задание!(исправлено)</title>
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
		$x = $_GET['x'];//rand(0,100);
		echo "<b>Число : $x</b></br>";
		$a = 1;
    	$b = 1;
    	do {
    		if ($a > $x){
				echo "Задуманное число НЕ входит в числовой ряд!</br>";
				break;
			} else{
				if ($a == $x){
					echo "Задуманное число НЕ входит в числовой ряд!</br>";
					break;
				} else {
					$c = $a;
					$a = $a + $b;
					$b = $c;
					echo "a=$a;  b=$b; c=$c; </br>";
				}
			} 
    	} while ($a < $x && $a != $x)
		?>
    </body>
</html>
