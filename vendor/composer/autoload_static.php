<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf570a35e27246f37d14a5b646a957bf9
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MyApp\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MyApp\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'MyApp\\Dbh' => __DIR__ . '/../..' . '/classes/Dbh.php',
        'MyApp\\Login\\Control' => __DIR__ . '/../..' . '/classes/Login/Control.php',
        'MyApp\\Login\\Model' => __DIR__ . '/../..' . '/classes/Login/Model.php',
        'MyApp\\Signup\\Control' => __DIR__ . '/../..' . '/classes/Signup/Control.php',
        'MyApp\\Signup\\Model' => __DIR__ . '/../..' . '/classes/Signup/Model.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf570a35e27246f37d14a5b646a957bf9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf570a35e27246f37d14a5b646a957bf9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf570a35e27246f37d14a5b646a957bf9::$classMap;

        }, null, ClassLoader::class);
    }
}
