<?php

if (isset($_ENV['OPENSHIFT_MYSQL_DB_HOST'])) {
	$mysql_host = $_ENV['OPENSHIFT_MYSQL_DB_HOST'].':'.$_ENV['OPENSHIFT_MYSQL_DB_PORT'];
	$mysql_database = $_ENV['OPENSHIFT_GEAR_NAME'];
	$mysql_username = $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];
	$mysql_password = $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];
	$default_database = 'mysql';
} elseif (isset($_ENV['OPENSHIFT_POSTGRESQL_DB_URL'])) {
    $pgsql_hostname = $_ENV['OPENSHIFT_POSTGRESQL_DB_HOST'];
    $pgsql_port = $_ENV['OPENSHIFT_POSTGRESQL_DB_PORT'];
    $pgsql_database = $_ENV['OPENSHIFT_GEAR_NAME'];
    $pgsql_username = $_ENV['OPENSHIFT_POSTGRESQL_DB_USERNAME'];
    $pgsql_password = $_ENV['OPENSHIFT_POSTGRESQL_DB_PASSWORD'];
    $default_database = 'pgsql';
} elseif (isset($_ENV['DATABASE_URL'])) {
    preg_match('/^postgres:\/\/(?P<username>\w+):(?P<password>\w+)@(?P<hostname>\S+):(?P<port>\d+)\/(?P<database>\w+)$/', $_ENV['DATABASE_URL'], $dbparts);
    $pgsql_hostname = $dbparts['hostname'];
    $pgsql_port = $dbparts['port'];
    $pgsql_database = $dbparts['database'];
    $pgsql_username = $dbparts['username'];
    $pgsql_password = $dbparts['password'];
    $default_database = 'pgsql';
}

return array(

	/*
	|--------------------------------------------------------------------------
	| PDO Fetch Style
	|--------------------------------------------------------------------------
	|
	| By default, database results will be returned as instances of the PHP
	| stdClass object; however, you may desire to retrieve records in an
	| array format for simplicity. Here you can tweak the fetch style.
	|
	*/

	'fetch' => PDO::FETCH_CLASS,

	/*
	|--------------------------------------------------------------------------
	| Default Database Connection Name
	|--------------------------------------------------------------------------
	|
	| Here you may specify which of the database connections below you wish
	| to use as your default connection for all database work. Of course
	| you may use many connections at once using the Database library.
	|
	*/

	'default' => isset($default_database) ? $default_database : 'sqlite',

	/*
	|--------------------------------------------------------------------------
	| Database Connections
	|--------------------------------------------------------------------------
	|
	| Here are each of the database connections setup for your application.
	| Of course, examples of configuring each database platform that is
	| supported by Laravel is shown below to make development simple.
	|
	|
	| All database work in Laravel is done through the PHP PDO facilities
	| so make sure you have the driver for your particular database of
	| choice installed on your machine before you begin development.
	|
	*/

	'connections' => array(

		'sqlite' => array(
			'driver'   => 'sqlite',
			'database' => __DIR__.'/../database/production.sqlite',
			'prefix'   => '',
		),

		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => isset($mysql_host) ? $mysql_host : 'localhost',
			'database'  => isset($mysql_database) ? $mysql_database : 'database',
			'username'  => isset($mysql_username) ? $mysql_username : 'root',
			'password'  => isset($mysql_password) ? $mysql_password : '',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),

		'pgsql' => array(
			'driver'   => 'pgsql',
			'host'     => isset($pgsql_hostname) ? $pgsql_hostname : 'localhost',
			'port'     => isset($pgsql_port) ? $pgsql_port : '5432',
			'database' => isset($pgsql_database) ? $pgsql_database : 'database',
			'username' => isset($pgsql_username) ? $pgsql_username : 'root',
			'password' => isset($pgsql_password) ? $pgsql_password : '',
			'charset'  => 'utf8',
			'prefix'   => '',
			'schema'   => 'public',
		),

		'sqlsrv' => array(
			'driver'   => 'sqlsrv',
			'host'     => 'localhost',
			'database' => 'database',
			'username' => 'root',
			'password' => '',
			'prefix'   => '',
		),

	),

	/*
	|--------------------------------------------------------------------------
	| Migration Repository Table
	|--------------------------------------------------------------------------
	|
	| This table keeps track of all the migrations that have already run for
	| your application. Using this information, we can determine which of
	| the migrations on disk have not actually be run in the databases.
	|
	*/

	'migrations' => 'migrations',

	/*
	|--------------------------------------------------------------------------
	| Redis Databases
	|--------------------------------------------------------------------------
	|
	| Redis is an open source, fast, and advanced key-value store that also
	| provides a richer set of commands than a typical key-value systems
	| such as APC or Memcached. Laravel makes it easy to dig right in.
	|
	*/

	'redis' => array(

		'cluster' => true,

		'default' => array(
			'host'     => '127.0.0.1',
			'port'     => 6379,
			'database' => 0,
		),

	),

);