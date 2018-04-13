<?php /*a:3:{s:65:"/Users/liuyang/intermis/tp5/application/student/view/st/fill.html";i:1523624717;s:67:"/Users/liuyang/intermis/tp5/application/student/view/st/header.html";i:1523603022;s:65:"/Users/liuyang/intermis/tp5/application/student/view/st/left.html";i:1523602918;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shenyang Jianzhu University-Online Service Platform for International Students</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">


    <!-- datetimepicker,日期选择控件 -->
    <link href="/static/css/font-awesome.min.css" rel="stylesheet">
    <link href="/static/css/prettify-1.0.css" rel="stylesheet">
    <link href="/static/css/base.css" rel="stylesheet">
    <link href="/static/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="/static/css/default.css" rel="stylesheet">

    <script src="/static/js/jquery-2.1.1.min.js"></script>

    <script src="/static/js/bootstrap.min.js"></script>
    <script src="/static/js/moment-with-locales.js"></script>
    <script src="/static/js/bootstrap-datetimepicker.js"></script>


    <!-- bootstrap-select，表单下拉控件 -->
    <link rel="stylesheet" href="/static/css/bootstrap-select.min.css">
    <script src="/static/js/bootstrap-select.min.js"></script>
    <script src="/static/js/i18n/defaults-zh_CN.min.js"></script>




    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/static/js/html5shiv.js"></script>
    <script src="/static/js/respond.min.js"></script>
    <![endif]-->






</head>
<body >

<div class="container" style="background-color: white;">
<div class="row bg-primary" >
    <p class="text-right">Welcome!<?php echo htmlentities((isset($user) && ($user !== '')?$user:'123')); ?>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="<?php echo url('logout'); ?>">Sign out</a>    </p>
    <div class="col-md-12 text-center"><h2 style="">China International Student Service System</h2>

    </div>

</div>
<div class="row bg-info" style="height: 55px">
    <nav class="navbar  " style="padding-left: 20px;">
        <a class="navbar-brand" href="<?php echo url('apply'); ?>">Application</a> <a class="navbar-brand" href="#">Application Query</a>
    </nav>
</div>
<div class="row">

    <div class="col-md-2" style="margin-top: 15px;">
    <div class="col-md-12" style="height: 500px;border:1px solid #7e8795;padding: 10px 3px 10px 3px;">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation" class="active"><a href="#">1、Basci Info</a></li>
            <li role="presentation"><a href="#">2、Study Plan</a></li>
            <li role="presentation"><a href="#">3.Education & Employment</a></li>
            <li role="presentation"><a href="#">4.Additional Info</a></li>
            <li role="presentation"><a href="#">5.Contact Info</a></li>
            <li role="presentation"><a href="#">6.Application Form Pre-review</a></li>

        </ul>
    </div>
</div>
  <div class="col-md-10" style="padding: 10px 10px 20px 10px;margin-top: 5px;">
      <div class="col-md-12" >

<form id="stu1"   enctype="multipart/form-data">
          <table class="table table-bordered">

              <tr>
                  <td class="text-right">*Personal Photo</td>

                  <td ><input type="hidden"  value="<?php echo htmlentities($user); ?>" name="user" >
                      <img id="im1" src="" width="120" height="100" >
                  </td>
                  <td colspan="2">

                      <input type="file" name="image" style="visibility: hidden" id="up1"/> <br>
                      Please upload your recent full-faced passport size photo (*.jpg,*.jpeg,*.png).
                      <input type="button" class="btn btn-primary btn-sm" value="Add your photo" onclick="up1.click()">
                      <input type="text" id="imgadd" style="visibility: hidden" class="form-control"  name="imgaddress">

                  </td>

              </tr>
              <tr>
                  <td class="text-right">Family Name(as on passport)</td>
                  <td class="col-xs-4"><input type="text" class="form-control" placeholder="" name="hzx" ></td>
                  <td class="text-right">Given Name(as on passport)</td>
                  <td class="col-xs-4"><input type="text" class="form-control" placeholder="" name="hzm"></td>
              </tr>
              <tr>
                  <td class="text-right">Chinese Name (if available)</td>
                  <td class="col-xs-4"><input type="text" class="form-control" placeholder="" name="zwxm"></td>
                  <td class="text-right">*Gender</td>
                  <td class="col-xs-4">
                      <label class="radio-inline">
                          <input type="radio" name="xb" id="inlineRadio1" value="男"> male
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="xb" id="inlineRadio2" value="女"> female
                      </label>


                  </td>
              </tr>
              <tr>
                  <td class="text-right">*Marital Status</td>
                  <td class="col-xs-4">
                      <label class="radio-inline">
                          <input type="radio" name="hyzk" id="inlineRadio1" value="单身"> unmarried
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="hyzk" id="inlineRadio2" value="已婚"> married
                      </label>


                  </td>
                  <td class="text-right">*Nationality</td>
                  <td>

                      <select  class="selectpicker show-menu-arrow" name="gj" data-width="100%" data-live-search="true"  >
                          <?php if(is_array($country) || $country instanceof \think\Collection || $country instanceof \think\Paginator): $i = 0; $__LIST__ = $country;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
                          <option value="<?php echo htmlentities($list['name']); ?>"><?php echo htmlentities($list['name']); ?></option>
                          <?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>

                  </td>
              </tr>
              <tr>
                  <td class="text-right">*Birth Date</td>
                  <td class="col-xs-4">


                      <div class="row">

                          <div class="form-group col-md-11">
                                  <input type='date' name="csrq" class="form-control" />
                          </div>


                      </div>

                  </td>
                  <td class="text-right">*Country of Birth</td>
                  <td>

                      <select  class="selectpicker show-menu-arrow" name="csgj" data-width="100%" data-live-search="true"  >
                          <?php if(is_array($country) || $country instanceof \think\Collection || $country instanceof \think\Paginator): $i = 0; $__LIST__ = $country;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
                          <option value="<?php echo htmlentities($list['name']); ?>"><?php echo htmlentities($list['name']); ?></option>
                          <?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>


                  </td>
              </tr>
              <tr>
                  <td class="text-right">*Place of Birth(City,Province)</td>
                  <td class="col-xs-4"><input type="text" name="csdd" class="form-control" placeholder=""></td>
                  <td class="text-right">Native language</td>
                  <td>

                      <select data-width="100%" name="my">
                          <?php if(is_array($lang) || $lang instanceof \think\Collection || $lang instanceof \think\Paginator): $i = 0; $__LIST__ = $lang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
                          <option value="<?php echo htmlentities($list['name']); ?>"><?php echo htmlentities($list['name']); ?></option>
                          <?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>

                  </td>
              </tr>
              <tr>
                  <td class="text-right">*Highest Level of Education</td>
                  <td>
                      <select class="form-control" name="zhxl" data-width="100%">
                          <?php if(is_array($lang) || $lang instanceof \think\Collection || $lang instanceof \think\Paginator): $i = 0; $__LIST__ = $lang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
                          <option value="<?php echo htmlentities($list['name']); ?>"><?php echo htmlentities($list['name']); ?></option>
                          <?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>
                  </td>
                  <td class="text-right">*Religion</td>
                  <td>
                      <select data-width="100%" name="zjxy">
                          <?php if(is_array($re) || $re instanceof \think\Collection || $re instanceof \think\Paginator): $i = 0; $__LIST__ = $re;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
                          <option value="<?php echo htmlentities($list['name']); ?>"><?php echo htmlentities($list['name']); ?></option>
                          <?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>
                  </td>
              </tr>
              <tr>
                  <td class="text-right">*Employer or Institution Affiliated	</td>
                  <td class="col-xs-4"><input  name="gzdw" type="text" class="form-control" placeholder=""></td>
                  <td class="text-right">*Occupation</td>
                  <td>
                      <select name="zy"  data-width="100%">
                          <?php if(is_array($lang) || $lang instanceof \think\Collection || $lang instanceof \think\Paginator): $i = 0; $__LIST__ = $lang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
                          <option value="<?php echo htmlentities($list['name']); ?>"><?php echo htmlentities($list['name']); ?></option>
                          <?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>
                  </td>
              </tr>
              <tr>
                  <td class="text-right">Health Status	</td>
                  <td class="col-xs-4"><input name="jkzk" type="text" class="form-control" placeholder=""></td>
                  <td class="text-right">Emigrant from mainland China, Hong Kong, Macau, and Taiwan?</td>
                  <td class="col-xs-4">
                      <label class="radio-inline">
                          <input type="radio" name="sfym" id="inlineRadio1" value="yes"> Yes
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="sfym" id="inlineRadio2" value="no"> No
                      </label>


                  </td>
              </tr>
              <tr>
                  <td class="text-right">Hobby</td>
                  <td class="col-xs-4"><input type="text" name="tcah" class="form-control" placeholder=""></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td class="text-right">*Passport No.</td>
                  <td class="col-xs-4"><input type="text" name="hzhm" class="form-control" placeholder=""></td>
                  <td class="text-right">*Passport Expiration Date</td>
                  <td class="col-xs-4">


                      <div class="row">

                          <div class="form-group col-md-11">
                              <div class='input-group date condate'  id='da2'>
                                  <input type='text' name="hzdq" class="form-control" />
                                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                              </div>
                          </div>


                      </div>

                  </td>
              </tr>
              <tr >
                  <td colspan="4" class="text-center">
                      <button type="button" class="btn btn-default" id="submit1">Save and Next</button>
                  </td>
              </tr>
          </table>
</form>

      </div>
  </div>

</div>

</div>



<script type="text/javascript">
    $(function () {
        $('.condate').datetimepicker();
    });

    $(function () {


        $("#up1").on('change', function(){

            $.ajax({
                url: "<?php echo url('student/st/upload'); ?>",
                type: 'POST',
                cache: false,
                data: new FormData($('#stu1')[0]),
                processData: false,
                contentType: false,

                success : function(data) {
                   // alert(data.status);
                    $("#im1").attr({src:"/uploads/"+data.status});
                    $("#imgadd").val("/uploads/"+data.status);
                }
            })
        })
    });


    $(function () {
        $("#submit1").on('click',function () {

            $.ajax({
                type: 'post',
                url: "<?php echo url('student/st/insert'); ?>",
                data: $('#stu1').serialize(),
                datatype: 'json',
                success: function (data) {

                    if (data.status == 1) {


                        alert(data.stid1);

                        var url="<?php echo url('student/st/fill1',['stid'=>'stidoo']); ?>";
                       url1=url.replace("stidoo",data.stid1);



                        window.location.href=url1;

                     //   $this->redirect('st/fill1',['stid'=>$stid]);





                    }else {
                        alert(data.message);
                    }
                }



            })

        })

    });

   // $(function(){
  //      $('select').searchableSelect();
  //  });
   //$('.selectpicker').selectpicker();
   $('select').selectpicker({

       size: 8
   });
</script>
</body>
</html>