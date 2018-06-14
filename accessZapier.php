<?php
$code = $_POST['code'];
$client_ID = $_POST['client_id'];

$msg = 'Access From Zapier : code : ' . $code;
$msg = $msg . '\n client_ID : ' . $client_ID;
$msg = wordwrap($msg, 70);
mail('wangstar1031@hotmail.com', "accessFromZapier", $msg);
// DB::insert('insert into test(Msg) values(?)', [$msg]);

$access_token = $code;

$retVal = new \stdClass;
$retVal->access_token = $code;
$retVal->expires_in = 3600;
$retVal->token_type = 'Bearer';
$retVal->scope = null;
$userInfo = new \stdClass;
$userInfo->username = 'Wang Xing';
$retVal->user = $userInfo;
// print_r($retVal);
echo(json_encode($retVal));
?>