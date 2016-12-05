<?php namespace System\Modules\Caching;

/*
 ===========================================================================
 = Remote Redis Cache
 ===========================================================================
 =
 = Creates an remote storage of cache
 = 
 */

use \System\Exceptions\CacheNotFoundException;
use \System\Interfaces\StorageInterface;

/**
 * Redis Cache
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \System\Modules\Caching;
 * @copyright 2016 
 * @version 1.0.0
 */
class RedisCache implements StorageInterface
{
    /**
     * Extends the redis for use in database connection.
     * @var Redis
     */
    protected $redis = null;

    /**
     * The Redis connection that should be used.
     *
     * @var string
     */
    protected $connection = '';

    /**
     * Prefix for generate unique keys.
     * @var string
     */
    protected $prefix = '';

    /**
     * Create a new Redis store.
     * @param Redis $redis
     * @param string $connection
     * @param string $prefix
     * @return void
     */
    public function __construct(Redis $redis, string $connection = 'default', string $prefix = '')
    {
        $this->redis       = $redis;
        $this->connection  = $connection;
        $this->prefix      = (!empty($prefix))?$prefix . '_':'';
    }

    //...

}