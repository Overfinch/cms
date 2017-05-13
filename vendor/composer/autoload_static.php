<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit45fc6c8304d610f17f00c5e7368893d3
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Engine\\' => 7,
        ),
        'C' => 
        array (
            'Cms\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Engine\\' => 
        array (
            0 => __DIR__ . '/../..' . '/engine',
        ),
        'Cms\\' => 
        array (
            0 => __DIR__ . '/../..' . '/cms',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit45fc6c8304d610f17f00c5e7368893d3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit45fc6c8304d610f17f00c5e7368893d3::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
