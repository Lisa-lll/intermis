<?php
/**
 * Created by PhpStorm.
 * User: liuyang
 * Date: 2018/3/22
 * Time: 上午10:50
 */

namespace app\common\controller;
use think\Controller;
use think\facade\Session;

class base extends Controller
{
    public function islogin()
    {
        if(Session::has('user'))
        {
            $user=Session::get('user');
            $qx1=Session::get('qx1');

            $this->assign('user',$user);
            $this->assign('qx1',$qx1);
        }else{
            $this->redirect('index');
        }
    }

    public function logout()
    {
        Session::clear();
        $this->redirect('index');
    }

}