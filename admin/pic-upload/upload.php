<html>
<head>
<title>文件上传实例</title>
</head>
<body>
<form method="post" action="action.php" enctype="multipart/form-data">
标题：<input name="title" type="text" id="title">
<br>
文件：<input type="file" name="file[]" /><br />
文件：<input type="file" name="file[]" /><br />
文件：<input type="file" name="file[]" /><br />
文件：<input type="file" name="file[]" /><br />
文件：<input type="file" name="file[]" /><br />
<input type="submit" value="上 传" name="upload">
</form>

</body>
</html>