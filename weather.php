<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сложные погодные условия</title>
</head>
<body>
    <?
    $data = @file_get_contents("http://api.openweathermap.org/data/2.5/forecast/daily?q=Rostov-on-Don&mode=json&units=metric&cnt=3&lang=ru&appid=6c9bf9d6535fdd1801609815ff74f630");

    echo "<h2>Погода на следующие три дня</h2>";

    if($data != ''){
        $dataJson = json_decode($data);
        //print_r($dataJson);
        $arrayDays = $dataJson->list;
        //print_r($arrayDays);
        $i = 1;
        foreach($arrayDays as $oneDay){
            
            echo "<h3>День $i</h3>";
            echo "Температура ночью: " . $oneDay->temp->night . "<br/>";
            echo "Температура днем: " . $oneDay->temp->day . "<br/>";
            echo "Погодные условия: " . $oneDay->weather[0]->description . "<br/>";
            echo "Давление: " . $oneDay->pressure . "<br/>";
            echo "Скорость ветра: " . $oneDay->speed . "<br/>";
            echo "Влажность: " . $oneDay->humidity . "<br/>";
            echo "Утром: " . $oneDay->temp->morn . "<br/>";      
            echo "Ночью: " . $oneDay->temp->night . "<br/>";    
            echo "<hr/>";
            $i++;
        }
    }else{
        echo "Ошибка, JSON пустой!";
    }
    ?>
</body>
</html>
