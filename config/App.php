<?php //namespace Config;

/**
* 
*/

require_once(__DIR__ . '/../system/interfaces/ConfigInterface.php');
//use System\Interfaces\ConfigInterface;

class App implements ConfigInterface
{

    private static $conf = [
        /*
         ===========================================================================
         = Ambiente da Aplicação
         ===========================================================================
         =
         = Determina o ambiente de execução que a aplicação deve trabalhar.
         = Isso define como os serviços da aplicação vão operar.
         = 
         */
        'env' => 'development',

        /*
         ===========================================================================
         = Modo de Depuração da Aplicação
         ===========================================================================
         =
         = Quando estiver no modo de depuração, mensagens de erro mais detalhadas
         = com rastreamentos de pilha será exibido. Se desativada, uma 
         = página de erro genérica é mostrada.
         = 
         */
        'debug' => true,

        /*
         ===========================================================================
         = URL Base da Aplicação
         ===========================================================================
         =
         = Define o caminho padrão para inclusão das bibliotecas, acesso a rotas
         = e para navegação externa.
         = 
         */
        'url' => 'http://localhost/',

        /*
         ===========================================================================
         = Root da Aplicação
         ===========================================================================
         =
         = Determina o diretório raiz para a aplicação.
         = 
         */
        'root' => 'public/',

        /*
         ===========================================================================
         = Fuso horário da Aplicação
         ===========================================================================
         =
         = Especifica o fuso horário padrão que será utilizado pelas funções de 
         = data do PHP.
         = 
         */
        'charset' => 'utf-8',

        /*
         ===========================================================================
         = Configuração de Localização
         ===========================================================================
         =
         = Determina o idioma padrão que será utilizado no front-end da aplicação.
         = 
         */
        'lang' => 'pt-br'
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