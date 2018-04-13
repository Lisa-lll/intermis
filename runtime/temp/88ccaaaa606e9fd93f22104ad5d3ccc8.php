<?php /*a:1:{s:66:"/Users/liuyang/intermis/tp5/application/student/view/st/index.html";i:1523264033;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>留学生服务平台</title>

    <link rel="stylesheet" href="/static/css/style1.css" />
    <script src="/static/js/jquery-2.1.1.min.js"></script>
<body>

<div class="login-container">
    <h1>留学生在线服务系统</h1>

    <div class="connect">
        <p>国际学院</p>
    </div>

    <form action=""  id="loginForm">
        <div>
            <input type="text" name="username" class="username" placeholder="用户名" autocomplete="off"/>
        </div>
        <div>
            <input type="password" name="password" class="password" placeholder="密码" oncontextmenu="return false" onpaste="return false" />
        </div>
        <button id="submit" type="button">登 陆</button>
    </form>

    <a href="register.html">
        <button type="button" class="register-tis">还有没有账号？</button>
    </a>

</div>
<script type="text/javascript">

    $(function () {
        $("#submit").on('click',function () {

            $.ajax({
                type: 'post',
                url: "<?php echo url('student/st/login'); ?>",
                data: $('#loginForm').serialize(),
                datatype: 'json',
                success: function (data) {

                    if (data.status == 1) {


                        alert(data["user"]);

                        location.href = "<?php echo url('student/st/fill'); ?>";

                    }else {
                        alert("用户名或密码错误");
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