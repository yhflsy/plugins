<?php defined('SYSPATH') or die('No direct script access.');
return array
(
	'default' => array(
		'driver'             => 'memcache',
		'default_expire'     => 3600,
		'compression'        => FALSE,              // Use Zlib compression (can cause issues with integers)
		'servers'            => array(
			array(
				'host'             => '10.0.1.71',  // Memcache Server
				'port'             => 30071,        // Memcache port number
				'persistent'       => FALSE,        // Persistent connection
				'weight'           => 1,
				'timeout'          => 1,
				'retry_interval'   => 15,
				'status'           => TRUE,
			),
		),
		'instant_death'      => TRUE,               // Take server offline immediately on first fail (no retry)
	
        ),
	'accessToken' => array(
		'driver'             => 'memcache',
		'default_expire'     => 300,
		'compression'        => FALSE,              // Use Zlib compression (can cause issues with integers)
		'servers'            => array(
			array(
				'host'             => 'localhost',  // Memcache Server
				'port'             => 12000,        // Memcache port number
				'persistent'       => FALSE,        // Persistent connection
				'weight'           => 1,
				'timeout'          => 1,
				'retry_interval'   => 15,
				'status'           => TRUE,
			),
		),
		'instant_death'      => TRUE,               // Take server offline immediately on first fail (no retry)
	),    
	'memcachetag' => array(
		'driver'             => 'memcachetag',
		'default_expire'     => 3600,
		'compression'        => FALSE,              // Use Zlib compression (can cause issues with integers)
		'servers'            => array(
			array(
				'host'             => 'localhost',  // Memcache Server
				'port'             => 11211,        // Memcache port number
				'persistent'       => FALSE,        // Persistent connection
				'weight'           => 1,
				'timeout'          => 1,
				'retry_interval'   => 15,
				'status'           => TRUE,
			),
		),
		'instant_death'      => TRUE,
	),
	'apc'      => array(
		'driver'             => 'apc',
		'default_expire'     => 3600,
	),
	'wincache' => array(
		'driver'             => 'wincache',
		'default_expire'     => 3600,
	),
	'sqlite'   => array(
		'driver'             => 'sqlite',
		'default_expire'     => 3600,
		'database'           => DOCROOT.'cache/kohana-cache.sql3',
		'schema'             => 'CREATE TABLE caches(id VARCHAR(127) PRIMARY KEY, tags VARCHAR(255), expiration INTEGER, cache TEXT)',
	),
	'eaccelerator'           => array(
		'driver'             => 'eaccelerator',
	),
	'xcache'   => array(
		'driver'             => 'xcache',
		'default_expire'     => 3600,
	),
	'file'    => array(
		'driver'             => 'file',
		'cache_dir'          => CACHEPATH,
		'default_expire'     => 60,
		'ignore_on_delete'   => array(
			'.gitignore',
			'.git',
			'.svn'
		)
	)
);