<?php
/**
 * Created by PhpStorm.
 * User: liuyang
 * Date: 2018/3/23
 * Time: 下午9:47
 */

namespace app\student\model;
use think\Model;

class Student extends Model
{
    protected $pk='id';
    protected $table='student';
    protected $autoWriteTimestamp = true;
}