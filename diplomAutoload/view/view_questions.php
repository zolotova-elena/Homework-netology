<!--<!DOCTYPE html>-->
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Панель администратора</title>
	<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
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

		      	<table class="table">

				  	<thead>
				    	<tr >
					      	<th width=20%>Дата создания</th>
					      	<th width=20%>Вопрос</th>
					      	<th width=20%>Тема</th>
					      	<th width=20%>Удалить</th>
				    	</tr>
				  	</thead>
				  	<tbody>

	      			<?php 
	      				for ($i = 0; $i < count($allQues); $i++ ){
	      					echo '<tr>
	      							  <td>'.$allQues[$i]['question_dateCreate'].'</td>
	      							  <td>'.
	      							  		"<form method='POST' action='controller_admin.php?nav=questions'>
	      							  			<input type='text' name='topicId' hidden value='".$allQues[$i]['id']."'> 
	      							  			<input type='text' name='action' hidden value='updQues'>  
	      							  			<textarea name='newQues'>".$allQues[$i]['question']."</textarea>
	      							  			<input type='submit'value='Обновить вопрос'>
	      							  		</form>"

	      							  .'</td>
	      							  <td>---</td>
	      							  <td>'.
	      							  	"<form method='POST' action='controller_admin.php?nav=questions'>
	      									<input type='text' name='topicId' hidden value='".$allQues[$i]['id']."'>
	      									<input type='text' name='action' hidden value='deleteQues'>
											<input type='submit'value='Удалить вопрос'>
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

	<br>
	<div>
		<a href="?nav=exit">Выйти</a>
	</div>

</body>
</html>