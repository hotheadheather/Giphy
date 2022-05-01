<?php
require_once('../inc/LoginCredentials.class.php');


$loginCrendentials = new LoginCredentials(); 
//class does not exist error if this is missing

$userList = $loginCrendentials->getList();
//goes out to table and stores table info in array

require_once('../tpl/user-login.tpl.php');

?>

