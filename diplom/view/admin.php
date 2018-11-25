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
	      	<td> <a href="../controller/adminController.php?action=admins">Администраторы</a> </td>
	      	<td rowspan="3" id="navResult">
		      	<table class="table">

				  	<thead>
				    	<tr >
					      	<th width=50%>Логин</th>
					      	<th width=50%>Пароль</th>
				    	</tr>
				  	</thead>
				  	<tbody>
	      			<?php 
	      			for ($i = 0; $i < count($dataArrayAdmins); $i++ ){
	      				echo "<tr>
	      						<td>$dataArrayAdmins[$i]['login']<td>
	      						<td>$dataArrayAdmins[$i]['password']<td> 

	      					 </tr>";
	      			}

	      			?>
	      			</tbody>
				</table>

	      	</td>
	    </tr>
	    <tr>
	      	<td> <a href="controller.php?action=topic">Темы</a> </td>
	    </tr>
	    <tr>
	      	<td> <a href="controller.php?action=questions">Вопросы</a> </td>
	    </tr>

	  </tbody>
	</table>
	
</body>
</html>