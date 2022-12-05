<style>
    .topic{ /* 文字 */
        font-size:medium;
        font-weight: bold;
        text-align: center;
    }
    .mq{/* 跑馬燈 */
        font-size:medium;
        font-weight: bold;
        text-align: center;
        color: brown;
    }
        </style>
<?php
include("../../dbConnection.php");
date_default_timezone_set('Asia/Taipei');
error_reporting(E_ALL & ~E_NOTICE);
echo '<div class="mq"><marquee direction="left" scrollamount="7" behavior="alternate">
我還沒有做完，所以很多功能還不能動~ 我有在認真練功 請不要罵我 我怕被罵 O//口//O </marquee></div>';

echo '<center><h1>產品結帳</h1></center>';

$db = new dbConnection();
$db->dbQuery("SET AUTOCOMMIT=0");
$SQLSTR= "Insert into QIBill values('$billID','$billDate')";
$result=$db->dbQuery($SQLSTR);

$farmID = @$_POST['farmID'];//農場編號
$farmname = $_POST['farmname'];//農場名稱
$pname = $_POST['pname'];//產品名稱
$pid = $str[0];  //產品編號  *取得產品名稱*
$pid2=$_POST['pid2']; //已有的產品
$buydate = $_POST['buydate'];//進貨價
$price = $_POST['price'];//價格
$num = $_POST['num'];//數量
$unit = $_POST['unit']; //單位
$cname = $_POST['cname'];//產品分類名稱
$zonecode = $_POST['zonecode'];//產品分類代號

$billID = substr(date("YmdHis", time()),0,14);
$billDate = $billID;//substr($billID,0,8);
$billID = "QI" . $billID;  //共16碼

    for($i=0;$i<count($pro1)-1;$i++) 
      {
        $pro2 = explode('|', $pro1[$i]);
        $num = explode('。', $pro2[0]);
        $id = explode('。', $pro2[1]);
        $SQLSTR= "UPDATE `stock` SET `stock`=stock-'$num[1]' where `product_id`='$id[2]' and `farm_id`='$id[0]' and `resume_id`='$id[1]'";
        $result=$db->dbQuery($SQLSTR);
      }   
      for($i=0;$i<count($pro1)-1;$i++) //qibilldetails
      {
        $pro2 = explode('|', $pro1[$i]);
        $num = explode('。', $pro2[0]);
        $id = explode('。', $pro2[1]);
        
        $SQLSTR= "Insert into qibilldetail values('$billID','$od','$id[2]','$id[0]','$id[1]','$id[1]','$num[1]')";  
        $result=$db->dbQuery($SQLSTR);
        
         $od++;
      }

$cname=$_POST['cname'];
$fname=$_POST['selFARM'];

echo '<div class="topic">農場名稱：',$fname; echo '<br><br>';
echo '<div class="topic">產品名稱：',$pname; echo '<br><br>';
echo '<div class="topic">產品進價：',$buydate;  echo '<br><br>';
echo '<div class="topic">產品售價：',$price; echo '<br><br>';
echo '<div class="topic">產品數量：',$num;  echo '<br><br>';
echo '<div class="topic">產品單價：',$unit; echo '<br><br>';
echo '<div class="topic">物品科別：',$cname; echo '<br><br>';
?>