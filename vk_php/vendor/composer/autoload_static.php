<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit55fee7bfebf6e92b8e89996c2f6e3087
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'DigitalStar\\vk_api\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'DigitalStar\\vk_api\\' => 
        array (
            0 => __DIR__ . '/..' . '/digitalstars/simplevk/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit55fee7bfebf6e92b8e89996c2f6e3087::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit55fee7bfebf6e92b8e89996c2f6e3087::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit55fee7bfebf6e92b8e89996c2f6e3087::$classMap;

        }, null, ClassLoader::class);
    }
}
