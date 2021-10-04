<?php

require 'vendor/autoload.php';

$local_path = "/tmp/init_all_MD5.sh";

$printbar = function($totalSize, $uploadedSize) {
    printf("uploaded [%d/%d]\n", $uploadedSize, $totalSize);
};

try {
    $result = $cosClient->upload(
        $bucket = $BUCKET,
        $key = 'init_all_MD5.sh',
        $body = fopen($local_path, 'rb')
    );
    // 请求成功
    print_r($result);
} catch (\Exception $e) {
    // 请求失败
    echo($e);
}

