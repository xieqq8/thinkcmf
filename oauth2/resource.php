<?php

// include our OAuth2 Server object
require_once __DIR__.'/server.php';
//
//// Handle a request for an OAuth2.0 Access Token and send the response to the client
//if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
//    $server->getResponse()->send();
//    die;
//}
//echo json_encode(array('success' => true, 'message' => 'You accessed my APIs!'));
//

if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
    $server->getResponse()->send();
    die;
}

$token = $server->getAccessTokenData(OAuth2\Request::createFromGlobals());
echo "User ID associated with this token is {$token['user_id']}";  // 当Token被客户端使用的时候，你就知道是哪个用户了，修改resource.php来完成任务

?>