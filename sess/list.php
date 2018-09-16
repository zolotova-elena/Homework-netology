<?
	require_once'functions.php';

	if (!isAuthrized()) {
  		header('HTTP/1.1 403 Forbidden');
		echo '<h2>Доступ запрещен!</h2>';
		exit;
	}

	if (!empty($_SESSION['user'])) {
		echo "<h3>Вы вошли как зарегистрированный пользователь!</h3>";
		echo "<a href=admin.php>Загрузить тест</a><br>";
	} 
	else {
		echo "<h3>Вы вошли как гость!</h3>";
	}
	//showTests();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Список тестов</title>
</head>
<body>
	<form method="POST">
	<?
	echo "<a href=./err404.php>Несуществующий тест</a><br>";
	//function showTests(){
		$filelist = glob("list/*.json");
	    foreach ($filelist as $filename){
	    	
	        //echo $filename." и его размер: ".filesize($filename)." байт <br>";
	        $index1 = strrpos($filename, "_");
	        $index2 = strrpos($filename, ".");
	        $testNumber = substr($filename,$index1 + 1, $index2-$index1-1);
	        //echo "num $testNumber <br>";
	        if (!empty($_SESSION['user'])) {
	        ?>
	        	<input type="checkbox" name="Test_<?= $testNumber?>" value="Test_<?= $testNumber?>">
	        <?
	    	}
	        echo "<a href=./test.php?x=$testNumber> Test_$testNumber</a><br>";

		}
		?>

			<input type="submit" value="Удалить" >
		</form>

		<?
	//}
		if ( !empty($_POST) ) { 
			$arrForDel = $_POST;
			foreach ($arrForDel as $key => $value) {
				unlink('list/'.$_POST[$key].'.json');
			}
			//showTests();
		}

	?>

	<a href="logout.php"><button>Выход из системы</button></a>
</body>
</html>