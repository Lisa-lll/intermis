<?php
/**
 * Created by PhpStorm.
 * User: liuyang
 * Date: 2018/4/16
 * Time: 下午3:35
 */

namespace app\student\model;
use think\Model;

class stustatus extends Model
{
    protected $pk='id';
    protected $table='stustatus';
    protected $autoWriteTimestamp = true;
}