<?php
/**
 * Created by PhpStorm.
 * User: liuyang
 * Date: 2018/3/16
 * Time: 下午4:10
 */

namespace app\index\controller;


class demo2
{
    public function getname($name='刘阳')
    {
        return 'hello'.$name;
    }

}