<?php
	//получаем данные из cmd
	//var_dump($argv);
	
	if (count($argv) >= 3){
		$ar = [];
		$newStr = null;
		$date = date("Y-m-d");
		$newStr = $date.",".(int)$argv[1].",";
		$s = 'Добавлена строка: '.date('d').'.'.date('m').'.'.date('Y').', '.(int)$argv[1].',';
		//формируем строку для записи в файл
		for ($i = 2; $i < count($argv); $i++){
			$newStr = $newStr.$argv[$i]." ";
			$s = $s." ".$argv[$i];
		}	
		$newStr = $newStr."\n";

	    //осуществляем запись в файл
	    file_put_contents('money_table.csv',[$newStr], FILE_APPEND);
	    var_dump($s);

	} elseif ((count($argv) == 2) and ($argv[1] == "--today")){
		//если передан флаг, то считаем сумму за день
		$allCost = 0;
		
		$file = file_get_contents('money_table.csv', true); //получаем содержимое файла
		$pieces = explode("\n", $file); //разбиваем файл на массив по строкам

		for ($j = 0; $j < count($pieces)-1; $j++){
			$p = $pieces[$j];
			$d = $p[0].$p[1].$p[2].$p[3]."-".$p[5].$p[6]."-".$p[8].$p[9];//
				$dView = date('d').".".date('m').".".date('Y');
				if ($d == date('Y-m-d')) {
					$r = stripos($p, ','); //находим индекс символа в строке
					$r1 = strrpos($p, ',' , $r); //индекс второго символа в строке
					$cost = substr($p, $r+1, $r1 - $r -1); //выбераем подстроку с ценой
					$allCost = $allCost + $cost;

				}
		}
		
		var_dump("$dView расход за день: ".$allCost );
	} else {var_dump("Ошибка! Аргументы не заданы. Укажите флаг --today или запустите скрипт с аргументами {цена} и {описание покупки}");}
?>
