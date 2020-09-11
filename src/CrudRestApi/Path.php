<?php

namespace CrudRestApi;

class Path
{

    public static function configPath()
    {
        return __DIR__.'/config';
    }

    public static function migrationsPath()
    {
        return __DIR__."/migrations";
    }

    public static function basePath()
    {
        return __DIR__;
    }

    public static function composerPath()
    {
        return dirname(__DIR__, 2);
    }

}
