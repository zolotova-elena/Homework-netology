<!DOCTYPE>
<html lang="ru">
    <head>
        <title></title>
        <meta charset="utf-8">
    </head>
    <body>
    <form action="index.php" method="post">
         <p>Номер теста: <input type="text" name="test" /></p>
         <p><input type="submit" /></p>
    </form>

    <?php 
		$testNumber;
        htmlspecialchars($_POST['name']);

        if($_POST['test']) {echo " Вы выбрали тест: ".(int)$_POST['test'];}
        else {echo "Вы ничего не ввели!";}

        $f_json = 'tests.json';
        $json = file_get_contents("$f_json");
        $json = json_decode($json, true);

        echo "<br>";
		
        if($_POST['test'] == 1 || $_POST['test'] == 2){
			$testNumber = $_POST['test'];
            echo "<br>Тест ".$_POST['test']."<br>";
            $test1 = $json["test".$_POST['test']];
			
			//var_dump($test1[0]['question']);

    ?>

			<form action="" method="POST">	

				<fieldset>
					<legend> <? echo $test1[0]['question'] ?> </legend>
					<label><input type="radio" name="q1" value="<? echo $test1[0]['answer1'] ?>"> <? echo $test1[0]['answer1'] ?></label>
					<label><input type="radio" name="q1" value="<? echo $test1[0]['answer2'] ?>"> <? echo $test1[0]['answer2'] ?></label>
					<label><input type="radio" name="q1" value="<? echo $test1[0]['answer3'] ?>"> <? echo $test1[0]['answer3'] ?></label>
					<label><input type="radio" name="q1" value="<? echo $test1[0]['answer4'] ?>"> <? echo $test1[0]['answer4'] ?></label>
				</fieldset>
				
				<fieldset>
					<legend> <? echo $test1[1]['question'] ?> </legend>
					<label><input type="radio" name="q2" value="<? echo $test1[1]['answer1'] ?>"> <? echo $test1[1]['answer1'] ?></label>
					<label><input type="radio" name="q2" value="<? echo $test1[1]['answer2'] ?>"> <? echo $test1[1]['answer2'] ?></label>
					<label><input type="radio" name="q2" value="<? echo $test1[1]['answer3'] ?>"> <? echo $test1[1]['answer3'] ?></label>
					<label><input type="radio" name="q2" value="<? echo $test1[1]['answer4'] ?>"> <? echo $test1[1]['answer4'] ?></label>
				</fieldset>				

				<input type="submit" value="Отправить">  
			</form>

    <?
		
        } else {
            echo "Такого теста нет! Выберите 1 или 2<br>";
        }
		
		
        htmlspecialchars($_POST['q1']);
        $p = $_POST['q1'];
		$p1 = $_POST['q2'];
        //echo ("<br>".$p." ".$p1."<br>");
		if ($p == $test1[0]['answer3']) {echo "<br/Тест пройден! Отлично!>";}
		if ($p and $p1) {
			echo "Значения введены<br/>";
			echo ("<br>".$p." ".$p1."<br>");
			//echo $testNumber;
			//if ($testNumber == 1){
				//echo "Значения введены<br/>";
				if ($p == 'прямоугольник') {echo "<br/Тест пройден! Отлично!>";}
			//}
			
		}

		

    ?>

    </body>
</html>