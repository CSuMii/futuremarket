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
    hyml,body{
        background-color:#ABFFAB;
    }
    </style>
<?php
session_start();
header('Content-Type: text/html; charset=utf8');
include_once("../../dbConnection.php");
error_reporting(E_ALL & ~E_NOTICE);
$timezone = date_default_timezone_get();
date_default_timezone_set('Asia/Taipei');

$db = new dbConnection();
$SQLSTR= "SELECT p.name,n.resume_id,p.pid,p.zoneCode,left(n.create_date,10) from fproduct p, newinn n where p.pid=n.pid and (n.stage_id=11 or n.stage_id=12)  ";
$result=$db->dbQuery($SQLSTR);

$farmID = @$_POST['farmID'];//農場編號
$SQLSTR= "SELECT `farmname` FROM `farm` where `farm_id` =$farmID";
$result=$db->dbQuery($SQLSTR);
@$rs=mysqli_fetch_row($result);
$farmName=$rs[0];
$SQLSTR= "SELECT DISTINCT Q.product_id,P.name,F.name";
$SQLSTR.=" FROM fproduct AS P LEFT JOIN QIBillDetail AS Q ON Q.product_id = P.pid LEFT JOIN farm AS F ON Q.farm_id = F.farm_id WHERE F.name ='".$farmName."' order by P.name";
$result=$db->dbQuery($SQLSTR);

echo '<div class="mq"><marquee direction="left" scrollamount="7" behavior="alternate">
     我還沒有做完，所以很多功能還不能動~ 我有在認真練功 請不要罵我 我怕被罵 O//口//O </marquee></div>';

$fname = @$_GET['fname'];
$farmID =@$_GET['farmID']; //取得農友的farm_id
$db = new dbConnection();
if($fname==""){
    $_SESSION['farmID'] = $farmID;
}else{	
    $SQLSTR= "SELECT `farm_id`, `name` from `farm` where name='".$fname."'"; 
    $result=$db->dbQuery($SQLSTR);
    $rs=mysqli_fetch_row($result);
    if($rs==""){
        $fname = $_GET['fname'];
        $SQLSTR= "INSERT INTO `farm`(`name`) VALUES ('".$fname."')";
        $result=$db->dbQuery($SQLSTR);
        $SQLSTR="SELECT MAX(farm_id) FROM `farm`";
        $result=$db->dbQuery($SQLSTR);
        $maxrol=mysqli_fetch_row($result);
        $farmID=$maxrol[0];
        $_SESSION['farmID'] = $farmID;
    }else{
        $fname=$rs[1];
        $farmID=$rs[0];
        $_SESSION['farmID'] = $farmID;
    }
}

echo '<center><h1>產品資訊</h1></center>';
echo '<form action="p_save.php" method="post">';

//農場名稱
$SQLSTR= "SELECT DISTINCT `farmname`,'farm-id'FROM `farm` ORDER BY 'farmname' ASC "; 
$result=$db->dbQuery($SQLSTR);
echo '<div class="topic">&nbsp&nbsp&nbsp&nbsp請選擇舊有的農場名稱：
        <select name="selFARM">
        <option value="0">請選擇農場名稱</option>';
        while($rs=mysqli_fetch_row($result)){
        echo '<option value="' .$rs[0].'">' .$rs[0].'</option>';}
        echo '</select></div> <br>';

echo '<div class="topic">請輸入新加入的農場名稱：<input type ="text" name="inputfname" value=""> <br><br>
請輸入產品名稱：　<input type ="text" name="pname" value="" required="required" > <br><br>
請輸入產品進價：　<input type ="num" name="buyprice" value="" required="required" >   <br><br>
請輸入產品售價：　<input type ="num" name="price" value="" required="required" >  <br><br>
請輸入產品數量：　<input type ="num" name="num" value="" required="required" >   <br><br>
請輸入產品單位：　<input type ="text" name="unit" value="" required="required" > <br><br></div>';    

//產品類別
$SQLSTR= "SELECT `sort_id`, `sort_name` FROM `market_sort`"; 
$result=$db->dbQuery($SQLSTR);
echo '<div class="topic">產品類別：
<select name="sort">
            <option value="0">請選擇產品類別</option>';
            while($rs=mysqli_fetch_row($result)){
             echo '<option value="' .$rs[0].'">' .$rs[1].'</option>';}
             echo '</select></div> <br>';

//分類代號
$SQLSTR= "SELECT `z_id`, `z_name` FROM `zonecode`" ;
$result=$db->dbQuery($SQLSTR);
echo '<div class="topic" id="zonecode">分類代號：
        <select name="zonecode">
        <option value="0">請選擇分類代號</option>';
        while($rs=mysqli_fetch_row($result)){
            echo '<option value="' .$rs[0].'">' .$rs[1].'</option>';}
            echo '</select></div> <br>';

//物品科別
$SQLSTR= "SELECT `c-id`, `c-name` FROM `category`"; 
$result=$db->dbQuery($SQLSTR);
echo '<div class="topic">&nbsp&nbsp&nbsp&nbsp物品科別：
        <select name="cname">
        <option value="0">請選擇物品科別</option>';
        while($rs=mysqli_fetch_row($result)){
        echo '<option value="' .$rs[1].'">' .$rs[1].'</option>';}
        echo '</select></div> <br>';

echo '<div class="topic">進貨日期： <input type="date" name="buydate" 
      value="0000-00-00" min="2022-01-01"> <br><br>
      <div class="topic">到期日期： <input type="date" name="storagedate"    value="0000-00-00" min="2022-01-01"> <br><br>';

$SQLSTR= "SELECT `s_id`, `s_name` FROM `storage`";
$result=$db->dbQuery($SQLSTR);
echo '<div class="topic">保存天數：
     <select name="deadline">
      <option value="0">請選擇保存天數</option>';
      while($rs=mysqli_fetch_row($result)){
        echo '<option value="' .$rs[1].'">' .$rs[1].'</option>';}
        echo '</select></div> <br>';

echo '<input type ="submit" value="儲存產品資料">
</form>'
?>
    
