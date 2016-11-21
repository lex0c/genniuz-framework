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
     * @param string $index [key]
     * @param array $data [opcional]
     */
    public static function loader($index, array $data);
    
}