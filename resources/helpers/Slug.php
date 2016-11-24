<?php namespace Resources\Helpers;

/*
 ===========================================================================
 = Slug 
 ===========================================================================
 =
 = Converte strings em texto puro em um formato amigavel para o 
 = tratamento de entradas da aplicação, eliminando espaços e acentuações.
 = 
 = É retornado um array completo contendo todo o nome e extenção, como 
 = também pode-se obter nome e extenção separados pelo indice.
 = 
 = ['nome-arquivo.extenção'], ['nome-arquivo', '.extenção']
 = 
 */

use \InvalidArgumentException;

/**
 * Slugin
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \Resources\Helpers;
 * @copyright 2016 
 * @version 1.0.0
 */
final class Slug
{
    /**
     * Converte a string para slug.
     * @param string
     * @param string
     * @return array
     */
    public static function convert($phrase, $extension=false, $separator='-')
    {
        if(((!is_string($phrase)) && (empty($phrase))) && (!is_bool($extension)) && (!is_string($separator))):
            throw new InvalidArgumentException('Arguments not valid!');
        endif;
        
        /**
         * Elimina acentuações e espaços desnecessarios,
         * depois converte tudo para letras minúsculas.
         * @var string
         */
        $slug = preg_replace(array(
            '/(á|à|ã|â|ä)/','/(Á|À|Ã|Â|Ä)/','/(é|è|ê|ë)/','/(É|È|Ê|Ë)/','/(í|ì|î|ï)/','/(Í|Ì|Î|Ï)/', 
            '/(ó|ò|õ|ô|ö)/','/(Ó|Ò|Õ|Ô|Ö)/','/(ú|ù|û|ü)/','/(Ú|Ù|Û|Ü)/','/(ñ)/','/(Ñ)/'), 
            explode(' ','a A e E i I o O u U n N'), 
            str_replace(' ', $separator, preg_replace('/\s+/', ' ', strtolower($phrase)))
        );
        
        if($extension):
            $phrase = explode('.', $slug)[0];
            $ext = '.'.explode('.', $slug)[1];
            return [$phrase, $ext];
        endif;

        return [$slug];
    }

}