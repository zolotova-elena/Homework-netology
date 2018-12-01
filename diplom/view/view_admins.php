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
	      		<form method='POST' action='controller_admin.php?nav=admins'>
	      			<input type='text' name='action' hidden value='createAdmin' >
					<input type='text' name='newLog' value='' placeholder="Логин">
					<input type='text' name='newPass' value='' placeholder="Пароль">
					<input type='submit' value='Создать администратора'>
				</form>
	      		</div>
		      	<table class="table">

				  	<thead>
				    	<tr >
					      	<th width=33%>Логин</th>
					      	<th width=33%>Новый пароль</th>
					      	<th width=33%></th>
				    	</tr>
				  	</thead>
				  	<tbody>

	      			<?php 
	      			//var_dump($dataArrayAdmins);
	      			for ($i = 0; $i < count($loginsAndIds); $i++ ){
	      			//var_dump($i);
	      				echo "<tr>".
	      						"<td>".$loginsAndIds[$i]['login']."</td>".
	      						"<td>"."<form method='POST' action='controller_admin.php?nav=admins'>
	      									<input type='text' name='idAdmin' hidden value='".$loginsAndIds[$i]['id']."'>
	      									<input type='text' name='action' hidden value='changeAdminPass'>
											<input type='text' name='newPass'>
											<input type='submit' value='Изменить'>
    									</form>".
    							"</td>".
    							"<td>"."<form method='POST' action='controller_admin.php?nav=admins'>
	      									<input type='text' name='idAdmin' hidden value='".$loginsAndIds[$i]['id']."'>
	      									<input type='text' name='action' hidden value='deleteAdmin'>
											<input type='submit'value='Удалить администратора'>
    									</form>".
    							"</td>".
	      					 "</tr>";
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