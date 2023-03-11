<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite6f593a5cca5795be2248044605e53a8
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Lalit\\Codeland\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Lalit\\Codeland\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInite6f593a5cca5795be2248044605e53a8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite6f593a5cca5795be2248044605e53a8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite6f593a5cca5795be2248044605e53a8::$classMap;

        }, null, ClassLoader::class);
    }
}
