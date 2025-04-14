<?php

// This is the database connection configuration.
return array(
	// 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	/*
	'connectionString' => 'mysql:host=localhost;dbname=testdrive',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
	*/
    // 
	'connectionString' => 'pgsql:host=localhost;port=5432;dbname=si_manajemen_rs',
    'username' => 'postgres',
    'password' => 'postgres',
    'charset' => 'utf8',
    'enableParamLogging' => true,  // Optional: untuk debugging query
    'enableProfiling' => true,     // Optional: untuk profiling performa query
);
