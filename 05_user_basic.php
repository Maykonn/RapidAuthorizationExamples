<?php

/**
 * Working with Users - Basic
 * @author Maykonn Welington Candido<maykonn@outlook.com>
 */
require_once __DIR__ . '/vendor/autoload.php';

use RapidAuthorization\RapidAuthorization;

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

$authorization = new RapidAuthorization($configuration);

// List an User
$userId = 1;
echo 'LISTING USER #' . $userId . '<pre>';
$user = $authorization->user()->findById($userId);
print_r($user);
echo '</pre>';


// List all Users
echo 'LISTING ALL USERs <pre>';
$users = $authorization->user()->findAll();
print_r($users);
echo '</pre>';

// Attach Role
$roleId = 1;
$userId = 1;
echo 'ADD ROLE #' . $roleId . ' TO USER : #' . $userId;
var_dump($authorization->user()->attachRole($roleId, $userId)) . '<br>';

$roleId = 4;
$userId = 1;
echo 'ADD ROLE #' . $roleId . ' TO USER : #' . $userId;
var_dump($authorization->user()->attachRole($roleId, $userId)) . '<br>';

$roleId = 4;
$userId = 2;
echo 'ADD ROLE #' . $roleId . ' TO USER : #' . $userId;
var_dump($authorization->user()->attachRole($roleId, $userId)) . '<br>';

// Detach Role
$userId = 1;
$roleToDetach = $authorization->role()->create('Tester', 'TESTER', 'QA Tester');
$authorization->user()->attachRole($roleToDetach, $userId);
echo 'DETACH ROLE #' . $roleToDetach . ' FROM USER : #' . $userId;
var_dump($authorization->user()->removeUserFromRole($userId, $roleToDetach)) . '<br>';


// List all Roles that an User has permission
$userId = 1;
echo 'LISTING ALL ROLES FROM USER #' . $userId . '<pre>';
$userRoles = $authorization->user()->getRoles($userId);
print_r($userRoles);
echo '</pre>';

$userId = 2;
echo 'LISTING ALL ROLES FROM USER #' . $userId . '<pre>';
$userRoles = $authorization->user()->getRoles($userId);
print_r($userRoles);
echo '</pre>';
?>