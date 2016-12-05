<?php namespace System\Modules\Caching;

/*
 ===========================================================================
 = Local Array Cache
 ===========================================================================
 =
 = Creates an array for temporary storage of cache, that later can be 
 = saved in files or database..
 = 
 */

use \System\Exceptions\CacheNotFoundException;
use \System\Interfaces\StorageInterface;

/**
 * Array Cache
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \System\Modules\Caching;
 * @copyright 2016 
 * @version 1.0.0
 */
class ArrayCache implements StorageInterface
{
    /**
     * Stored values.
     * @var array
     */
    protected $cache = [];

    /**
     * Create an item in the cache.
     * @param string $key
     * @param array $data
     * @return bool
     */
    public function create(string $key, array $data):bool
    {
        $key    = strip_tags(htmlentities($key));
        $data   = array_map('htmlentities', $data);
        
        if(!$this->keyExists($key)):
            $this->cache[$key] = [
                'id'       => substr(base64_encode(uniqid(mt_rand(), true)), 2, 15),
                'datetime' => date("D M j G:i:s T Y"),
                'data'     => $data,
                'edited'   => 'Not edited.'
            ];
            return true;
        endif;

        return false;
    }

    /**
     * Edit an item in the cache.
     * @param string $key
     * @param array $data
     * @return bool
     */
    public function edit(string $key, array $data):bool
    {
        $key    = strip_tags(htmlentities($key));
        $data   = array_map('htmlentities', $data);

        if($this->keyExists($key)):
            $this->cache[$key]['data'] = $data;
            $this->cache[$key]['edited'] = date("D M j G:i:s T Y");
            return true;
        endif;

        return false;
    }

    /**
     * Retrieve an item from the cache by key.
     * @param string $key
     * @return array
     */
    public function get(string $key):array
    {
        $key = strip_tags(htmlentities($key));

        if($this->keyExists($key)):
            return $this->cache[$key];
        endif;

        return [];
    }

    /**
     * Return all items from the cache.
     * @return array
     */
    public function getAll():array
    {
        return $this->cache;
    }

    /**
     * Remove item from the cache.
     * @param string $key
     * @return bool
     */
    public function remove(string $key):bool
    {
        $key = strip_tags(htmlentities($key));

        if($this->keyExists($key)):
            unset($this->cache[$key]);
            return true;
        endif;

        return false;
    }

    /**
     * Remove all items from the cache.
     * @return bool
     */
    public function removeAll():bool
    {
        unset($this->cache);
        return true;
    }

    /**
     * Check the key exists in array cache.
     * @return bool
     */
    public function keyExists(string $key):bool
    {
        if(array_key_exists($key, $this->cache)):
            return true
        endif;

        return false;
    }

    /**
     * Return the prefix of key.
     * @return string
     */
    public function getPrefix():string
    {
        return '';
    }

}