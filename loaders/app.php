<?php

/*
 ===========================================================================
 = Application Time
 ===========================================================================
 = 
 = Keeps recording of application start time.
 = 
 */
define('TIME_START', microtime(true));

/*
 ===========================================================================
 = Essentials Defines
 ===========================================================================
 = 
 = Definitions state for global application.
 = 
 */
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));

/*
 ===========================================================================
 = Initialize The Genniuz Application
 ===========================================================================
 =
 = Load all services, files and modules to initialize the ecosystem
 = 
 */
use \System\Application;
return Application::run();