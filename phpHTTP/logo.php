<?php
header('Content-Type: image/png');
function LoadPNG($imgname)
{
    /* Пытаемся открыть */
    $im = @imagecreatefrompng($imgname);

    $name = $_GET['n'];
    $res = $_GET['r'];

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

$img = LoadPNG('img36.png');

imagepng($img);
imagedestroy($img);

$color=imagecolorallocate($img, 250, 100, 34); 
$h = 500; //высота
$w = 500; //ширина
$black = imagecolorallocate($im, 0, 0, 0);
$font = 'font.ttf';
/* выводим текст на изображение */
imagettftext($img, 30, 0, $w, $h, $black, $font, $name);
imagettftext($img, 30, 0, $w, $h + 32, $black, $font, $res);

