<?php
/**
 * Created by PhpStorm.
 * User: liuyang
 * Date: 2018/3/22
 * Time: 上午11:15
 */

namespace app\student\controller;
use app\common\controller\base;
use app\student\model\dbr;
use app\student\model\department;
use app\student\model\family;
use app\student\model\project;
use app\student\model\speciality;
use app\student\model\user;
use think\facade\Request;
use app\student\model\student;
use think\Db;
use app\common\model\Country;
use app\common\model\language;
use app\common\model\religion;
use think\facade\Session;


class st extends base
{
    public function register()
    {
        $this->assign('kk','测试变量');
       return $this->fetch();
    }
    public function index()
    {

        return $this->fetch();
    }

    public function fill()
    {
            $this->islogin();
            $country = Country::all();
            $lang = language::all();
            $religion = religion::all();

            $this->assign('country', $country);
            $this->assign('lang', $lang);
            $this->assign('re', $religion);



            return $this->fetch();

    }
    public function fill1( )
    {
      $stid=$this->request->param('stid');
       $this->assign('stid',$stid);

        return $this->fetch();
    }
    public function test()
    {

        return $this->fetch();
    }

    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move( '../public/uploads');
        return['status'=>$info->getSavename()];
        if($info){
            // 成功上传后 获取上传信息
            // 输出 jpg
            echo $info->getExtension();
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getSaveName();
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
            echo $aa=$info->getFilename();

           // return['status'=>$aa];

        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
    public function insertajax()
    {
        if(Request::isAjax())

        {
            $data=Request::post();
           // halt($data);
            if($stu=student::create(
               $data
            ))

            {
              //  $stid=Db::name('student')->getLastInsID();
                $stid=$stu->id;
                $this->redirect('st/fill1',['stid'=>$stid]);

               // return ['status'=>1,'message'=>'插入成功','stid1'=>$stid];
               // $this->assign('stid',$stid);
               // $this->fetch('fill',$stid);

             //  $this->redirect('st/fill1');



           //    return $this->fill1()->fetch();

            }
            else
            {
                $this->error("错误",'/student/st/first');
            }

        }

    }
    public function insert()
    {



            $data=Request::param();

            if($stu=student::create(
                $data
            ))

            {
                //获取插入成功后对id
                $stid=$stu->id;
              //进行跳转，并赋值
                $this->redirect('st/fill1',['stid'=>$stid]);
                //下面是之前用ajax的return，ajax success后读取我们return的数值进行判断，但读取的数值无法再次进行跳转赋值，没弄懂。

                // return ['status'=>1,'message'=>'插入成功','stid1'=>$stid];

            }
            else
            {
                $this->error("错误",'/student/st/first');
            }



    }

    public function insert1()
    {



        $data=Request::param();


        $gxx=$data['gx'];
       $namee=$data['name'];
        $mobilee=$data['mobile'];
        $emaill=$data['email'];
        $zhiwuu=$data['zhiwu'];
        $companyy=$data['company'];
//对数组遍历读取并插入数据库
        $arrlength=count($gxx);

        for($x=0;$x<$arrlength;$x++) {
            $fam= new family([
                'gx'  =>  $gxx[$x],
                'name'  =>  $namee[$x],
                'mobile'  =>  $mobilee[$x],
                'email'  =>  $emaill[$x],
                'zhiwu'  =>  $zhiwuu[$x],
                'company'  =>  $companyy[$x],
                'stid'=>$data['stid']

            ]);
            $fam->save();
            //调试的时候输出的
//            echo "关系=".$gxx[$x].",,name=".$namee[$x];
//            echo "<br>";

        }

        $this->redirect('st/first');
//单条数据指直接用creat插入数据库
            dbr::create($data);
        //调试的时候输出的

          // dump($data);








    }

    public function uploadt()
    {

/**
 * upload.php
 *
 * Copyright 2013, Moxiecode Systems AB
 * Released under GPL License.
 *
 * License: http://www.plupload.com/license
 * Contributing: http://www.plupload.com/contributing
 */

#!! 注意
#!! 此文件只是个示例，不要用于真正的产品之中。
#!! 不保证代码安全性。

#!! IMPORTANT:
#!! this file is just an example, it doesn't incorporate any security checks and
#!! is not recommended to be used in production environment as it is. Be sure to
#!! revise it and customize to your needs.


// Make sure file is not cached (as it happens for example on iOS devices)
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


// Support CORS
// header("Access-Control-Allow-Origin: *");
// other CORS headers if any...
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit; // finish preflight CORS requests here
}


if ( !empty($_REQUEST[ 'debug' ]) ) {
    $random = rand(0, intval($_REQUEST[ 'debug' ]) );
    if ( $random === 0 ) {
        header("HTTP/1.0 500 Internal Server Error");
        exit;
    }
}

// header("HTTP/1.0 500 Internal Server Error");
// exit;


// 5 minutes execution time
@set_time_limit(5 * 60);

// Uncomment this one to fake upload time
// usleep(5000);

// Settings
// $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
$targetDir = 'upload_tmp';
$uploadDir = 'upload';

$cleanupTargetDir = true; // Remove old files
$maxFileAge = 5 * 3600; // Temp file age in seconds


// Create target dir
if (!file_exists($targetDir)) {
    @mkdir($targetDir);
}

// Create target dir
if (!file_exists($uploadDir)) {
    @mkdir($uploadDir);
}

// Get a file name
if (isset($_REQUEST["name"])) {
    $fileName = $_REQUEST["name"];
} elseif (!empty($_FILES)) {
    $fileName = $_FILES["file"]["name"];
} else {
    $fileName = uniqid("file_");
}

$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
$uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;

// Chunking might be enabled
$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;


// Remove old temp files
if ($cleanupTargetDir) {
    if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
    }

    while (($file = readdir($dir)) !== false) {
        $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

        // If temp file is current file proceed to the next
        if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
            continue;
        }

        // Remove temp file if it is older than the max age and is not the current file
        if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
            @unlink($tmpfilePath);
        }
    }
    closedir($dir);
}


