<?php
	//получаем данные из cmd
	//var_dump($argv);
	
	if (count($argv) >= 3){
		$date = date("Y-m-d"); 

		$arrDescr = array_slice($argv, 2);
		$myStr1 = implode(" ", $arrDescr);
		$myStr = $date.", ".(float)$argv[1].", ".$myStr1;

	    //осуществляем запись в файл
	    $fp = fopen('money_table.csv', 'ab');
	    if (is_writable ('money_table.csv')){
		    fputcsv($fp, [$date, (float)$argv[1], $myStr1]);
		    fclose($fp);
			
		    echo 'Добавлена строка: '.$myStr;
		} else {
			echo 'Файл не доступен для записи!';
		}


	} elseif ((count($argv) == 2) and ($argv[1] == "--today")){
		//если передан флаг, то считаем сумму за день
		$allCost = 0;
		$today = date('Y-m-d');
		//$file = file_get_contents('money_table.csv', true); //получаем содержимое файла
		//$pieces = explode("\n", $file); //разбиваем файл на массив по строкам

		$handle = fopen('money_table.csv', "r+");
		while ( ( $csv = fgetcsv($handle, 1000, ",") ) !== false ) {
			//$csv - массив из разобранной строки
			//var_dump ($csv);
			if ($csv[0] == $today){
				$allCost = $allCost + $csv[1];
			}
		}
		fclose($handle);
		echo "$today расход за текущий день: ".$allCost;
	} else {echo "Ошибка! Аргументы не заданы. Укажите флаг --today или запустите скрипт с аргументами {цена} и {описание покупки}";}
?>