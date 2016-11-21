<?php return [
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
    'url' => 'http://localhost',
    
    /*
     ===========================================================================
     = Pasta Publica
     ===========================================================================
     =
     = Determina a pasta onde contéram os arquivos e diretórios publicos 
     = da aplicação.
     = 
     */
    'pubdir' => 'public',

    /*
     ===========================================================================
     = Raiz da Aplicação
     ===========================================================================
     =
     = Determina o diretório raiz para a aplicação '/'.
     = 
     */
    'root' => dirname(__DIR__),

    /*
     ===========================================================================
     = Separador de Diretórios
     ===========================================================================
     = 
     */
    'separator' => DIRECTORY_SEPARATOR,

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