<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4eeffbc4b77e66b4a81efa64419590a7
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dip\\' => 4,
            'Dip1\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dip\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controller',
        ),
        'Dip1\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4eeffbc4b77e66b4a81efa64419590a7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4eeffbc4b77e66b4a81efa64419590a7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
