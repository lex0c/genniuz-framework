<?php namespace System\Interfaces;

/*
 ===========================================================================
 = Interface para padronização dos carregadores
 ===========================================================================
 =
 = Define um padrão para criação das classes responsaveis por carregamento
 = de componentes e configurações da aplicação.
 = 
 */

Interface IRunnable
{
    /**
     * Inicializa
     * @param array
     * @return boolean
     */
    public static function run(array $data):bool;
     
    /**
     * Trava o estado de um recursos 
     * @param array
     * @return boolean
     */
    public static function sleep(array $data):bool;

    /**
     * Limpa e libera memória
     * @return boolean
     */
    public static function destroy():bool;
    
}