<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb730fc1bf33756b8e89ce5784eb1e96d
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb730fc1bf33756b8e89ce5784eb1e96d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb730fc1bf33756b8e89ce5784eb1e96d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb730fc1bf33756b8e89ce5784eb1e96d::$classMap;

        }, null, ClassLoader::class);
    }
}
