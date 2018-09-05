<?
	
header('Content-Type: text/html; charset= utf-8');

	require_once 'functions.php';
	if (!isAuthrized()){
		http_response_code(403);
		die('Доступ запрещен');
	}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  </head>

  <body>
	<h3> <?=  'Привет, '.getAuthrizedUser()?> </h3>

	<a href="logout.php">Выход</a>
  </body>
</html>