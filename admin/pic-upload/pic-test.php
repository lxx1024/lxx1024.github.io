<html>
<head>
<title>文件上传实例</title>
</head>
<body>
<form method="post" action="action.php" enctype="multipart/form-data">
标题：<input name="title" type="text" id="title">
<br>
文件：<input type="file" name="file[]" class="file" onchange="preview()" /><br />
文件：<input type="file" name="file[]" class="file" onchange="preview()" /><br />
<img src="" alt="">
<input type="submit" value="上 传" name="upload">
</form>

<script type="text/javascript">
     function preview(){
          var x = document.getElementById("file2");
          if(!x || !x.value) return;
          var patn = /\.jpg$|\.png$|\.bmp$|\.jpeg$|\.gif$/i;
          if(patn.test(x.value)){
                 console.log(x.value);    //获取图片路径--------------实现预览效果
           }else{
                 alert("您选择的似乎不是图像文件。");
                 x.value="";     //不传入非图片文件
          }
     }
</script>
</script>
</body>
</html>