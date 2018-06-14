<?php
header('Content-Type: application/json');
function getRequestHeaders() {
    $headers = array();
    foreach($_SERVER as $key => $value) {
        if (substr($key, 0, 5) <> 'HTTP_') {
            continue;
        }
        $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
        $headers[$header] = $value;
    }
    return $headers;
}

$headers = getRequestHeaders();
$key = $headers['Authorization'];
$key = str_replace('Bearer ', '', $key);
$key = $key . '   :   ' . 'New Sample Data';
mail('wangstar1031@hotmail.com', "accessFromZapier", wordwrap(json_encode($key), 70));

$profile = new \stdClass;
$profile->id = 2;
$profile->email = 'wangstar1031@hotmail.com';
$profile->name = 'Wang Xing';
$profile->headline = 'fullstack developer';
$retVal = array();
array_push($retVal, $profile);
echo(json_encode($retVal));

?>