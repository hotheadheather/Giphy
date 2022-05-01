<?php
include('../tpl/curl.tpl.php');

$c = curl_init();

$search_keyword ="skull";

$url= "http://api.giphy.com/v1/gifs/search?api_key=lWzeMNFg5lhH1a12lporYUM2rMR2NeZZ&q=$search_keyword&limit=3&offset=0&rating=g&lang=en";

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
