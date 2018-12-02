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
	      	<td> <a href="../controller/controller_admin.php?nav=admins">Администраторы</a> </td>
	      	<td rowspan="3">
		      
	      	</td>
	    </tr>
	    <tr>
	      	<td> <a href="../controller/controller_admin?nav=topic">Темы</a> </td>
	    </tr>
	    <tr>
	      	<td> <a href="../controller/controller_admin?nav=questions">Вопросы</a> </td>
	    </tr>

	  </tbody>
	</table>

	<br>
	<div>
		<a href="../controller/controller_admin?nav=exit">Выйти</a>
	</div>
	
</body>
</html>