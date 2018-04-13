<?php /*a:1:{s:69:"/Users/liuyang/intermis/tp5/application/student/view/st/register.html";i:1523601991;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Shenyang Jianzhu University-Online Service Platform for International Students</title>
    <link rel="stylesheet" href="/static/css/stylelogin.css" />
    <script src="/static/js/jquery.min1.js"></script>
<body>

<div class="register-container">
    <h1>Member Register</h1>

    <div class="connect">
        <p>International School</p>
    </div>

    <form action=""  id="registerForm">
        <div>
            <input type="text" name="user" class="username" placeholder="User Name" autocomplete="off"/>
        </div>
        <div>
            <input type="password" name="pass" class="password" placeholder="Password" oncontextmenu="return false" onpaste="return false" />
        </div>
        <div>
            <input type="password" name="confirm_pass   " class="confirm_password" placeholder="Confirm Password" oncontextmenu="return false" onpaste="return false" />
        </div>
        <div>
            <input type="text" name="mobile" class="phone_number" placeholder="Mobile" autocomplete="off" id="number"/>
        </div>
        <div>
            <input type="email" name="email" class="email" placeholder="E-mail" oncontextmenu="return false" onpaste="return false" />
        </div>

        <button id="submit" type="button">Register</button>
    </form>
    <a href="<?php echo url('index'); ?>">
        <button type="button" class="register-tis">Close</button>
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