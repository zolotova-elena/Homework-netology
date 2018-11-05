<?php 

	require_once 'functions.php';
	if (!isAuthrized()){
		http_response_code(403);
		die('Доступ запрещен');
	}


	$testNumber = $_GET['x'];
	//echo "Номер: $testNumber";
	$filelist = glob("list/test_$testNumber.json");
	//print_r($filelist);

	if (!$filelist){ //echo "Теста с таким номером нет"; 
		header("HTTP/1.0 404 Not Found");
		die;
	} else {
	echo "<a href=list.php>Все тесты</a><br>";
	$json = file_get_contents("$filelist[0]");
	$json = json_decode($json, true);

?> 

<!DOCTYPE>
<html lang="ru">
    <head>
        <title></title>
        <meta charset="utf-8">
    </head>
    <body>

				<form action="" method="POST">
	    		<?php
	    		$curAns = array();
	    		for ($i = 0; $i < count($json); $i++){
	    			$ques = $json[$i];
	    			$curAns[$i] = $ques['cur_ans'];

	    			?>
					<fieldset>
						<legend> <?php echo $ques['question'] ?> </legend>
						<label><input type="radio" name="<? echo "q$i" ?>" value="<? echo $ques['answer1'] ?>"> <?php echo $ques['answer1'] ?></label>
						<label><input type="radio" name="<? echo "q$i" ?>" value="<? echo $ques['answer2'] ?>"> <?php echo $ques['answer2'] ?></label>
						<label><input type="radio" name="<? echo "q$i" ?>" value="<? echo $ques['answer3'] ?>"> <?php echo $ques['answer3'] ?></label>
						<label><input type="radio" name="<? echo "q$i" ?>" value="<? echo $ques['answer4'] ?>"> <?php echo $ques['answer4'] ?></label>
					</fieldset>			
					<?php 
				} 
				?>
					<input type="submit" value="Отправить">  
				</form>
				<?php
				$res = 0;
				if (count($_POST) != count($json) ) {echo 'Выберете ответы для каждого вопроса! '; die;};
				for ($i = 0; $i < count($json); $i++){
					if ($_POST["q$i"]){
						$resForm = $_POST["q$i"];
						if ($resForm == $curAns[$i]) {$res = $res + 1; echo "Ответ верный! $resForm<br>";}
						else {echo "Ответ не верен! $resForm<br>";} 
					} else {
						echo "Ответ не выбран! Вопрос: ".($i+1)."<br>";
					}
				}

				if (!empty($_SESSION['user'])) {
					$name = getAuthrizedUser()['username'];
				} 
				else {
					$name = $_SESSION['name'];
				}

				echo '<h3>'.$name.', результат: '.round($res*100/count($json)).'%</h3>';
				echo "<a href=./logo.php?n=$name>Сертификат</a><br>";
	    		
	    	} 

	    ?>
	    <a href="logout.php">Выход</a>
	
    </body>
</html> 