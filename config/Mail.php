<?php //namespace Config

/**
* 
*/

require_once(__DIR__ . '/../system/interfaces/ConfigInterface.php');
//use System\Interfaces\ConfigInterface;

class Mail implements ConfigInterface
{
	
    private static $conf = [
        
        //Code here...
    
    ];
    
    //Acesso Estático
    private function __construct()
    {}
    
    /**
     * 
     */
    public static function get($index)
    {
        if((is_string($index)) && (array_key_exists($index, self::$conf))):
            return self::$conf[$index];
        endif;

        return null;
    }

}