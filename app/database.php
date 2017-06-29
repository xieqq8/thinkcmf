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

/**
 * database.php       （应用）数据库配置文件
 */
if(file_exists(CMF_ROOT."data/conf/database.php")){
    $database=include CMF_ROOT."data/conf/database.php";
}else{
    $database=[];
}

return $database;
