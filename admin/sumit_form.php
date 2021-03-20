<?php
if(!(isset($_COOKIE['admin_id']) or isset($_COOKIE['vendor_id'])))
header("location:http://localhost/ci/index.php/My_controller/login");
$link=$_REQUEST['success'];
?>
<html>
<head>
<script>
function myfunction()
{
	document.getElementById("success").click();
}
</script>
</head>
<body onLoad="myfunction()">
<form action="index.php" method="post" id="myform">
	<input hidden="" type="text" name="success" value="<?php echo $link;?>">
    <button hidden="" type="submit" id="success" data-modal="success" value="success"></button>
</form>

<h1 style="padding-left:400px; padding-top:200px;"><img src="../images/loading-x.gif" /></h1>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>