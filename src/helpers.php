<?php
/**
 * Created by PhpStorm.
 * Author: 紫云沫雪こ
 * Email:email1946367301@163.com
 * Date: 2019/3/21 0021
 * Time: 14:19
 */
if (!function_exists('future_path')) {

    /**
     * 返回库的根目录
     * @param $file
     * @return string
     */
    function future_path($file)
    {

        return dirname(__DIR__) . $file;
    }

}