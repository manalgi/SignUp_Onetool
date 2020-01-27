<?php
$response = file_get_contents('https://api.kickbox.com/v2/verify?email=&apikey=');
$response = json_decode($response, true);
print_r($response["result"] == "deliverable");
?>