<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit2ccaa3b6b3b18bdcfa6551cb4b13088d
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit2ccaa3b6b3b18bdcfa6551cb4b13088d', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit2ccaa3b6b3b18bdcfa6551cb4b13088d', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit2ccaa3b6b3b18bdcfa6551cb4b13088d::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInit2ccaa3b6b3b18bdcfa6551cb4b13088d::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire2ccaa3b6b3b18bdcfa6551cb4b13088d($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire2ccaa3b6b3b18bdcfa6551cb4b13088d($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
