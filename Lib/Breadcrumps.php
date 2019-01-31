<?php

namespace App\Lib;

use App\Lib\Route as Route;

class Breadcrumps
{
    public static function getBreadcrumps()
    {
        $breadcrumps[] = 'main';
        if (Route::hasType()) {
            $type = Route::getType();
            $breadcrumps[] = $type;
        } else {
            $type = 'products';
            $breadcrumps[] = $type;
        }
        if (Route::hasSubtype()) {
            $subtype = Route::getSubtype();
            $breadcrumps[] = $subtype;
        }
        if (Route::hasName()) {
            $name = Route::getName();
            $breadcrumps[] = $name;
        }
        return $breadcrumps;
    }
    public static function getLevels()
    {
        $breadcrumps = self::getBreadcrumps();
        $levels = count($breadcrumps);
        return $levels;
    }
}
