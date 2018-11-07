<?php
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
	
	if ( !empty($_POST['n']) and !empty($_POST['table']) and ($_POST['action'] == 'updateField') )  {
		if (!empty($_POST['new_name'])){
			//echo "обновить имя";
			$newName = $_POST['new_name'];
			$name = $_POST['n'];
			$tn = $_POST['table'];
			//$newName = $pdo->quote($newName);
			//$name = $pdo->quote($name);
			//$tn = $pdo->quote($tn);
			$stm = $pdo->prepare("ALTER TABLE ".$tn." CHANGE ".$name." ".$newName." VARCHAR(50)");
			$stm->execute();
			//header( 'Location: ./index.php?n=$tn');
		} 
		
	}
	if ( !empty($_POST['n']) and !empty($_POST['table']) and $_POST['action'] == 'updateType' )  {
		if (!empty($_POST['new_type'])){
			$newType = $_POST['new_type'];
			$name = $_POST['n'];
			$tn = $_POST['table'];
			//var_dump("ALTER TABLE ".$tn." MODIFY ".$name." ".$newType);
			$stm1 = $pdo->prepare("ALTER TABLE ".$tn." MODIFY ".$name." ".$newType);
			$stm1->execute();
			//header( 'Location: ./index.php?n=$tn');
		}
	}
	if ( !empty($_POST['n']) and !empty($_POST['table']) and $_POST['action'] == 'delete' ) {
		//echo "удалить";
		$name = $_POST['n'];
		$tn = $_POST['table'];
		$stm2 = $pdo->prepare("ALTER TABLE ".$tn." DROP COLUMN ".$name);
		$stm2->execute();
		//header( 'Location: ./index.php?n=$tn');
	}

	if ( !empty($_GET['n']) ) {
		$tableName = $_GET['n'];
		$thisTable = $tableName;
		$tableInfo = $pdo->prepare("DESCRIBE $tableName");
		$tableInfo->execute();
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
					<li><a href="<?php echo "index.php?n=".$row[$i]; ?>"><?php echo "$row[$i]";?></a></li>
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
							<input name="n"  type="hidden" value="<?=$row['Field'];?>"> 
							<input name="table"  type="hidden" value="<?=$thisTable;?>"> 
							<input name="action"  type="hidden" value="updateField"> 
							<button type="submit">Изменить имя</button>
						</form>

						<form  method="POST">
							<input name="oldType" type="hidden" value="<?php echo $row['Type']; ?>"> 
							<input name="n"  type="hidden" value="<?=$row['Field'];?>"> 
							<input name="table"  type="hidden" value="<?=$thisTable;?>"> 
							<input name="action"  type="hidden" value="updateType"> 
							<select name="new_type">
								<option>int(11)</option>
								<option>VARCHAR(50)</option>
								<option>timestamp</option>
							</select>
							<button type="submit">Изменить тип</button>
						</form>
						
						<form  method="POST">
							<input name="n"  type="hidden" value="<?=$row['Field'];?>"> 
							<input name="table"  type="hidden" value="<?=$thisTable;?>"> 
							<input name="action"  type="hidden" value="delete"> 
							<button type="submit">Удалить</button>
						</form>
					  	
				  	<?php
					echo "</tr>";
				}
			?>
	  		<tr>
	  			
	  		</tr>
	  	</table>
	  		 


  </body>
</html>
