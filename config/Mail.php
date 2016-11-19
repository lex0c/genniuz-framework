<?php namespace Config

use \System\DataLoader;
use \System\Interfaces\ConfigInterface;

/**
* 
*/

final class Mail extends DataLoader implements ConfigInterface
{
	
    private static $conf = [
        
        //Code here...
    
    ];
    
    //Classe para acesso estático
    private function __construct()
    {}
    
    /**
     * Retorna as variaveis de ambiente de email
     */
    public static function get($index)
    {
        return parent::loader($index, self::$conf);
    }

}