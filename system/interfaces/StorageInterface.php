<?php namespace System\Interfaces;

/**
 * Storage Interface
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package System\Interfaces;
 * @copyright 2016 
 * @version 1.0.0
 */
interface StorageInterface
{
     /**
     * Create an item in the cache.
     * @param string $key
     * @param array $data
     * @return bool
     */
    public function create(string $key, array $value):bool;

    /**
     * Remove item from the cache.
     * @param string $key
     * @return bool
     */
    public function delete(string $key):bool;

    /**
     * Remove all itens from the cache.
     * @param string $key
     * @return bool
     */
    public function removeAll():bool;

    /**
     * Retrieve an item from the cache by key.
     * @param string $key
     * @return array
     */
    public function get(string $key):array;

    /**
     * Get the cache key prefix.
     * @return string
     */
    public function getPrefix():string;

}