<?php
	$q = "";
	for ($i = 1; $i < count($argv); $i++){
		if ($i == count($argv)-1) {$q = $q.$argv[$i];}
		else {$q = $q.$argv[$i]." ";};
	}
	//$q = '"Болгария"';
	$q = '"'.$q.'"';
	if (count($argv) > 1 ){
		$file = file_get_contents('cont.csv', true); //получаем содержимое файла
		$pieces = explode("\n", $file); //разбиваем файл на массив по строкам
		
		for ($i = 1; $i < count($pieces); $i++){
			$p = $pieces[$i];
			$pStr = explode(",", $p); 
			if ($pStr[1] == $q) {var_dump("$pStr[4]"); die;}
		}
		var_dump("Coвпадений нет!");
	} else {var_dump("Ввод не верен");}
?>