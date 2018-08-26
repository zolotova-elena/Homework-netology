<html>
<head>
	<title>Домашнее задание к лекции 2.1 «Установка и настройка веб-сервера»</title>
    <meta charset="utf-8">
	<style>
		td {
			border: 1px solid black;
		}
	</style>
</head>

<body>
	<table>
	<tr>
		<td>№</td>
		<td>Имя</td>
		<td>Фамилия</td>
		<td>Адрес</td>
		<td>Тел</td>
	</tr>
	<?
		$f_json = 'info.json';
		$json = file_get_contents("$f_json");
		$json = json_decode($json, true);
		$i = 1;
		foreach($json as $k => $v ){
	?>
	<tr>
		<td> 
			<? 
				echo $i; 
			?>		
		</td>
		<td>
			<? 
				if ($v['firstName']) {echo $v['firstName']; } 
			 	else {echo "Отсутствует!";} 
			?>	
		</td>
		<td>
			<? 
				if ($v['lastName']) {echo $v['lastName'];} 
				else {echo "Отсутствует!";}
			?>	
		</td>
		<td>
			<? 
				if ($v['address']) {echo $v['address'];} 
				else {echo "Отсутствует!";}
			?>
		</td>
		<td>
			<? 
				if ($v['phoneNumber']) {echo $v['phoneNumber'];} 
				else {echo "Отсутствует!";}
			?>
		</td>
	</tr>
	
	<?
		$i++;
		}

	?>
	</table>
</body>
</html>

















