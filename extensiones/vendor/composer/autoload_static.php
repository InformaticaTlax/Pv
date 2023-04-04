<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaafafed39b098674a562816ef071a124
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mike42\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mike42\\' => 
        array (
            0 => __DIR__ . '/..' . '/mike42/escpos-php/src/Mike42',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaafafed39b098674a562816ef071a124::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaafafed39b098674a562816ef071a124::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitaafafed39b098674a562816ef071a124::$classMap;

        }, null, ClassLoader::class);
    }
}