<?php

require_once('../inc/LoginCredentials.class.php');

$search_keyword = "skull";

?>

<!DOCTYPE html>

<html>

  <head>
    <title>Stickers</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="app.css">
    <script src = "script.js"></script>
  </head>
  <body>
  

<div class="container">
<div class="container">
    <form id="searchForm">
      <br>
      <br>
    <h3> YAY Stickers! </h3>
    <div id = "h1"> Stickers. </div><br>
    <div class="input-group-append">
    <button class="btn btn-outline-secondary" id="searchButton"><a href="../tpl/sure-logout.tpl.php">Logout</a></button>
    <button class="btn btn-outline-secondary" id="searchButton"><a href="../public/index.php">Home</a></button>
    <button class="btn btn-outline-secondary" id="searchButton"><a href="../public/curl.php">cURL</a></button>
    <button class="btn btn-outline-secondary" id="searchButton"><a href="../giphy/onetime.html">One-at-a-time</a></button>
    <button class="btn btn-outline-secondary" id="searchButton"><a href="../giphy_five/index.html">Five-at-a-time</a></button>
    <button class="btn btn-outline-secondary" id="searchButton"><a href="../public/trending-gifs.php">Trending</a></button>
 

    </div>
    <div class="input-group mb-3">
  
      <div class="input-group-append">

    </div>
      <div id = "circle"></div>
    
    </div>
   
</body>
</html>