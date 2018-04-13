<?php
/**
 * Created by PhpStorm.
 * User: liuyang
 * Date: 2018/3/16
 * Time: 下午3:41
 */

namespace app\index\controller;
use think\Controller;
use think\Db;
use think\facade\View;
class demo1 extends Controller
{
    public function conn1()
    {
      $data=Db::table('user')->select();
      $this->view->assign('data',$data);


      return $this->fetch();

    }
    public function conn2()
    {
        $data=Db::table('user')->select();
        $this->view->assign('data',$data);


        return $this->fetch();

    }

}