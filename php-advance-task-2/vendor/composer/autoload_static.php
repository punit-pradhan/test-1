<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4e5aeaf65a996827e952dc53dc90c869
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'I' => 
        array (
            'Innoraft\\Task2\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Innoraft\\Task2\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4e5aeaf65a996827e952dc53dc90c869::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4e5aeaf65a996827e952dc53dc90c869::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4e5aeaf65a996827e952dc53dc90c869::$classMap;

        }, null, ClassLoader::class);
    }
}