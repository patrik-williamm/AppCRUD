<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit997de6dc25345b3c97272470fbe5f40e
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit997de6dc25345b3c97272470fbe5f40e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit997de6dc25345b3c97272470fbe5f40e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit997de6dc25345b3c97272470fbe5f40e::$classMap;

        }, null, ClassLoader::class);
    }
}