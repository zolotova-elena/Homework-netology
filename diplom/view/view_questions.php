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
	      	<td> <a href="../controller/controller_dataPanel.php?action=admins">Администраторы</a> </td>
	      	<td rowspan="3" id="navResult">
		      	<table class="table">

				  	<thead>
				    	<tr >
					      	<th width=25%>Логин</th>
					      	<th width=25%>Пароль</th>
					      	<th width=25%>Логин</th>
					      	<th width=25%>Пароль</th>
				    	</tr>
				  	</thead>
				  	<tbody>

	      			<?php 
	      			//var_dump($dataArrayQuestions);
	      			for ($i = 0; $i < count($dataArrayQuestions); $i++ ){
	      			//var_dump($i);
	      				echo "<tr>".
	      						"<td>".$dataArrayQuestions[$i]['question']."</td>".
	      						"<td>".$dataArrayQuestions[$i]['answer']."</td>".
	      						"<td>".$dataArrayQuestions[$i]['question_dateCreate']."</td>".
	      						"<td>".$dataArrayQuestions[$i]['status']."</td>".
	      					 "</tr>";
	      			}

	      			?>
	      			</tbody>
				</table>

	      	</td>
	    </tr>
	    <tr>
	      	<td> <a href="../controller/controller_dataPanel?action=topic">Темы</a> </td>
	    </tr>
	    <tr>
	      	<td> <a href="../controller/ccontroller_dataPanel?action=questions">Вопросы</a> </td>
	    </tr>

	  </tbody>
	</table>
	
</body>
</html>