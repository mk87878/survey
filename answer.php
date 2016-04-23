<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 16/4/12
 * Time: 上午3:56
 */
session_start();
$stuId = $_SESSION['stuId'];
include_once 'config/config.php';
$stuMajor = $_SESSION['stuMajor'];
$sql = "SELECT * FROM question WHERE stuMajor = '$stuMajor'";
$re = $db -> query($sql);
$re -> setFetchMode(PDO::FETCH_ASSOC);//setFetchMode设置获取结果集的返回值的类型,当前设置为关联数组类型,为减少服务器资源损耗

while($question = $re -> fetch()) {
    $ansCount = count(array_filter($question)) - 4;//题目选项总长度
    //判断问题类型
    if ($question['type'] == '1') {
        $questionId = $question['id'];
        $an1 = $_POST[$questionId];
        $inSql = "INSERT INTO answer  (stuId,questionId,an1) VALUES ('$stuId','$questionId','$an1')";
    }
    if ($question['type'] == '2') {
        $questionId = $question['id'];
        $question = $_POST[$questionId];
        $an1 = implode("|",$question);
        $inSql = "INSERT INTO answer  (stuId,questionId,an1) VALUES ('$stuId','$questionId','$an1')";
    }
    if ($question['type'] == '3') {
        $questionId = $question['id'];
        $question = $_POST[$questionId];
        $an1 = implode("|",$question);
        $questionNum = $questionId."input";
        $an2 = $_POST[$questionNum];
        $inSql = "INSERT INTO answer  (stuId,questionId,an1,an2) VALUES ('$stuId','$questionId','$an1','$an2')";

    }
    if ($question['type'] == '4') {
        $questionId = $question['id'];
        for($i = 1; $i <= $ansCount;$i++){
            $ans = "ans".+$i;
            $an.= $_POST[$ans];
            $an.="|";
        }
        $an1 = substr($an,0,strlen($an)-1);
        $inSql = "INSERT INTO answer  (stuId,questionId,an1) VALUES ('$stuId','$questionId','$an1')";
    }
    if ($question['type'] == '5') {
        $questionId = $question['id'];
        $an1 = $_POST[$questionId];
        $inSql = "INSERT INTO answer  (stuId,questionId,an1) VALUES ('$stuId','$questionId','$an1')";
    }
    $inRe = $db -> exec($inSql);
}
