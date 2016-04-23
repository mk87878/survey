<?php
date_default_timezone_set(PRC);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DEMO</title>
    <style>
        body{font-size: 9pt;}
    </style>
</head>

<body>
<?php

if(isset($_POST['submit'])){
	$sqlName = $_POST['sqlName'];
	if($_FILES["pic"]["error"] > 0){
		switch($_FILES["pic"]["error"]) {
			case 1:
				echo "<script>alert('上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值<br>');history.back(-1);</script>";
				break;
			case 2:
				echo "<script>alert('上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值');history.back(-1);</script>";
				break;
			case 3: 
				echo "<script>alert('只有部分文件被上传');history.back(-1);</script>";
				break;

			case 4:
				echo "<script>alert('没有文件被上传');history.back(-1);</script>";
				break;
			default:
				echo "<script>alert('未知错误');history.back(-1);</script>";
		}
		exit;
	}
	$maxsize=5000000;  //文件最大不能超过5MB
	if($_FILES["pic"]["size"] > $maxsize ) {
		echo "<script>alert('上传的文件太大，不能超过{"+$maxsize+"}字节');history.back(-1);</script>";
		exit;
	}
	$allowtype=array("xls");
	$arr=explode(".", $_FILES["pic"]["name"]);
	$hz=$arr[count($arr)-1];
	if(!in_array($hz, $allowtype)){
		echo "<script>alert('上传文件的类型不对，只能上传XLS类型的文档。');history.back(-1);</script>";
		exit;
	}
	$filepath="./";
	$randname="excel.xls";
	if(is_uploaded_file($_FILES["pic"]["tmp_name"])){
		if(move_uploaded_file($_FILES["pic"]["tmp_name"], $filepath.$randname)){
			//
		}else{
			echo "<script>alert('文件上传失败');history.back(-1);</script>";
		}
	}else{
		echo "<script>alert('不是一个上传文件');history.back(-1);</script>";
	}
	require_once 'excel/reader.php'; 
	$data = new Spreadsheet_Excel_Reader();
	$data->setOutputEncoding('utf-8');  //设置编码
	$data->read('./excel.xls');
	$title=array('stuName','stuMajor','stuYear');
	$title_str = '';
	for($i=0;$i<count($title);$i++){
		if($i!=0)
			$title_str .= "、".$title[$i];
		else
			$title_str .= $title[$i];
	}
	if($data->sheets[0]['numCols']<>count($title)){
		echo "<script>alert('EXCEL文档列数和数据表列数不匹配！ EXCEL文档的列数及顺序应该为： ".$title_str."');history.back();</script>";
		die;
	}
	for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {  
		if($data->sheets[0]['cells'][1][$j]<>$title[$j-1]){
			echo "<script>alert('EXCEL文件列名字或顺序错误！期望的列名称是：".$title[$j-1]."，实际的列名称是：".$data->sheets[0]['cells'][1][$j]."');history.back();</script>";
			die;
		};  
	}
	include_once("pdoconn.php");
    $dbh->setAttrIbute(PDO::ATTR_AUTOCOMMIT, 0);
	$dbh->beginTransaction();
	$sql_title_str="stuName,stuMajor,stuYear";
	$import_ok = 0;
	for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
		$sql = "insert into $sqlName ($sql_title_str ) values(";// $values_str )" ;
		$values_str = '';
		for($j=0;$j<count($title);$j++){
			$values_str .= "'".$data->sheets[0]['cells'][$i][$j+1]."',";
		}
		$values_str = substr($values_str,0,strlen($values_str)-2);
		//$values_str .= "'1','".md5('123456');
		$sql .= $values_str . "')";
		//echo $sql;

		$rs = $dbh -> exec($sql);
		if ($dbh->errorCode() != '00000'){
			$lasterror = $dbh->errorInfo();
			echo "导入数据出错！错误原因：".$lasterror[2]."<br>";
		}
		else{
			$import_ok ++ ;
		}
	}
	$dbh->commit();
	echo "<script>alert(\"导入文件中共有 ". ($data->sheets[0]['numRows'] - 1) ." 条数据，本次操作成功导入数据 $import_ok 条\");</script>";
	$dbh = null ;
}
?>
 <form method="post" enctype="multipart/form-data">
 <table width="100%" border="1" cellspacing="0" cellpadding="8"  bordercolor="#000000" style="border-collapse:collapse">
   <tr>
     <td align="right">请输入导入数据库库名称</td>
     <td><input type="text" name="sqlName">
      </td>
   </tr><tr>
     <td align="right">请导入excel文件</td>
     <td><input type="file" name="pic" id="pic">
      <input name="MAX_FILE_SIZE" type="hidden" id="MAX_FILE_SIZE" value="5000000"></td>
   </tr>
			 <tr style="display: none">
				 <td align="right">excel格式（模板）下载</td>
				 <td><a href="phpexcel/tc.xls" style="color: #003366;text-decoration: none">点击下载</a> </td>
			 </tr>
   <tr>
     <td align="right"><input type="submit" name="submit" id="submit" value="提交"></td>
     <td><input type="reset" name="reset" id="reset" value="重置"></td>
   </tr>
 </table>
 </form>
</div>
</body>
</html>