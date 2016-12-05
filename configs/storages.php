<?php return [
    /*
     ===========================================================================
     = Cache Prefix
     ===========================================================================
     =
     = We'll specify a value to get prefixed to all our keys so we can 
     = avoid collisions.
     = 
     */
    'prefix' => (string) env('CACHE_PREFIX', 'genn_'),
    
    /*
     ===========================================================================
     = Cache Driver
     ===========================================================================
     =
     = This option controls the default cache connection that gets used 
     = while using this caching library. 
     = 
     */
    'driver' => (string) env('CACHE_DRIVER', 'file'),

    /*
     ===========================================================================
     = Cache Connection
     ===========================================================================
     =
     = Defines how the cache library will handle storage and cache 
     = requests for the system.
     = 
     */
    'connection' => (string) env('CACHE_CONN', 'default'),

    /*
     ===========================================================================
     = Cache Host
     ===========================================================================
     =
     = Url for the cache library to connect and manage caching, 
     = by default it is set to 'localhost' (devmode).
     = 
     */
    'host' => (string) env('CACHE_HOST', 'localhost'),
    
    /*
     ===========================================================================
     = Cache Port
     ===========================================================================
     =
     = Connection port for communication with the cache system.
     = 
     */
    'port' => (int) env('CACHE_PORT', 6379),

    /*
     ===========================================================================
     = Cache Password
     ===========================================================================
     = 
     */
    'password' => (string) env('CACHE_PASS', null),
    
];