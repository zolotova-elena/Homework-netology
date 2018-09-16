<?php
	if (isset($_FILES['userfile'])){
		$errors = array();
		$file_name = $_FILES['userfile']['name'];
		$file_size = $_FILES['userfile']['size'];
		$file_tmp = $_FILES['userfile']['tmp_name'];
		$file_type = $_FILES['userfile']['type'];
		//$file_ext = strtolower(end(explode('.', $_FILES['userfile'])));
		$expensions = array("json");

		if ($file_size > 2097152){
			$errors[] = 'Файл должен быть 2мб';
		}

		if (empty($errors) == true){
			move_uploaded_file($file_tmp, "list/".$file_name);
			//if (move_uploaded_file($file_tmp, "list/".$file_name)){
				header('Location: list.php');
			//}
			//echo "Успех";
			exit();
		} else {
			print_r ($errors);
		}
	}
	echo "<a href=list.php>К списку тестов</a><br>";
?>

<!DOCTYPE html>
	<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Форма для ввода теста</title>
	</head>
	<body>

		<form enctype="multipart/form-data"  method="post" action="">
		    Отправить этот файл: <input name="userfile" type="file" />
			<input type="submit" value="Отправить файл" />
		</form>
		
	</body>
</html>
