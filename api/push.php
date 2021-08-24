<?php

$curl = curl_init();
$authKey = "key=AAAAGgbVgfU:APA91bHMEHBs3Txfz3AGHCPYot9SWzBAZFRQhPudAYZO9mbg5NpSG4MV8y6wZSUYxFy03F5pA9QLZonZ02d4bmd9f992ts7mFU26T3iCdabQVhQYT0TNhDlusgtVYxk07aSeBSUXZCv4";
$registration_ids = '["c0fLEZRZRB6DZfKP9b9L3B:APA91bENWzCwqvA8yHVnblxSJxOdrpI6GnKO7F8ex3WRtOQfz9_PutFe0_lE_Kg6HT7cLbVc-SEaLCZ3bw4nLcYBbVOhF5UmcxMrmQ_7CWsNISE5rdqjSKziL2orgfQKw_Pshp8Q6V7r"]';
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "registration_ids": ' . $registration_ids . ',
  "notification": {
      "title":"Pemberitahuan",
      "body":"Asem Lu"
  }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-type: application/json',
    'Authorization:' . $authKey,
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
