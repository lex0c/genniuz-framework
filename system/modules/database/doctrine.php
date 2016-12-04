<?php

/**
 * Doctrine Configuration
 *
 * An open source application development framework for PHP.
 *
 * This content is released under the MIT License (MIT)
 *
 * Once you have prepared the class loading, you acquire an EntityManager instance. 
 * The EntityManager class is the primary access point to ORM functionality 
 * provided by Doctrine.
 * 
 * 
 * If you want to configure Doctrine in more detail, take a look at the 
 * Advanced Configuration section.
 * 
 * 
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \System\Modules\Database;
 * @copyright 2016 
 * @version 1.0.0
 */

use \Doctrine\ORM\Tools\Setup;
use \Doctrine\ORM\EntityManager;

/**
 * Use the variables system for dynamics parameters.
 */
use \System\VariablesEnvironment as Env;

/**
 * directory responsible for tables of entities.
 */
$paths = [
    ROOT . DS . 'app' . DS . 'database' . DS . 'entities'
];

/**
 * Inside the Setup methods several assumptions are made:
 * 
 * 
 * If $isDevMode is true caching is done in memory with the ArrayCache. Proxy objects are 
 * recreated on every request.
 * 
 * If $isDevMode is false, check for Caches in the order APC, Xcache, Memcache (127.0.0.1:11211), 
 * Redis (127.0.0.1:6379) unless $cache is passed as fourth argument.
 * 
 * If $isDevMode is false, set then proxy classes have to be explicitly created through 
 * the command line.
 * 
 * If third argument $proxyDir is not set, use the systems temporary directory.
 */
$isDevMode = Env::app('debug');

/**
 * Dynamics parameters for configuration the Doctrine.
 */
$dbParams = [
    "driver"   => Env::db('driver'),
    "user"     => Env::db('username'),
    "password" => Env::db('password'),
    "dbname"   => Env::db('name')
];

//$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, 
	Setup::createAnnotationMetadataConfiguration($paths, $isDevMode)
);

/**
 * 
 * 
 * 
 *   
 */

function getEntityManager()
{
    global $entityManager;
    return $entityManager;
}