<?php //namespace System;

require_once (__DIR__ . '/interfaces/LoaderInterface.php');
use \RuntimeException;

/**
* 
*/

abstract class AppDataLoader implements LoaderInterface
{
    /**
     *  
     */
    public static function loader($index, array $data = [])
    {
        $appData = (__Dir__) . '/../' . DIRECTORY_SEPARATOR . 'appdata.php';
        if(is_readable($appData)):
            $data = require_once $appData;
            unset($appData);
            return $data[$index];
        else:

            /**
             * Retorna uma exceção caso não encontre o arquivo 'appdata' na raiz da aplicação.
             * @throws RuntimeException 
             */
            throw new RuntimeException('Archive "appdata.php" not found in '."'application root'". '.');
        endif;
    }
}