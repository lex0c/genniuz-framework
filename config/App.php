<?php namespace Config;

use \System\DataLoader;
use \System\Interfaces\ConfigInterface;

/**
* 
*/

final class App extends DataLoader implements ConfigInterface
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
    
    //Classe para acesso estático
    private function __construct()
    {}
    
    /**
     * Retorna as variaveis de ambiente da aplicação
     */
    public static function get($index)
    {
        return parent::loader($index, self::$conf);
    }

}