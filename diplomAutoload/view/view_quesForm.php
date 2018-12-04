<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Задать вопрос</title>
	<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
</head>
<body>
	<div style="width: 500px;">
		<h3>Заполните все поля и отправте вопрос!</h3>

		<div>
			<?php
				if (!empty($result)){
					echo $result;
				}
			?>
		</div>

		<form action="../controller/controller_questions.php" method="POST">
			
			<input type="text" name='isSend' value="true" hidden>
			

			<div class="form-group">
			    <label for="inputName">Имя:</label>
			    <input type="text" name='authorName' class="form-control" id="inputName" placeholder="Введите имя">
			</div>

		  	<div class="form-group">
			    <label for="inputEmail">Адрес email:</label>
			    <input type="email" name='authorEmail' class="form-control" id="inputEmail" placeholder="Введите email">
			</div>

			<div class="form-group">
			    <label for="inputTopic">Выберите тему:</label>
			    <select name='quesTopic' id="inputTopic">
			    	<?php
						for ($i = 0; $i < count($topics); $i++){
							echo '<option value="'.$topics[$i]['id'].'">'.$topics[$i]['topic_name'].'</option>';
						}
			    	?>
				</select>
			</div>

			<div class="form-group">
			    <label for="textQues">Введите вопрос:</label>
			    <textarea name="textQues" id="textQues"></textarea>
			</div>

			<button type="submit" class="btn btn-default">Отправить вопрос</button>
		</form>

	</div>

	<br>
	<div>
		<a href="../index.php">Выйти</a>
	</div>
	
</body>
</html>