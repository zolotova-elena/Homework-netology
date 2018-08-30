<!DOCTYPE html>
	<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Форма для ввода теста</title>
	</head>
	<body>

		<form id="smartForm" action="" method="post" enctype="multipart/form-data" action="./admin.php">
			<input name="upl" type="file"/>
			<input class="smartButton" type="submit" value="ОТПРАВИТЬ" name="submit"/>
		</form>
		
	</body>
</html>

<?
	if (!empty($_FILES)){
		if (array_key_exists('upl', $_FILES)){
		    $tmp_name = $_FILES["upl"]['name']; 
		    $uploads_dir = './list/$tmp_name';  
		    move_uploaded_file($tmp_name, "$uploads_dir");
		}
	}
?>