<?php //namespace System;

/*
 ===========================================================================
 = Carregador do 'appdata', arquivo de configurações da aplicação
 ===========================================================================
 =
 = Responsavel por fornecer arrays de configurações para definir modulos
 = com parametros personalizaveis em runtime.
 = 
 */

require_once (__DIR__ . '/interfaces/LoaderInterface.php');
use \RuntimeException;

/**
 * AppDataLoader
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package Genniuz/System/
 */

abstract class AppDataLoader implements LoaderInterface
{
    /**
     * Verifica se o arquivo existe retornando o array requisitado pelo index.
     * @param string $index
     * @param array $data [opcional]
     * @return array
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