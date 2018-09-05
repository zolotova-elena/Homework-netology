<?php
$name = $_GET['n'];
function LoadPNG($imgname)
{
    /* Пытаемся открыть */
    $im = @imagecreatefrompng($imgname);

    /* Если не удалось */
    if(!$im)
    {
        /* Создаем пустое изображение */
        $im  = imagecreatetruecolor(150, 30);
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);

        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

        /* Выводим сообщение об ошибке */
        imagestring($im, 1, 5, 5, 'Ошибка загрузки ' . $imgname, $tc);
    }

    return $im;
}

header('Content-Type: image/png');

$img = LoadPNG('img36.png');

imagepng($img);
imagedestroy($img);

$color=ImageColorAllocate($img, 250, 100, 34); 
$h = 500; //высота
$w = 500; //ширина
/* выводим текст на изображение */
ImageTTFtext($img, 30, 0, $w, $h, $color, $name);
?>