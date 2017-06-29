<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------

//if (file_exists(CMF_ROOT . "data/conf/route.php")) {
//    $runtimeRoutes = include CMF_ROOT . "data/conf/route.php";
//} else {
//    $runtimeRoutes = [];
//}
//
//return $runtimeRoutes;

//配置文件
return [
    // 添加路由规则 路由到 index控制器的hello操作方法
    'getUser/:name' => 'api/test/getUser',
    // http://127.0.0.1/thinkcmf/public/index.php/api/test/getUser/name/3 ==> http://127.0.0.1/thinkcmf/public/index.php/getUser/3

//    array('User/accompany/:signValue/:userid/[:keyword]', 'User/accompany', '', array('method' => 'GET')),

];