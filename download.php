<?php

require 'vendor/autoload.php';

try {
$signedUrl = $cosClient->getObjectUrl($BUCKET, $FILE, '+10 minutes');
$local_file = $Local_PATH;
$remote_file = $signedUrl;
$ch = curl_init();
$fp = fopen ($local_file,'w+');
$ch = curl_init($remote_file);
curl_setopt($ch,CURLOPT_TIMEOUT,50);
curl_setopt($ch,CURLOPT_FILE,$fp);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($ch,CURLOPT_ENCODING,"");
curl_exec($ch);
curl_close($ch);
fclose($fp);
}catch (\Exception $e) {
    echo($e);
}
