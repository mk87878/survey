<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="css/homepage.css" rel="stylesheet" type="text/css">
    <style type="text/css"></style>
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="bootstrap/js/jquery-1.11.3.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!--其他引入项目-->
    <title>成都职业技术学院软件分院专业人才培养方案调查问卷</title>
</head>

<body>
<div class="container">
  <div id="row">
      <H2>软件分院专业人才培养方案调查问卷</H2>
  </div>
</div>
<?php
include_once 'config/config.php';
if(isset($_POST['submit'])){//判断是否有提交表单动作（是否需要登录）
    $stuYear = $_POST['stuYear'];
    $stuName = $_POST['stuName'];
    $stuMajor = $_POST['stuMajor'];
    $checkSql = "SELECT * FROM stuInfo WHERE stuName = '$stuName' AND stuMajor = '$stuMajor' AND stuYear = '$stuYear'";
    $checkRe = $db -> query($checkSql);
    $count = $checkRe -> rowCount();
    if($count){
        $info = $checkRe ->fetch();
        $_SESSION['stuId'] = $info['num'];
        $_SESSION['stuMajor'] = $info['stuMajor'];
        echo "<script>location.href='question.php';</script>";
    }else{
        echo "<script>alert('抱歉,信息验证失败!');history.back();</script>";

    }
}

?>
<!--  end tittle-->
<div class="container">
    <div class="row">
        <form class="form-inline" action="index.php" method="post">
        <div class="form-group">
            <label>毕业时间</label>
            <select class="form-control" name="stuYear" >
                <option value="2012">2012</option>
            </select>
        </div>
        <div class="form-group">
            <label>名字</label>
            <input type="text" class="form-control" placeholder="名字" name="stuName">
        </div>
            <div class="form-group">
                <label>专业</label>
                <select class="form-control" name="stuMajor">
                    <option value="计算机软件技术">计算机软件技术</option>
                    <option value="动态网站">计算机技术</option>
                </select>
            </div>
            <button class="btn btn-default" type="submit" name="submit">提交</button>
        </form>
    </div>
    <div class="row">
        <a href="#">查询个人资料</a>
    </div>
</div>


</body>
</html>