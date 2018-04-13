<?php /*a:1:{s:69:"/Users/liuyang/intermis/tp5/application/student/view/st/register.html";i:1523263959;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>留学生在线服务系统</title>
    <link rel="stylesheet" href="/static/css/stylelogin.css" />
    <script src="/static/js/jquery.min1.js"></script>
<body>

<div class="register-container">
    <h1>用户注册</h1>

    <div class="connect">
        <p>国际学院</p>
    </div>

    <form action=""  id="registerForm">
        <div>
            <input type="text" name="user" class="username" placeholder="您的用户名" autocomplete="off"/>
        </div>
        <div>
            <input type="password" name="pass" class="password" placeholder="输入密码" oncontextmenu="return false" onpaste="return false" />
        </div>
        <div>
            <input type="password" name="confirm_pass   " class="confirm_password" placeholder="再次输入密码" oncontextmenu="return false" onpaste="return false" />
        </div>
        <div>
            <input type="text" name="mobile" class="phone_number" placeholder="输入手机号码" autocomplete="off" id="number"/>
        </div>
        <div>
            <input type="email" name="email" class="email" placeholder="输入邮箱地址" oncontextmenu="return false" onpaste="return false" />
        </div>

        <button id="submit" type="button">注 册</button>
    </form>
    <a href="<?php echo url('index'); ?>">
        <button type="button" class="register-tis">已经有账号？</button>
    </a>

</div>

<script type="text/javascript">
    $(function () {
        $("#submit").on('click',function () {

            $.ajax({
                type: 'post',
                url: "<?php echo url('student/st/regist'); ?>",
                data: $('#registerForm').serialize(),
                datatype: 'json',
                success: function (data) {

                    if (data.status == 1) {


                        alert(data.message);
                        location.href = "<?php echo url('student/st/fill'); ?>";



                    }else {
                        alert(data.message);
                    }
                }



            })

        })

    });
</script>


<!--背景图片自动更换-->
<script src="/static/js/supersized.3.2.7.min.js"></script>
<script src="/static/js/supersized-init.js"></script>
<!--表单验证-->


</body>
</html>