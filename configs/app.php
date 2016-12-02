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
    'env' => (string) env('APP_ENV', 'development'),

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
    'debug' => (bool) env('APP_DEBUG', true),

    /*
     ===========================================================================
     = URL Base da Aplicação
     ===========================================================================
     =
     = Define o caminho padrão para inclusão das bibliotecas, acesso a rotas
     = e para navegação externa.
     = 
     */
    'url' => (string) env('APP_URL', 'http://localhost'),
    
    /*
     ===========================================================================
     = Pasta Publica
     ===========================================================================
     =
     = Determina a pasta onde contéram os arquivos e diretórios publicos 
     = da aplicação.
     = 
     */
    'webdir' => (string) env('APP_WEBDIR', 'pubdir'),

    /*
     ===========================================================================
     = Application Key
     ===========================================================================
     =
     = Define uma hash unica para a segurança da aplicação.
     = 
     */
     'key' => (string) env('APP_KEY', ''),

    /*
     ===========================================================================
     = Fuso horário da Aplicação
     ===========================================================================
     =
     = Especifica o fuso horário padrão que será utilizado pelas funções de 
     = data do PHP.
     = 
     */
    'charset' => (string) env('APP_CHARSET', 'utf-8'),

    /*
     ===========================================================================
     = Configuração de Localização
     ===========================================================================
     =
     = Determina o idioma padrão que será utilizado no front-end da aplicação.
     = 
     */
    'lang' => (string) env('APP_LANG', 'pt-br')

];