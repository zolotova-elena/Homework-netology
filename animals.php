<!DOCTYPE>
<html lang="ru">
    <head>
        <title>Домашенее задание "Жестокое обращение с животными"</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        <style>
            body {
                font-family: 'Playfair Display', serif;  
            }
        </style>
    </head>
    <body>
		<?php
			//задание на нетологию "Жестокое обращение с животными"
			//часть 1
			$myArray = ["Africa"=> array("Mammuthus columbi", "Diptychus", "Anthus spinoletta"),
						"Australia"=>array("Grus virgo", "Ardea cinerea"), 
						"Antarctica"=>array("Equus hemionus", "Poephagus grunmens", "Motacilla citreola"), 
						"South America"=>array("Nemachilus", "Bufo viridis", "Canis lupus"),
						"North America"=>array("Luscinia pectoralis", "Saussurea hieracifolia", "Podarces"),
						"Eurasia"=>array("Buteo hemilasius")];		
			//print_r($myArray);

			//часть 2
			$newAr;
			$arrayForTwoWords = array(); //массив для хранения названий животных, состоящих из 2х слов
			foreach($myArray as $key => $value){
				foreach ($value as $elem){
					if (str_word_count($elem, 0) == 2){ //ищем количество слов в строке, если 2, то лобавляем в массив
						array_push($arrayForTwoWords,$elem);
					}
				}
			}
			//print_r($newAr);

			//часть 3 
			$word1 = array();
			$word2 = array();
			foreach ($arrayForTwoWords as $elem){
				$sim1 = strtok($elem, " "); //$sim1 - переменная для промежуточного хранения первого слова имени
				$pos = 1 + stripos($elem, " "); // получаем номер символа в строке 
				$sim2 = substr($elem, $pos); //получаем подстроку начина с номера $pos
				array_push($word1,$sim1); //добавляем в массив слова
				array_push($word2,$sim2); 
			}

			echo "<b>Рандомные названия животных для 3й части задания</b></br>";

			$resArr = array(); //массив для доп.части хранит континет и рандомные имена животных
			foreach ($myArray as $key => $value){$resArr[$key] = array();}

			for ($i = 0; $i < count($arrayForTwoWords); $i++) {
				$r1 = rand(0, count($word1)-1); //получаем случайное число для первого слова
				$r2 = rand(0, count($word2)-1);
				$newWord = $word1[$r1]." ".$word2[$r2];
				//дополнительное начало
				foreach($myArray as $key => $value){
					foreach ($value as $elem){
						if (str_word_count($elem, 0) == 2){ 
							$s = strtok($elem, " ");
							if ($s == $word1[$r1]){
								array_push($resArr[$key],$newWord);
							}
						}
					}
				}
				//дополнительное конец

				unset($word1[$r1]); //удаляем элемент из массива
				sort($word1);       //сортируем для сдвига индексов
				unset($word2[$r2]);
				sort($word2); 
				$n = $i + 1; 
				echo "$n) $newWord<br>";
			}

			//Дополнительно вывод
			echo "</br>Нзвание континетов и рандомных животных для дополнительной части</br>";
			foreach($resArr as $key => $value){
				echo "<h2>$key</h2>";
				$str = "";
				for ($i = 0; $i < count($value); $i++){
					if ($i != (count($value)-1)){
						$str = $str.$value[$i].", ";
					} else{$str = $str.$value[$i].".";} 
				}
				echo "<p>$str</p>";
			}
			//print_r($resArr);
		?>
    </body>
</html>