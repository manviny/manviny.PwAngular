<?php
// if you want to use it:
// include('./S3/S3_config.php');

// Bucket Name
$bucket="patrimonio24";
if (!class_exists('S3'))require_once('S3.php');
			
//AWS access info
if (!defined('awsAccessKey')) define('awsAccessKey', '*****');
if (!defined('awsSecretKey')) define('awsSecretKey', '*********');
			
//instantiate the class
$s3 = new S3(awsAccessKey, awsSecretKey);
// print_r($s3->listBuckets());
$session->mys3 = $s3->listBuckets();

// $s3->putBucket($bucket, S3::ACL_PUBLIC_READ);

?>