// Open temp file
if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
}

if (!empty($_FILES)) {
    if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
    }

    // Read binary input stream and append it to temp file
    if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
    }
} else {
    if (!$in = @fopen("php://input", "rb")) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
    }
}

while ($buff = fread($in, 4096)) {
    fwrite($out, $buff);
}

@fclose($out);
@fclose($in);

rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

$index = 0;
$done = true;
for( $index = 0; $index < $chunks; $index++ ) {
    if ( !file_exists("{$filePath}_{$index}.part") ) {
        $done = false;
        break;
    }
}
if ( $done ) {
    if (!$out = @fopen($uploadPath, "wb")) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
    }

    if ( flock($out, LOCK_EX) ) {
        for( $index = 0; $index < $chunks; $index++ ) {
            if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                break;
            }

            while ($buff = fread($in, 4096)) {
                fwrite($out, $buff);
            }

            @fclose($in);
            @unlink("{$filePath}_{$index}.part");
        }

        flock($out, LOCK_UN);
    }
    @fclose($out);
}

// Return Success JSON-RPC response
die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
    }

    public function login()
    {
        $data=Request::param();
        $user=$data['username'];
        $pass=md5($data['password']);
       $res= Db::table('user')
            ->where('user',$user)
            ->where('pass',$pass)
            ->find();
       if($res){

           Session::set('user',$res['user']);
           $user=Session::get('user');
           return['status'=>1,'data'=>$res,'user1'=>$user];
       }

    }
    public function header()
    {

        return $this->fetch();
    }
    public function left()
    {

        return $this->fetch();
    }
    public function regist(){
        $data=Request::param();

        $user=Db::table('user')->where('user',$data['user'])->find();
        if(is_null($user)) {
            if ($stu = user::create($data)) {//获取插入成功后对id
                // $stid=$stu->id;
                //进行跳转，并赋值
                // $this->redirect('st/fill1',['stid'=>$stid]);
                //下面是之前用ajax的return，ajax success后读取我们return的数值进行判断，但读取的数值无法再次进行跳转赋值，没弄懂。
                Session::set('user', $data['user']);
                return ['status' => 1, 'message' => '注册成功'];
            }
        }else
        {
            return['message'=>'用户名重复'];

        }

    }

    public function apply()
    {



            $depart = department::all();
            $speci = speciality::all();
            // $projec=project::all();
            $projec=project::where('')->paginate(7);

            //  $projec=Db::table('project')->where('name','硕士研究生')->paginate(5);


            $this->assign('depart', $depart);
            $this->assign('speci', $speci);
            $this->assign('projec', $projec);
            return $this->fetch();



    }
    public function cxpro()
    {
        $data=Request::param();
        $depart=Request::param('depart');
        $speci=Request::param('speci');
//        $user=$data['username'];
//        $pass=md5($data['password']);
//        $res= Db::table('user')
//            ->where('user',$user)
//            ->where('pass',$pass)
//            ->find();
//        if($res){
//
//            Session::set('user',$res['user']);
//            $user=Session::get('user');
//            return['status'=>1,'data'=>$res,'user1'=>$user];
//        }
//
        if(empty($depart)){}else{ $map['depart'] = $depart;}
        if(empty($speci)){}else{  $map['speci'] = $speci;}

        if(empty($depart) and empty($speci)){
            $projec=project::all();
            $coun=project::all()->count();
        }else{
            $projec=project::where($map)->select()->toArray();
            $coun=project::where($map)->count();
        }




        return['status'=>1,'projec'=>$projec,'coun'=>$coun,'dep'=>$depart,'spc'=>$speci];
    }

}