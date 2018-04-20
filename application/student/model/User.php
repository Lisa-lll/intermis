<?php
/**
 * Created by PhpStorm.
 * User: liuyang
 * Date: 2018/3/27
 * Time: 上午10:22
 */

namespace app\student\model;

use think\Model;

class User extends Model
{
    protected $pk='id';
    protected $table='user';
    protected $autoWriteTimestamp = true;
    public function setPassAttr($value){
        return md5($value);
    }

}