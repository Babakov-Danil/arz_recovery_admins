<?php
$webhookurl = "https://canary.discord.com/api/webhooks/904509663725375579/G4QypAShBR1tkoctejaGlZuAGFt0ZRCnadgavCwJZz8xNqVM1FgqQjbBhc00scfMCA6t";
$json_data = json_encode([
"content" => "$user_name \n $user_id",], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
// Если что-то не работает, раскомментируйте строку ниже, и почитайте в чём беда :)
//echo $response;
curl_close( $ch );