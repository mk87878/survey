<?php
try{
	  $dbh = new PDO("mysql:host=localhost;dbname=survey","root","123456");
	  $dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
	  $dbh->query("set names utf8");
	}
catch(PDOException $e){
  echo ("Error:".$e->getMessage()."<br>");
  die();
}
?>