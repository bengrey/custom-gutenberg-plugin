<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8a518d40b975bed4e6a93faf003c6c5e
{
    public static $prefixLengthsPsr4 = array (
        'D' =>
        array (
            'Dealerdirect\\Composer\\Plugin\\Installers\\PHPCodeSniffer\\' => 55,
        ),
        'C' =>
        array (
            'CustomGutenberg\\' => 16,
        ),
        'B' =>
        array (
            'Bamarni\\Composer\\Bin\\' => 21,
        ),
        'A' =>
        array (
            'Auryn\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dealerdirect\\Composer\\Plugin\\Installers\\PHPCodeSniffer\\' =>
        array (
            0 => __DIR__ . '/..' . '/dealerdirect/phpcodesniffer-composer-installer/src',
        ),
        'CustomGutenberg\\' =>
        array (
            0 => __DIR__ . '/../..' . '/blocks',
        ),
        'Bamarni\\Composer\\Bin\\' =>
        array (
            0 => __DIR__ . '/..' . '/bamarni/composer-bin-plugin/src',
        ),
        'Auryn\\' =>
        array (
            0 => __DIR__ . '/..' . '/rdlowrey/auryn/lib',
        ),
    );

    public static $classMap = array (
	    'Composer\\InstalledVersions'      => __DIR__ . '/..' . '/composer/InstalledVersions.php',
	    'CustomGutenberg\\Demo\\TopSlider' => __DIR__ . '/../..' . '/blocks/demo/Demo.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8a518d40b975bed4e6a93faf003c6c5e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8a518d40b975bed4e6a93faf003c6c5e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8a518d40b975bed4e6a93faf003c6c5e::$classMap;

        }, null, ClassLoader::class);
    }
}