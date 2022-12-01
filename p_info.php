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
session_start();
header('Content-Type: text/html; charset=utf8');
include_once("../../dbConnection.php");

$db = new dbConnection();
$SQLSTR= "SELECT p.name,n.resume_id,p.pid,p.zoneCode,left(n.create_date,10) from fproduct p, newinn n where p.pid=n.pid and (n.stage_id=11 or n.stage_id=12)  ";
$result=$db->dbQuery($SQLSTR);

$SQLSTR= "SELECT name FROM farm where farm_id=$farmID";
$result=$db->dbQuery($SQLSTR);
$rs=mysqli_fetch_row($result);
$farmName=$rs[0];
$SQLSTR= "SELECT DISTINCT Q.product_id, P.name ,F.name";
$SQLSTR.=" FROM fproduct AS P LEFT JOIN QIBillDetail AS Q ON Q.product_id = P.pid LEFT JOIN farm AS F ON Q.farm_id = F.farm_id WHERE name='".$farmName."' order by p.name AND z zonecode ";
$result=$db->dbQuery($SQLSTR);

echo '<div class="mq"><marquee direction="left" scrollamount="7" behavior="alternate">
     我還沒有做完，所以很多功能還不能動~ 我有在認真練功 請不要罵我 我怕被罵 O//口//O </marquee></div>';

echo '<center><h1>產品資訊</h1></center>';
echo '<form action="p_save.php" method="post">
<div class="topic">
請輸入農場名稱：　<input type ="text" name="fname" value=""> <br><br>
請輸入產品名稱：　<input type ="text" name="pname" value=""> <br><br>
請輸入產品進價：　<input type ="num" name="buy" value="">   <br><br>
請輸入產品售價：　<input type ="num" name="price" value="">  <br><br>
請輸入產品數量：　<input type ="num" name="num" value="">   <br><br>
請輸入產品單位：　<input type ="text" name="unit" value=""> <br><br></div>';

//產品類別
$SQLSTR= "SELECT `sort_id`, `sort_name` FROM `market_sort`"; 
$result=$db->dbQuery($SQLSTR);
echo '<div class="topic">產品類別：
<select name="sort" id="sort">>
            <option value="0">請選擇產品類別</option>';
            while($rs=mysqli_fetch_row($result)){
                echo '<option value="' .$rs[0].'">' .$rs[1].'</option>';}
            echo '</select></div> <br>';

//分類代號
$SQLSTR= "SELECT `z_id`, `z_name` FROM `zonecode`" ;
$result=$db->dbQuery($SQLSTR);
echo '<div class="topic" id="zonecode">分類代號：
        <select id="zonecode">
        <option value="0">請選擇分類代號</option>';
        while($rs=mysqli_fetch_row($result)){
            echo '<option value="' .$rs[0].'">' .$rs[1].'</option>';}
            echo '</select></div> <br>';

//物品科別
$SQLSTR= "SELECT `c-id`, `c-name` FROM `category`"; 
$result=$db->dbQuery($SQLSTR);
echo '<div class="topic">&nbsp&nbsp&nbsp&nbsp物品科別：
        <select id="cname">
        <option value="0">請選擇物品科別</option>';
        while($rs=mysqli_fetch_row($result)){
        echo '<option value="' .$rs[0].'">' .$rs[1].'</option>';}
        echo '</select></div> <br>';

echo '<div class="topic">進貨日期： <input type="date" id="buydate" name="in-stock" 
      value="0000-00-00" min="2022-01-01"> <br><br>
      <div class="topic">到期日期： <input type="date" id="savedate" name="exp-stock"    value="0000-00-00" min="2022-01-01"> <br><br>';
echo '<div class="topic">保存天數：<select id="deadline">
      <option value="0">請選擇保存天數</option>';
      while($rs=mysqli_fetch_row($result)){
        echo '<option value="' .$rs[0].'">' .$rs[1].'</option>';}
        echo '</select></div> <br>';

echo '<input type ="submit" value="儲存產品資料">
</form>'
?>
<script>
        function process() {
            const nameElement = document.getElementById('name');
            const name = nameElement.value;
            const buypriceElement = document.getElementById('buyprice');
            const buyprice = buypriceElement.value;
            const salepriceElement = document.getElementById('saleprice');
            const saleprice = salepriceElement.value;
            alert('產品品名：' + name + '\n產品進價：' + buyprice + '\n產品售價：' + saleprice);
          }
    </script>