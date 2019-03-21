<?php
/**
 * Created by PhpStorm.
 * Author: 紫云沫雪こ
 * Email:email1946367301@163.com
 * Date: 2019/3/21 0021
 * Time: 10:16
 */

namespace Future\Admin\Facades;

use  Illuminate\Support\Facades\Facade;

class Admin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'admin';
    }
}