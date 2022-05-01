<?php

require_once('../inc/LoginCredentials.class.php');

session_start();


// initialize some variables to be used by our view
$dataArray = array();
$errorsArray = array();

// create an instance of the class so i can access the database
$loginCredentials = new LoginCredentials();

$requestArray = $loginCredentials->sanitize($_REQUEST);

// check to see if we have a record to load
if (isset($requestArray['user_id']) && !empty($requestArray['user_id'])) {
	$loginCredentials->load($requestArray['user_id']);
	$dataArray = $loginCredentials->dataArray;
}

// go back to list page
if (isset($_POST['Cancel'])) {
	header("location: user-list.php");
	exit;
}

// apply the data if we have new data
if (isset($_POST['Save'])) {
    // sanitize and set the post array to our local variable
    $dataArray = $loginCredentials->sanitize($_POST);
    // pass the array into our instance
    $loginCredentials->set($dataArray);
    
    // validate
    if ($loginCredentials->validate()) {
        // save
        if ($loginCredentials->save()) {
            header("location: user-save-success.php");
            exit;
        } else {
            $errorsArray[] = "Save failed";
        }
    } else {
        $errorsArray = $loginCredentials->errors;
        $dataArray = $loginCredentials->userData;
    }
}

require_once("../tpl/user-edit.tpl.php");



$_SESSION['user_id'] = (isset($dataArray['user_id']) ? $dataArray['user_id'] : '');
?>