<?php
	//phpinfo();

	//переменную из cmd 
	$q = "";
	for ($i = 1; $i < count($argv); $i++){
		if ( $i != count($argv)-1) $q = $q.$argv[$i]." ";
		else $q = $q." ".$argv[$i];
	}
	if (!$q) {echo "Введите что-то в поиск"; die;}
	
	$url = "https://www.googleapis.com/books/v1/volumes?q=".urlencode($q);
	$data = file_get_contents($url);
	$json = json_decode($data, true);
	//обработка ошибок
	if (!$json) {echo "Данные отсутствуют!";die;}
	switch (json_last_error()) {
        case JSON_ERROR_NONE:
            getStrs($json);
        break;
        case JSON_ERROR_DEPTH:
            echo ' - Достигнута максимальная глубина стека';
        break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' - Некорректные разряды или несоответствие режимов';
        break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' - Некорректный управляющий символ';
        break;
        case JSON_ERROR_SYNTAX:
            echo ' - Синтаксическая ошибка, некорректный JSON';
        break;
        case JSON_ERROR_UTF8:
            echo ' - Некорректные символы UTF-8, возможно неверно закодирован';
        break;
        default:
            echo ' - Неизвестная ошибка';
        break;
    }
	//echo "<br/>";
	function getStrs($json){
		//пербор всех книг и построчная запись в файл
		for ($i = 0; $i < count($json["items"]); $i++){
			$authors = '';
			//получение id 
			$id = $json["items"][$i]['id'];
			if ($id == ""){$id = "Отсутствует!";} 
			//получение названия
			$title = $json["items"][$i]['volumeInfo']['title'];
			if ($title == ""){$title = "Отсутствует!";} 

			//перебор всех авторов
			//var_dump(array_key_exists('authors', $json["items"][$i]['volumeInfo']));
			if (array_key_exists('authors', $json["items"][$i]['volumeInfo'])) { 

				$auth = $json["items"][$i]['volumeInfo']['authors'];

				if ($auth == ""){$auth = "Отсутствует!";}
				else {
					//var_dump("счет1 ".$auth);
					for ($j = 0; $j < count($auth); $j++ ){
						if ($j == (count($auth) - 1)) {
							$authors = $authors.$json["items"][$i]['volumeInfo']['authors'][$j];
						} else {$authors = $authors.$json["items"][$i]['volumeInfo']['authors'][$j]."/ ";}
					}
				}
			} else {$auth = "Отсутствует!";}

			//передаем данные в файл с переносом строки
			$str = $id.", ".$title.", ".$authors."\n";
			file_put_contents('books.csv',[$str], FILE_APPEND);

		}
		echo "Посмотри в файл books.csv";
	}
?>