<?php /*a:1:{s:65:"/Users/liuyang/intermis/tp5/application/student/view/st/test.html";i:1523007549;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">

    <script type="text/javascript" src="/static/js/jquery.js"></script>


    <title>Title</title>
</head>
<body>

<form id="ttt"  enctype="multipart/form-data" >
    <input type="file" name="image" id="up1" /> <br>
   <img id="im1" src="" width="200" height="200">
    <input id="up" type="button" value="上传" />
</form>

<script type="text/javascript">
    var uploading = false;
$(function () {
    

    $("#up1").on('change', function(){

        $.ajax({
            url: "<?php echo url('student/st/upload'); ?>",
            type: 'POST',
            cache: false,
            data: new FormData($('#ttt')[0]),
            processData: false,
            contentType: false,

            success : function(data) {
             alert(data.status);
             $("#im1").attr({src:"/uploads/"+data.status})
            }
        })
    })
})
</script>
</body>
</html>