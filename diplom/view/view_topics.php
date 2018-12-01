<!--<!DOCTYPE html>-->
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Панель администратора</title>
	<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<h3 id="adminTitle">Добро пожаловать в панель администратора!</h3>
	<table class="table">
	  	<thead>
	    	<tr >
		      	<th width=20%>Навигация</th>
		      	<th width=80%></th>
	    	</tr>
	  	</thead>
	  	<tbody>
	    <tr>
	      	<td> <a href="?nav=admins">Администраторы</a> </td>
	      	<td rowspan="3" id="navResult">

	      		<div>
	      		<form method='POST' action='controller_admin.php?nav=topic'>
	      			<input type='text' name='action' hidden value='createTopic' >
					<input type='text' name='newTopicName' value='' placeholder="Название темы">
					<input type='submit' value='Создать тему'>
				</form>
	      		</div>
		      	<table class="table">

				  	<thead>
				    	<tr >
					      	<th width=20%>Название</th>
					      	<th width=20%>Всего вопросов</th>
					      	<th width=20%>Опубликовано</th>
					      	<th width=20%>Без ответа</th>
					      	<th width=20%>Удалить</th>
				    	</tr>
				  	</thead>
				  	<tbody>

	      			<?php 
	      				for ($i = 0; $i < count($topics); $i++ ){
	      					echo '<tr>
	      							  <td>'.$topics[$i]['topic_name'].'</td>
	      							  <td>'.$topics[$i]['allCountQues'].'</td>
	      							  <td>'.$topics[$i]['allQuesWait'].'</td>
	      							  <td>'.$topics[$i]['allQuesWA'].'</td>
	      							  <td>'.
	      							  	"<form method='POST' action='controller_admin.php?nav=topic'>
	      									<input type='text' name='topicId' hidden value='".$topics[$i]['id']."'>
	      									<input type='text' name='action' hidden value='deleteTopic'>
											<input type='submit'value='Удалить тему'>
    									</form>".'</td>
	      						  </tr>';
	      				}
	      			?>
	      			</tbody>
				</table>

	      	</td>
	    </tr>
	    <tr>
	      	<td> <a href="?nav=topic">Темы</a> </td>
	    </tr>
	    <tr>
	      	<td> <a href="?nav=questions">Вопросы</a> </td>
	    </tr>

	  </tbody>
	</table>
	
	<div>
		<h3 style='text-align: center;'><?=$result?></h3>
	</div>

</body>
</html>