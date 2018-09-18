<?php
	$adres = "index.php?n=";
	$thisTable;
	$pdo = new PDO("mysql:host=localhost;dbname=TBL;charset=utf8", "root", "", [
		  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	]);
	/*
	$sql = "CREATE TABLE `product` ( `id` int(11) NOT NULL AUTO_INCREMENT,
									  `name` int(11) DEFAULT NULL,
									  `description` varchar(500) NOT NULL,
									  `date_create` timestamp NULL DEFAULT NULL,
									  PRIMARY KEY (`id`)
									) ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
	$pdo->exec($sql);
    echo "Таблица product готова к использованию.";
    */
   
   //SHOW TABLES
    $sql = "SHOW TABLES";
	$tables = $pdo->prepare($sql);
	$tables->execute();

	if ( !empty($_GET['n']) and count($_GET) === 1) {
		$tableName = $_GET['n'];
		$thisTable = $tableName;
		$tableInfo = $pdo->prepare("DESCRIBE $tableName");
		$tableInfo->execute();
	}

	if ( !empty($_GET['n']) and !empty($_GET['table']) and !empty($_GET['updateField']) and count($_GET) === 3) {
		if (!empty($_POST['new_name'])){
			$newName = $_POST['new_name'];
			var_dump($newName);
			$name = $_GET['n'];
			$tn = $_GET['table'];
			$stm = $pdo->prepare("ALTER TABLE $tn CHANGE $name $newName VARCHAR(50)");
			$stm->execute();
			header( 'Location: ./index.php?n=$tn');
		} 
		
	}
	if ( !empty($_GET['n']) and !empty($_GET['table']) and !empty($_GET['updateType']) and count($_GET) === 3) {
		if (!empty($_POST['new_type'])){
			$newType = $_POST['new_type'];
			$name = $_GET['n'];
			$tn = $_GET['table'];
			$stm1 = $pdo->prepare("ALTER TABLE $tn MODIFY $name $newType");
			$stm1->execute();
			header( 'Location: ./index.php?n=$tn');
		}
	}
	if ( !empty($_GET['n']) and !empty($_GET['table']) and !empty($_GET['delete']) and count($_GET) === 3) {
		$name = $_GET['n'];
		$tn = $_GET['table'];
		$stm2 = $pdo->prepare("ALTER TABLE $tn DROP COLUMN $name");
		$stm2->execute();
		header( 'Location: ./index.php?n=$tn');
	}
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
	  <meta charset="utf-8">
    <title>Информация о таблицах</title>
    <style type="text/css">
    	  table {
				clear: both;
			}
		  th {
				background: #eee;
			}
			th, td {
				padding: 5px;
				border: 1px solid #ccc;
			}
    </style>

  </head>
	<body>
	  <h1>Информация о таблицах</h1>
	  	<ul>
	  	<?php 
	  		foreach ($tables as $row){
				for($i = 0; $i < count($row); $i++){
					?>
					<li><a href="<?php echo $adres.$row[$i]; ?>"><?php echo "$row[$i]";?></a></li>
					<?php
				}
		
			}
	  	?>
		</ul>
	  	<table>
	  		<tr>
	  			<td>Имя</td>
	  			<td>Тип</td>
	  			<td>Действие</td>
	  		</tr>
			<?php
				if (!$tableInfo){die;}
				foreach ($tableInfo as $row) {
					echo "<tr>";
					echo "<td>".$row['Field']."</td>";
					echo "<td>".$row['Type']."</td>";
					echo "<td>";
					?>
						
						<form  method="POST">
							<input name="new_name" type="text" > 
							<button type="submit"><a href="<?php echo $adres.$row['Field'].'&table='.$thisTable; ?>&action=updateField">Изменить имя</a></button>
						</form>

						<form  method="POST">
							<input name="oldType" type="hidden" value="<?php echo $row['Type']; ?>"> 
							<select name="new_type">
								<option>int(11)</option>
								<option>VARCHAR(50)</option>
								<option>timestamp</option>
							</select>
							<button type="submit"><a href="<?php echo $adres.$row['Field'].'&table='.$thisTable; ?>&action=updateType">Изменить тип</a></button>
						</form>
					  	<a href="<?php echo $adres.$row['Field'].'&table='.$thisTable; ?>&action=delete">Удалить</a>
					  	
				  	<?php
					echo "</tr>";
				}
			?>
	  		<tr>
	  			
	  		</tr>
	  	</table>
	  		 


  </body>
</html>