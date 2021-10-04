<?php

function main_handler() {
require "vendor/autoload.php";

$SECRETID = "SECRETID"; //"云 API 密钥 SecretId";
$SECRETKEY = "SECRETKEY"; //"云 API 密钥 SecretKey";
$REGION = "REGION"; //设置一个默认的存储桶地域
$BUCKET = "BUCKET";
$cosClient = new Qcloud\Cos\Client(
    array(
        'region' => $REGION,
        'schema' => 'https', //协议头部，默认为http
        'credentials'=> array(
            'secretId'  => $SECRETID ,
            'secretKey' => $SECRETKEY)));

$FILE = "init_data.sh";
$Local_PATH = '/tmp/init_data.sh';
include 'download.php';
$FILE = "APP_Version.sh";
$Local_PATH = '/tmp/APP_Version.sh';
include 'download.php';

$init_data = md5_file('/tmp/init_data.sh');
$APP_Version = md5_file('/tmp/APP_Version.sh');
file_put_contents('/tmp/init_all_MD5.sh',
'init_data_ID=init_data.sh
init_data_MD5='.$init_data.'
APP_Version_ID=APP_Version.sh
APP_Version_MD5='.$APP_Version.'');


$body = file_get_contents('/tmp/init_all_MD5.sh');
echo $body;
include 'upload.php';
}

?>