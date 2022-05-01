<?php
// usage: http://localhost/week06/public/article-view.php?ArticleID=1
// include the class definition so i can create an instance
require_once('../inc/LoginCredentials.class.php');

// create an instance of the class so i can access the database
$loginCredentials = new LoginCredentials();

$getArray = $loginCredentials->sanitize($_GET);

if (!$loginCredentials->load($getArray['user_id'])) {
	die("user not found");
}

$dataArray = $loginCredentials->dataArray;

require_once("../tpl/user-view.tpl.php");
?>
