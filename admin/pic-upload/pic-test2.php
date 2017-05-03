<html>
<head>
<title>文件上传实例</title>
</head>
<body>
<form method="post" action="action2.php" enctype="multipart/form-data">
标题：<input name="title" type="text" id="title">
<br>
文件：<input type="file" name="file[]" class="file" onchange="preview(this)" />
<img src="" alt="图片预览"></img>
<br />
文件：<input type="file" name="file[]" class="file" onchange="preview(this)" /><br />
<img src="" alt="">
<input type="submit" value="上 传" name="upload">
</form>

<script type="text/javascript">
     function preview(x){
         var files = document.getElementsByClassName("file");
         console.log(x.value);   //获取当前触发的input对象对应的值
          if(!x || !x.value) return;
          var path = /\.jpg$|\.png$|\.bmp$|\.jpeg$|\.gif$/i;               //检测文件是否为图片格式
          if(path.test(x.value)){
                 console.log(x.value);    //为后面获取图片路径--------------实现预览效果
                 // x.nextElementSibling.src =" file://"+x.value;
           }else{
                 alert("只能上传jpg、png、bmp、jpeg、gif格式的图片，请重新选择！");
                 x.value="";     //不传入非图片文件
          }
          // 上面直接传入this,不需要循环
         //  for (let i = 0; i < files.length; i++) {
         //        if(!files[i] || !files[i].value) return;
         //        var path = /\.jpg$|\.png$|\.bmp$|\.jpeg$|\.gif$/i;
         //        if(path.test(files[i].value)){
         //               console.log(files[i].value);    //获取图片路径--------------实现预览效果
         //         }else{
         //               alert("您选择的似乎不是图像文件。");
         //               files[i].value="";     //不传入非图片文件
         //        }
         //  }
     }
</script>
</script>
</body>
</html>