<?php
/**
 * Created by PhpStorm.
 * User: liuyang
 * Date: 2018/3/22
 * Time: 上午11:15
 */

namespace app\student\Controller;
use app\common\Controller\base;
use app\student\model\Dbr;
use app\student\model\department;
use app\student\model\Edubg;
use app\student\model\Family;
use app\student\model\project;
use app\student\model\speciality;
use app\student\model\Student;
use app\student\model\User;

use think\facade\Request;
use app\student\model\Stustatus;
use think\Db;
use app\common\model\country;
use app\common\model\language;
use app\common\model\religion;
use think\facade\Session;


class St extends base
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

    public function _initialize()
    {


    }
    public function _empty($name)
    {
        echo $name.'这个操作不存在';
    }
    protected $beforeActionList = [
        'islogin'=>['except'=>'index,register,login,insert']
    ];
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


            //判断是否已有数据
        $user=Session::get('user');
        $data=Db::table('student')->where('user',$user)->find();

        if($data){
            $this->assign('data',$data);

            $country=Db::table('country')->where('')->select();
            $lang=Db::table('language')->where('')->select();
            $religion=Db::table('religion')->where('')->select();


            $this->assign('country', $country);
            $this->assign('lang', $lang);
            $this->assign('re', $religion);


    }else{
            //查询下拉表数据，模型太慢，换成db
//            $country = country::all();
//            $lang = language::all();
//            $religion = religion::all();
            $data=null;
            $country=Db::table('country')->where('')->select();
            $lang=Db::table('language')->where('')->select();
            $religion=Db::table('religion')->where('')->select();
            $this->assign('data', $data);


            $this->assign('country', $country);
            $this->assign('lang', $lang);
            $this->assign('re', $religion);


        }




            return $this->fetch();

    }
    public function fill1( )
    {
        $user=Session::get('user');
//      $stid=$this->request->param('stid');
//       $this->assign('stid',$stid);
        $this->assign('user',$user);
        $dfam=Db::name('family')->where('user',$user)->select();
        $ddb=Db::name('dbr')->where('user',$user)->find();
        if($dfam){
            $this->assign('dfam',$dfam);
        }
        else{
            $dfam=null;
            $this->assign('dfam',$dfam);
        }

        if($ddb){
            $this->assign('ddb',$ddb);

        }
        else{$ddb=null;
        $this->assign('ddb',$ddb);

        }

        return $this->fetch();
    }
    public function test()
    {

        return $this->fetch();
    }

    public function upload1(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image1');
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
    public function upload2(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image2');
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
    public function upload3(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image3');
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

         $result=Db::table('student')->where('user',$data['user'])->find();
       //$result=Student::where('user',$data['user'])->find();



         if($result){


//            Student::where('user',$data['user'])
//                ->update($data);

            Db::name('student')
                ->where('user',$data['user'])
                ->update($data);

             return ['status'=>2,'message'=>'更新成功','stid1'=>$result['id']];


         }else{

             if($stu=student::create($data))
             {



                 //获取插入成功后对id
                 $stid=$stu->id;

                 //进行跳转，并赋值
              //   $this->redirect('st/fill1',['stid'=>$stid]);
                 //下面是之前用ajax的return，ajax success后读取我们return的数值进行判断，但读取的数值无法再次进行跳转赋值，没弄懂。
                 Db::name('stustatus')->data(['student'=>'ok','stid'=>$stid,'user'=>$user])->insert();

                  return ['status'=>1,'message'=>'插入成功','stid1'=>$stid];

             }
             else
             {
                 $this->error("错误",'/student/st/first');
             }
             }






    }
    public function inserteducation()
    {



        $data=Request::only(['user','passport','graduation','transcript']);
        $data1 = Request::only(['yearfrom','yearto','schoolname','fieldstudy']);

$a=$data1['yearfrom'];
$b=$data1['yearto'];
$c=$data1['schoolname'];
$d=$data1['fieldstudy'];
        $result=Db::table('education')->where('user',$data['user'])->find();

//如果数据表里有数据，则更新；
        if($result){


            Db::name('education')
                ->where('user',$data['user'])
                ->update($data);
            Db::name('edubg')->where('user',$data['user'])->delete();
            $arrlength=count($a);
            for($x=0;$x<$arrlength;$x++){
                $fam=new Edubg([
                    'yearfrom'  =>  $a[$x],
                    'yearto'=>$b[$x],
                    'schoolname'=> $c[$x] ,
                    'fieldstudy'=> $d[$x] ,
                    'user'=>$data['user']
                ]);
                $fam->save();
            }




            return ['status'=>2,'message'=>'更新成功'];


        }else{

            if($stu=Db::name('education')->insert($data))
            {
                Db::name('edubg')->where('user',$data['user'])->delete();
                $arrlength=count($a);
                for($x=0;$x<$arrlength;$x++){
                    $fam=new Edubg([
                        'yearfrom'  =>  $a[$x],
                        'yearto'=>$b[$x],
                        'schoolname'=> $c[$x] ,
                        'fieldstudy'=> $d[$x] ,
                        'user'=>$data['user']
                    ]);
                    $fam->save();
                }




                Db::name('stustatus')->where('user',$data['user'])->update(['education'=>'ok']);

                return ['status'=>1,'message'=>'插入成功'];

            }
            else
            {
                $this->error("错误",'/student/st/first');
            }
        }






    }
    public function istp()
    {


        $data=Request::param();
       // dump($data);
//查询表中是否有数据
        $result=Db::table('studyplan')->where('stid',$data['stid'])->find();
    if($result){

         Db::name('studyplan')
                ->where('stid',$data['stid'])
                ->update($data);

            return ['status'=>2,'message'=>'更新成功','stid1'=>$result['stid']];


        }else{
//如果没有数据插入数据
            if(Db::table('studyplan')->insert($data))
            {

//如果插入成功，在状态表里更新ok
                Db::name('stustatus')->where('stid',$data['stid'])->update(['studyplan'=>'ok']);

                return ['status'=>1,'message'=>'插入成功','stid1'=>$data['stid']];

            }
            else
            {
                $this->error("错误",'/student/st/first');
            }
        }






    }

    public function insert1()
    {



        $data=Request::param();
        $dfam=Request::only('gx,name,mobile,email,zhiwu,company,user');
        $ddb=Request::only('dbrname,dbraddress,dbrmobile,dbrgx,dbrcompany,dbremail,sosname,sosmobile,sosemail,sostel,soscompany,sosaddress,user');
        dump($data);


        $gxx=$dfam['gx'];
       $namee=$dfam['name'];
        $mobilee=$dfam['mobile'];
        $emaill=$dfam['email'];
        $zhiwuu=$dfam['zhiwu'];
        $companyy=$dfam['company'];
       // $fdata=Db::name('family');

        $dfamily=Db::name('family')->where('user',$dfam['user'])->find();
        $ddbr=Db::name('dbr')->where('user',$ddb['user'])->find();
//对数组遍历读取并插入数据库
        if($dfamily){
            //如果有数据，删除，重新插入
            Db::name('family')->where('user',$dfamily['user'])->delete();
            $arrlength=count($gxx);

            for($x=0;$x<$arrlength;$x++) {
                $fam= new family([
                    'gx'  =>  $gxx[$x],
                    'name'  =>  $namee[$x],
                    'mobile'  =>  $mobilee[$x],
                    'email'  =>  $emaill[$x],
                    'zhiwu'  =>  $zhiwuu[$x],
                    'company'  =>  $companyy[$x],
                    'user'=>$data['user']

                ]);
                $fam->save();
                //调试的时候输出的
//            echo "关系=".$gxx[$x].",,name=".$namee[$x];
//            echo "<br>";

            }
        }
        else{
            $arrlength=count($gxx);

            for($x=0;$x<$arrlength;$x++) {
                $fam= new family([
                    'gx'  =>  $gxx[$x],
                    'name'  =>  $namee[$x],
                    'mobile'  =>  $mobilee[$x],
                    'email'  =>  $emaill[$x],
                    'zhiwu'  =>  $zhiwuu[$x],
                    'company'  =>  $companyy[$x],
                    'user'=>$data['user']

                ]);
                $fam->save();
                //调试的时候输出的
//            echo "关系=".$gxx[$x].",,name=".$namee[$x];
//            echo "<br>";

            }

        }
        if($ddbr){
            Db::name('dbr')->where('user',$ddb['user'])->update($ddb);

    }
    else{
        dbr::create($ddb);
    }


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
           return['status'=>1,'data'=>$res,'user1'=>$user,'message'=>'Login success！'];
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


            $depart =department::all();
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

    public function studyplan()
    {

        $country = country::all();
        $lang = language::all();
        $religion = religion::all();
        $user=Session::get('user');
        $studyid=Db::table('studyplan')->where('user',$user)->value('studyid');
        $studyplan=Db::table('project')->where('id',$studyid)->find();

        $stid=$this->request->param('stid');
        $data=Db::table('studyplan')->where('user',$user)->find();
        if($data)
        {$this->assign('data',$data);}
        else
        {$data=null;
            $this->assign('data',$data);
    }

        $this->assign('studyplan',$studyplan);
        $this->assign('stid',$stid);
        $this->assign('country', $country);
        $this->assign('lang', $lang);
        $this->assign('re', $religion);
        return $this->fetch();
    }
    public function education()
    {

        $country = country::all();
        $lang = language::all();
        $religion = religion::all();
        $user=Session::get('user');
        $this->assign('user',$user);
        $data=Db::name('education')->where('user',$user)->find();
        $data1=Db::name('edubg')->where('user',$user)->select();
        if($data1){
            $this->assign('data1',$data1);
            $this->assign('data',$data);
        }else{
            $data=null;
            $data1=null;
            $this->assign('data',$data);
            $this->assign('data1',$data1);

        }

        $this->assign('country', $country);
        $this->assign('lang', $lang);
        $this->assign('re', $religion);
        return $this->fetch();
    }
    public function contact()
    {

        $country = country::all();
        $lang = language::all();
        $religion = religion::all();

        $this->assign('country', $country);
        $this->assign('lang', $lang);
        $this->assign('re', $religion);
        return $this->fetch();
    }
    public function preview()
    {

        $country = country::all();
        $lang = language::all();
        $religion = religion::all();

        $this->assign('country', $country);
        $this->assign('lang', $lang);
        $this->assign('re', $religion);
        return $this->fetch();
    }
    public function chooseproject()
    {
        $user = Session::get('user');

        $data = Request::param();

        $result = Db::table('studyplan')->where('user', $user)->find();
        if ($result) {

            Db::name('studyplan')
                ->where('user', $user)
                ->update(['studyid' => $data['stid']]);

        } else {
            $studyii=Db::table('studyplan')->insert(['studyid' => $data['stid'], 'user' => $user]);

        }



            if (Db::table('stustatus')->where('user', $user)->find()) {
                Db::name('stustatus')->where('user', $user)->update(['studyplan' => 'ok']);
            } else {
                Db::name('stustatus')->insert(['user' => $user, 'studyplan' => 'ok']);
            }


        $this->success('Elective success', 'st/fill');


    }




}