<?php
/**
 * Created by PhpStorm.
 * User: liuyang
 * Date: 2018/5/3
 * Time: 上午11:39
 */

namespace app\student\validate;
use think\Validate;

class user extends Validate
{
    protected $rule = [
        'user'  =>  'require|max:25',
        'email' =>  'email',
        'pass'=>'require|confirm:confirm_pass'
    ];
    protected $message  =   [
        'user.require' => '名称必须',
        'user.max'     => '名称最多不能超过25个字符',
        'pass.confirm'=>'两次密码不一致',


        'email'        => '邮箱格式错误',
    ];



}