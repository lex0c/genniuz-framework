<?php //namespace System\Interfaces;

/*
 ===========================================================================
 = Interface para padronização dos carregadores
 ===========================================================================
 =
 = Define um padrão para criação das classes responsaveis por carregamento
 = de arquivos de configurações da aplicação.
 = 
 */

Interface LoaderInterface
{
    /**
     * Carregador
     * @param array
     */
    public static function run(array $data);
    
}