<?php
	//var_dump($argv);
	$contryRes = "";
	if (count($argv) >= 2){
		$contry = array_slice($argv, 1);
		$contryRes = implode(" ", $contry);
		//var_dump( $contry);
	}
	
	if (count($argv) > 1 ){
		$handle = fopen('cont.csv', "r+");
		while ( ( $csv = fgetcsv($handle, 1000, ",") ) !== false ) {
			//var_dump($csv[1]);
			if ($csv[1] == $contryRes){
				echo "$contryRes: $csv[4]";  
				fclose($handle);
				die;
			}
		}

		echo "Coвпадений нет!";
		
	} else {echo "Ввод не верен";}
?>