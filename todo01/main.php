<?php
	error_reporting(E_ALL);
	ini_set("display_error", true);
	ini_set("error_reporting", E_ALL);

	session_start();

	$userId =   $_SESSION['id'];

	if (empty($userId)){
		header('Content-Type: text/html; charset= utf-8'); 
		http_response_code(403);
		die('Доступ запрещен');
	}

	//$pdo = new PDO("mysql:host=localhost;dbname=ezolotova;charset=utf8", "ezolotova", "neto1812", [
	$pdo = new PDO("mysql:host=localhost;dbname=TBL;charset=utf8", "root", "", [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true
	]);
	if (!empty($_GET['id']) && !empty($_GET['action'])) {
			if (($_GET['action'] == 'edit') && !empty($_POST['description'])) {
					//$sql = "UPDATE task SET description = ? WHERE id = ?";
					$sql = "UPDATE task SET description ='".$_POST['description']."' WHERE id ='".$_GET['id']."'";
					$statement = $pdo->prepare($sql);
					var_dump($sql);
					$statement->execute();
					//$statement->execute(["{$_POST['description']}", "{$_GET['id']}"]);
					header( 'Location: ./main.php');	
			} else {
					$sql = "SELECT * FROM task WHERE user_id=$userId";
			}
			if ($_GET['action'] == 'done') {
					$sql = "UPDATE task SET is_done = 1 WHERE id = ?";
					$statement = $pdo->prepare($sql);
					$statement->execute(["{$_GET['id']}"]);
					header( 'Location: ./main.php');		
			}
			
			if ($_GET['action'] == 'delete') {
					$sql = "DELETE FROM task WHERE id = ?";
					$statement = $pdo->prepare($sql);
					$statement->execute(["{$_GET['id']}"]);
					header( 'Location: ./main.php');
			} 
	}

	//делегирование
	$sql = "SELECT id, login FROM user WHERE id NOT IN (".$userId.")";
	$astat = $pdo->prepare($sql);
	$astat->execute();
	$assignedUserList = $astat->fetchAll(PDO::FETCH_ASSOC);

	    	
	    	//var_dump($_POST["task_id"]);
	if( !empty($_POST["task_id"]) && !empty($_POST['assigned_user_id'])){
		$assigned_user_id = $_POST['assigned_user_id'];
		$task_id = $_POST["task_id"];
		//var_dump($assigned_user_id);
		//var_dump($task_id );
		$sql = "UPDATE task SET assigned_user_id=$assigned_user_id WHERE id=$task_id AND user_id=$userId";
		$stat = $pdo->prepare($sql);
		$stat->execute();
	}

	$sql11 = "SELECT t.id, t.description, t.date_added, t.is_done, u.login FROM task t INNER JOIN user u ON u.id=t.assigned_user_id WHERE t.assigned_user_id = $userId";
	$astat11 = $pdo->prepare($sql11);
	$astat11->execute();
	$res = $astat11->fetchAll(PDO::FETCH_ASSOC);
	//var_dump($res);


	//количество дел
	$sql1 = "SELECT count(*) AS C FROM task WHERE task.user_id =$userId OR task.assigned_user_id =$userId";
	$astat1 = $pdo->prepare($sql1);
	$astat1->execute();
	$coun = $astat1->fetchAll(PDO::FETCH_ASSOC);

	if (!empty($_POST['description']) && empty($_GET['action'])) {
		$date = date('Y-m-d H:i:s');
		$sql = "INSERT INTO  task (user_id, description, date_added) VALUES ($userId, ?, ?)";
		$statement = $pdo->prepare($sql);
		$statement->execute(["{$_POST['description']}", "{$date}"]);
	}
	if (!empty($_POST['sort']) && !empty($_POST['sort_by'])) {
		$sql = "SELECT * FROM task WHERE user_id=$userId ORDER BY {$_POST['sort_by']} ASC";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	} else {
		//var_dump($_SESSION);
		$userId = $pdo->quote($userId);
		$sql = "SELECT * FROM task WHERE user_id=".$userId;
		$statement = $pdo->prepare($sql);
		$statement->execute();
}
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
	  <meta charset="utf-8">
    <title>Список дел на сегодня</title>
		<style>
		  form {
				margin-bottom: 1rem;
				margin-right: 1rem;
				float: left;
			}
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
	  <h1>Список дел</h1>

  	<form method="POST">
			<input type="text" name="description" placeholder="Описание задачи" value="<?php if (!empty($_GET['description'])) echo $_GET['description']; ?>">
      <input type="submit" name="save" value="Сохранить">
		</form>

    <form method="POST">
		  <label for="sort">Сортировать по:</label>
			<select name="sort_by">
			  <option value="date_added">Дате добавления</option>
				<option value="is_done">Статусу</option>
				<option value="description">Описанию</option>
			</select>
			<input type="submit" name="sort" value="Отсортировать">
    </form>

		<table>
		  <tr>
			  <th>Описание задачи</th>
				<th>Дата добавления</th>
				<th>Статус</th>
				<th>Действие</th>
				<th>Исполнитель</th>
				<th>Делегированные дела</th>
			</tr>
			<?php foreach ($statement as $row) { 
				$task_id = $row['id'];
				//var_dump($row);
				
			?>
			<tr>
				<td><?php echo htmlspecialchars($row['description']); ?></td>

				<td><?php echo htmlspecialchars($row['date_added']); ?></td>

				<td <?php if ($row['is_done'] == 1) echo 'style="color: green;"'; ?>>
				  <?php if ($row['is_done'] == 0) {
				    echo 'В процессе';
				  } else {
				    echo 'Выполнено';
				  } ?>
				</td>

				<td>
				  <a href="?id=<?php echo $row['id']; ?>&action=edit&description=<?php echo $row['description']; ?>">Изменить</a>
				  <a href="?id=<?php echo $row['id']; ?>&action=done">Выполнить</a>
				  <a href="?id=<?php echo $row['id']; ?>&action=delete">Удалить</a>
				</td>
				<td>
					<form action="main.php" method="POST">
						<input name="task_id" type="hidden" value="<?= $task_id ?>">
						<select name='assigned_user_id'>
						<?php
						for ($j = 0; $j < count($assignedUserList); $j++){ 
							$assignedUser = $assignedUserList[$j];
							if ($assignedUser['login']){
								echo "<option value='".$assignedUser['id']."'>".$assignedUser['login']."</option>";
							}
						} 
						?>
						</select>
						<button type="submit">Делегировать</button>
					</form>
				</td>

				<td>
				<?php
					if (!empty($row['assigned_user_id'])) {
						$sqlDel = "SELECT login FROM user WHERE id=".$row['assigned_user_id'];
						$astatDel = $pdo->prepare($sqlDel);
    					$astatDel->execute();
    					$assignedUserListDel = $astatDel->fetch(PDO::FETCH_ASSOC);
    					//var_dump($assignedUserListDel['login']);
						echo $assignedUserListDel['login'];
					}
				?>
				</td>
			</tr>
			<?php } ?>
		</table>

		<?php
			if (count($res) > 0){
				echo '<h3>Переданные мне задачи:</h3>';
				echo '<table>
		  			<tr>
					    <th>Описание задачи</th>
						<th>Дата добавления</th>
						<th>Статус</th>
						<th>Действие</th>
						<th>Основатель дела</th>
					</tr>';
				for ($k = 0; $k < count($res); $k++){
					echo '<tr>';
					echo '<td>'.$res[$k]['description'].'</td>';
					echo '<td>'.$res[$k]['date_added'].'</td>';	
					if ($res[$k]['is_done'] == 0){
						echo '<td>В процессе</td>';
					} else {
						echo '<td>Выполнено</td>';
					}
					?>
					<td>
						<a href="?id=<?php echo $res[$k]['id']; ?>&action=edit&description=<?php echo $res[$k]['description']; ?>">Изменить</a>
				  		<a href="?id=<?php echo $res[$k]['id']; ?>&action=done">Выполнить</a>
				  		<a href="?id=<?php echo $res[$k]['id']; ?>&action=delete">Удалить</a>
				  	</td>
					<?php
					echo '<td>'.$res[$k]['login'].'</td>';		
					echo '</tr>';
					
				}
				echo '</table>';
				
			}
		?>

		<h3>Итого дел: <?php  echo $coun[0]['C']; ?></h3>

		<a href="logout.php">Выход</a>
		
  </body>
</html>