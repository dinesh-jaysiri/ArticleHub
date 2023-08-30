<?php

namespace App\Helpers\Routes;

class RouteHelper{


    public static function includeRouteFiles(string $folder){
        $dirItarator = new \RecursiveDirectoryIterator($folder);

        /** @var \RecursiveDirectoryIterator |  \RecursiveIteratorIterator $itarator */
        $itarator = new \RecursiveIteratorIterator($dirItarator);


        while ($itarator->valid()) {

            if (
                !$itarator->isDot()
                && $itarator->isReadable()
                && $itarator->current()->getExtension() === 'php'
            ) {

                require $itarator->key();
            }

            $itarator->next();
        }

    }
}