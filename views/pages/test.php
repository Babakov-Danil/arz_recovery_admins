<?php

$params = array(
	"pageSize" => 0, // $_POST[pageSize] = 0
    "firstContactDateFrom" => '2022-03-13', // $_POST[firstContactDateFrom] = '2022-03-13'
    'firstContactDateTill' => '2022-03-14',// $_POST[firstContactDateTill] = '2022-03-14'
);



$data_string = json_encode ($params, JSON_UNESCAPED_UNICODE);
$curl = curl_init('https://bluesales.ru/app/Customers/WebServer.aspx?login=**&password=**&command=customers.get');
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
// Принимаем в виде массива. (false - в виде объекта)
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
   'Content-Type: application/json',
   'Content-Length: ' . strlen($data_string))
);
$result = curl_exec($curl);
curl_close($curl);
echo '<pre>';
print_r($result);

?>