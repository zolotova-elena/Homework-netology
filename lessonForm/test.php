<!DOCTYPE>
<html lang="ru">
    <head>
        <title></title>
        <meta charset="utf-8">
    </head>
    <body>

	    <?php 
	    	echo "<a href=list.php>Все тесты</a><br>";
	    	$testNumber = $_GET['x'];
	    	echo "Номер: $testNumber";
	    	$filelist = glob("list/Test_$testNumber.json");
	    	//print_r($filelist);

	    	if ($filelist){
	    		$json = file_get_contents("$filelist[0]");
	    		$json = json_decode($json, true);

	    		?> <form action="" method="POST">	<?
	    		$curAns = array();
	    		for ($i = 0; $i < count($json); $i++){
	    			$ques = $json[$i];
	    			$curAns[$i] = $ques['cur_ans'];

	    			?>
					<fieldset>
						<legend> <? echo $ques['question'] ?> </legend>
						<label><input type="radio" name="<? echo "q$i" ?>" value="<? echo $ques['answer1'] ?>"> <? echo $ques['answer1'] ?></label>
						<label><input type="radio" name="<? echo "q$i" ?>" value="<? echo $ques['answer2'] ?>"> <? echo $ques['answer2'] ?></label>
						<label><input type="radio" name="<? echo "q$i" ?>" value="<? echo $ques['answer3'] ?>"> <? echo $ques['answer3'] ?></label>
						<label><input type="radio" name="<? echo "q$i" ?>" value="<? echo $ques['answer4'] ?>"> <? echo $ques['answer4'] ?></label>
					</fieldset>			
					<? 
				} 
				?>
					<input type="submit" value="Отправить">  
				</form>
				<?
				$res = 0;
				if (count($_POST) != count($json)) {echo "Выберете ответы для каждого вопроса!"; die;};
				for ($i = 0; $i < count($json); $i++){
					if ($_POST["q$i"]){
						$resForm = $_POST["q$i"];
						if ($resForm == $curAns[$i]) {$res = $res + 1; echo "Ответ верный! $resForm<br>";}
						else {echo "Ответ не верен! $resForm<br>";} 
					} else {
						echo "Ответ не выбран! Вопрос: ".($i+1)."<br>";
					}
				}

				echo "<h3>Результат: ".round($res*100/count($json))."%</h3>";
	    		
	    	} else {
	    		echo "Теста с таким номером нет!";
	    	}

	    ?>
	
    </body>
</html>