<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Список тестов</title>
</head>
<body>
	
	<?
	echo "<a href=admin.php>Загрузить тест</a><br>";
	$filelist = glob("list/*.json");
    foreach ($filelist as $filename){
        //echo $filename." и его размер: ".filesize($filename)." байт <br>";
        $index1 = strrpos($filename, "_");
        $index2 = strrpos($filename, ".");
        $testNumber = substr($filename,$index1 + 1, $index2-$index1-1);
        //echo "num $testNumber <br>";
        echo "<a href=./test.php?x=$testNumber>Test_$testNumber</a><br>";
	}
	?>
	
</body>
</html>