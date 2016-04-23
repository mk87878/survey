<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 16/4/12
 * Time: 上午1:39
 */
session_start();
include_once 'config/config.php';
?>
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
    <div class="row" >
        <div class="col-xs-12 col-sm-12 head">
            <h3 class="title" style="text-align: center;"><strong>成都职业技术学院软件分院计算机应用技术专业（动态网站方向）人才培养方案调查统计</strong></h3>
            <div>

            </div>
            <form action="answer.php" method="post">
                <table class="table table-striped">
                    <?php
                    $stuMajor = $_SESSION['stuMajor'];
                    $sql = "SELECT * FROM question WHERE stuMajor = '$stuMajor'";
                    $re = $db -> query($sql);
                    $re -> setFetchMode(PDO::FETCH_ASSOC);//setFetchMode设置获取结果集的返回值的类型,当前设置为关联数组类型,为减少服务器资源损耗

                    while($question = $re -> fetch()){
                        $ansCount = count(array_filter($question))-4;//题目选项总长度
                        //判断问题类型
                        if($question['type'] == '1'){
                            echo "<tr><th><div class='form-group'>";
                            echo "<label>".$question['question']."</label><br>";
                            for($i = 1; $i <= $ansCount;$i++){
                                $ans = "ans".+$i;
                                echo $question[$ans]."(";
                                $countSql = "SELECT COUNT(*) FROM answer WHERE questionId = '".$question['id']."' AND an1 = '".$question[$ans]."'";
                                $countRe = $db -> query($countSql);
                                $countNum = $countRe->fetchColumn();
                                echo $countNum;
                                echo "票)<br>";
                            }
                            echo "</div></th></tr>";
                        }//end if（type1单选题）

                        if($question['type'] == '2'){
                            echo " <tr><th><div class='form-group'>";
                            echo "<label>".$question['question']."</label><br>";
                            //循环遍历出选项
                            for($i = 1; $i <= $ansCount;$i++){
                                $ans = "ans".+$i;
                                echo $question[$ans]."(";
                                $countSql = "SELECT COUNT(*) FROM answer WHERE questionId = '".$question['id']."' AND an1 = '".$question[$ans]."'";
                                $countRe = $db -> query($countSql);
                                $countNum = $countRe->fetchColumn();
                                echo $countNum;
                                echo "票)<br>";
                            }
                            echo "</div></th></tr>";
                        }//end if（type2多选题）

                        if($question['type'] == '3'){
                            echo " <tr><th><div class='form-group'>";
                            echo "<label>".$question['question']."</label><br>";
                            //循环遍历出选项
                            for($i = 1; $i <= $ansCount-1;$i++){
                                $ans = "ans".+$i;
                                echo $question[$ans]."(";
                                $countSql = "SELECT COUNT(*) FROM answer WHERE questionId = '".$question['id']."' AND an1 LIKE '%".$question[$ans]."%'";
                                $countRe = $db -> query($countSql);
                                $countNum = $countRe->fetchColumn();
                                echo $countNum;
                                echo "票)<br>";
                            }
                            $ans = "ans".+$ansCount;
                            echo "<label>".$question[$ans]."<input name='".$question['id']."input' type='text'/>";
                            echo "</label><br>";
                            echo "</div></th></tr>";
                        }//end if（type3选项最后一个为填空）


                        if($question['type'] == '4'){
                            echo " <tr><th><div class='form-group'>";
                            echo "<label>".$question['question']."</label><br>";
                            echo "<table class='table table-bordered'><thead><tr><td>课程名称</td><td>非常满意</td><td>满意</td><td>一般</td><td>不满意</td><td>非常不满意</td></tr></thead>";
                            for($i = 1; $i <= $ansCount;$i++){
                                $ans = "ans".+$i;
                                echo "<tr><td>".$question[$ans]."</td>";
                                for ($ci = 1; $ci <= 5; $ci++) {
                                    $chose = $ans.$ci;
                                    $countSql = "SELECT COUNT(*) FROM answer WHERE questionId = '".$question['id']."' AND an1 LIKE '%".$chose."%'";
                                    $countRe = $db -> query($countSql);
                                    $countNum = $countRe->fetchColumn();
                                    echo "<td><label>".$countNum."票</label></td>";
                                }
                                echo "</tr>";

                            }
                            echo "</table></div></th></tr>";
                        }//end if（type4表格式评分）
                        
                        if($question['type'] == '5'){
                            echo " <tr><th><div class='form-group'>";
                            echo "<label>".$question['question']."</label><br>";
                            echo "<lable><textarea style='width: 100%;height: 100px' name='";
                            echo $question['id'];
                            echo "'></textarea></lable></div></th></tr>";
                        }//end if（type5简答题）

                    }//end while
                    ?>

                </table>
                <button class="btn btn-lg btn-default btn-block" type="submit"><b>提交</b></button>
            </form>
        </div>
    </div>

</div>
</body>
</html>