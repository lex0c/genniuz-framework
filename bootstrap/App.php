<?php //namespace Bootstrap;

/*
 ===========================================================================
 = Inicializa a Aplicação
 ===========================================================================
 =
 = Carrega os serviços, variaveis e componentes necessarios para 
 = inicializar a aplicação.
 = 
 */

final class App 
{
	/**
     * Verifica se a aplicação já está rodando.
     * @var boolean
	 */
	private static $running = false;

    /**
     * @var string
     */
    private static $path = '/../config/';

    /**
     * AppStart
     * @param array [optional]
     * @return boolean
     */
    public static function run(array $data = [])
    {
    	if(!$running):
            self::$running = true;
            require_once (App::alias('autoload'));
            return true;
        endif;

        return false;
    }

    /**
     *  
     */
    public static function get($index)
    {
        $file = __DIR__ . self::$path . 'app.php';
        $app = [];

        if(self::$running):
            if(is_readable($file)):
                $app = include ($file);
                if((is_string($index)) && (array_key_exists($index, $app))):
                    return $app[$index];
                else:
                    throw new RuntimeException("Key not found in 'app'!");
                endif;
            else:
                throw new RuntimeException("File '{$file}' not found!");
            endif;
        else:
            throw new RuntimeException("Application not initialized!");
        endif;

        return false;
    }

    /**
     *  
     */
    public static function db($index)
    {
        $file = __DIR__ . self::$path . 'database.php';
        $db = [];
        
        if(self::$running):
            if(is_readable($file)):
                $db = include ($file);
                if((is_string($index)) && (array_key_exists($index, $db))):
                    return $db[$index];
                else:
                    throw new RuntimeException("Key not found in 'database'!");
                endif;
            else:
                throw new RuntimeException("File '{$file}' not found!");
            endif;
        else:
            throw new RuntimeException("Application not initialized!");
        endif;

        return false;
    }

    /**
     *  
     */
    public static function mail($index)
    {
        $file = __DIR__ . self::$path . 'mail.php';
        $mail = [];
        
        if(self::$running):
            if(is_readable($file)):
                $mail = include ($file);
                if((is_string($index)) && (array_key_exists($index, $mail))):
                    return $mail[$index];
                else:
                    throw new RuntimeException("Key not found in 'mail'!");
                endif;
            else:
                throw new RuntimeException("File '{$file}' not found!");
            endif;
        else:
            throw new RuntimeException("Application not initialized!");
        endif;

        return false;
    }

    /**
     *  
     */
    public static function alias($index)
    {
        $file = __DIR__ . self::$path . 'aliases.php';
        $alias = [];
        
        if(self::$running):
            if(is_readable($file)):
                $alias = include ($file);
                if((is_string($index)) && (array_key_exists($index, $alias))):
                    return $alias[$index];
                else:
                    throw new RuntimeException("Key not found in 'aliases'!");
                endif;
            else:
                throw new RuntimeException("File '{$file}' not found!");
            endif;
        else:
            throw new RuntimeException("Application not initialized!");
        endif;

        return false;
    }

}