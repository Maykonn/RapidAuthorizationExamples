<?php

/**
 * Configuring and starting
 * @author Maykonn Welington Candido<maykonn@outlook.com>
 */

require_once __DIR__ . '/vendor/autoload.php';

$configuration = Array(
	'mysqlHost' => 'localhost',
	'mysqlPort' => 3306,
	'mysqlUser' => 'root',
	'mysqlPass' => '123456',
	'dbName' => 'test_rbac',
	'dbCharset' => 'utf8', // optional param, default is utf8
	'userTable' => 'users', // optional param if is different of user, default is user
	'userTablePK' => 'id', // optional param if is different of id, default is id
	'autoGenerateTables' => true, // optional param, default is false
	//'useRapidAuthorizationAutoload' => true // optional param, default is false
);

$authorization = new \RapidAuthorization\RapidAuthorization($configuration);

echo '
    OK!!!<br/>
    NOW YOU MUST POPULATE THE ' . $configuration['userTable'] . ' TABLE WITH THE PK 1 AND 2,
    FOR THE EXAMPLES WORK.';