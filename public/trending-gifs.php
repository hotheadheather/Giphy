

<?php

require_once('../inc/LoginCredentials.class.php');

include('../tpl/trending.tpl.php');

$c = curl_init();

$search_keyword = "skull";


$url= "http://api.giphy.com/v1/gifs/trending?api_key=FBw3oVH9f7YaUAKvl7IkdIywXVebExyG&limit=10&rating=g";

curl_setopt($c, CURLOPT_URL, $url);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);


$exec = curl_exec($c);

if ($e = curl_error($c)) {
    echo $e;  
    
}

else {
    $decode = json_decode($exec, true);
   // print_r("<img src='".$decode['data'][0]['images']['fixed_width']['url']."'></img>");

   for ($i=0;$i<3;$i++) {
       $a = $decode['data'][$i]['images']['fixed_width']['url'];
       print_r("<img src='".$a."'></img>");
   }
}


?>