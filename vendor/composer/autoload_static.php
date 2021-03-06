<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit12bdef48e7631fc30fed798303b2d2ae
{
    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'tjo\\' => 4,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'tjo\\' => 
        array (
            0 => __DIR__ . '/..' . '/tjo/core',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit12bdef48e7631fc30fed798303b2d2ae::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit12bdef48e7631fc30fed798303b2d2ae::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
