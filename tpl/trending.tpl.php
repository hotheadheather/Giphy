<?php

require_once('../inc/LoginCredentials.class.php');

$search_keyword = "skull";

?>

<!DOCTYPE html>

<html>
<head>
	<title>Trending</title>
</head>
<body>
<html>
  <head>
    <title>Trending</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="app.css">
    <script src = "script.js"></script>
  </head>
  

<div class="container">
<div class="container">
<br>
	<br>
  <h3>Trending gifs.</h3>
  <br>
    
    <button class="btn btn-outline-secondary" id="searchButton"><a href="../public/user-login.php">Logout</a></button>
    <button class="btn btn-outline-secondary" id="searchButton"><a href="../public/index.php">Home</a></button>
    <button class="btn btn-outline-secondary" id="searchButton"><a href="../tpl/curl.tpl.php">cURL</a></button>
    <button class="btn btn-outline-secondary" id="searchButton"><a href="../giphy/onetime.html">One-at-a-time</a></button>
    <button class="btn btn-outline-secondary" id="searchButton"><a href="../giphy_five/index.html">Five-at-a-time</a></button>
    <button class="btn btn-outline-secondary" id="searchButton"><a href="../public/stickers.php">Stickers</a></button>
    <div class="input-group mb-3">
  
      <div class="input-group-append">

    </div>
      <div id = "circle"></div>
    
    </div>
  	

</body>
</html>