<?php /*a:1:{s:66:"/Users/liuyang/intermis/tp5/application/student/view/st/index.html";i:1523760134;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Shenyang Jianzhu University-Online Service Platform for International Students</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/static/css/style1.css" />
    <script src="/static/js/jquery-2.1.1.min.js"></script>
</head>
<body>

<div class="login-container">
    <h1>International Student Service System</h1>

    <div class="connect">
        <p>International School</p>
    </div>

    <form action=""  id="loginForm">
        <div>
            <input type="text" name="username" class="username" placeholder="user name" autocomplete="off"/>
        </div>
        <div>
            <input type="password" name="password" class="password" placeholder="password" oncontextmenu="return false" onpaste="return false" />
        </div>
        <button id="submit" type="button">Sign In</button>
    </form>

    <a href="register.html">
        <button type="button" class="register-tis">Register</button>
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


                        alert(data.message);


                        location.href = "<?php echo url('student/st/fill'); ?>";

                    }else {
                        alert("User does not exist or wrong password, sign in failure!");
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