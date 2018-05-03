<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});
Route::get('t', function () {
    return 'ttt';
});

Route::get('hello/:name', 'index/hello');

Route::get('h',function ()
{
    $lll=\think\facade\Session::get('name');
    $qx1=\think\Db::table('user')->where('user',$lll)->value('qx1');


    if($qx1=='2'){
       return redirect('t');

    }else{
        return redirect('think');
    }

});


Route::alias('st','student/st');

return [

];

