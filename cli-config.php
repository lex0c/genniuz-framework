<?php 

/*
 ===========================================================================
 = Application Loader
 ===========================================================================
 =
 = Load all files, services, modules and components to initialize 
 = the ecosystem and initialize the database manipulation service.
 = 
 */

require_once (__DIR__ . '/loaders/autoload.php');
require_once (__DIR__ . '/loaders/app.php');

/*
 ===========================================================================
 = Doctrine Console
 ===========================================================================
 = 
 */

use \Doctrine\ORM\Tools\Console\ConsoleRunner;

/*
 ===========================================================================
 = Doctrine Configs Loader
 ===========================================================================
 = 
 = Replace with file to your own project bootstrap.
 = 
 */

require_once (__DIR__ . '/system/modules/database/doctrine.php');

/*
 ===========================================================================
 = Console Loader
 ===========================================================================
 =
 = Mechanism to retrieve EntityManager in your app.
 = 
 */
 
return ConsoleRunner::createHelperSet(getEntityManager());