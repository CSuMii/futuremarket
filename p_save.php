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
echo '<div class="mq"><marquee direction="left" scrollamount="7" behavior="alternate">
我還沒有做完，所以很多功能還不能動~ 我有在認真練功 請不要罵我 我怕被罵 O//口//O </marquee></div>';

echo '<center><h1>產品結帳</h1></center>';

$fname = $_POST['fname'];
$pname = $_POST['pname'];
$buydate = $_POST['buydate'];
$sale = $_POST['price'];
$num = $_POST['num'];
$unit = $_POST['unit'];
$cname = $_POST['cname'];
$zonecode = $_POST['zonecode'];
$pid = $str[0];  //產品編號  *取得產品名稱*
$pid2=$_POST['pid2']; //已有的產品

echo '<div class="topic">農場名稱：',$fname; echo '<br><br>';
echo '<div class="topic">產品名稱：',$pname; echo '<br><br>';
echo '<div class="topic">產品進價：',$buydate;  echo '<br><br>';
echo '<div class="topic">產品售價：',$price; echo '<br><br>';
echo '<div class="topic">產品數量：',$num;  echo '<br><br>';
echo '<div class="topic">產品單價：',$unit; echo '<br><br>';
echo '<div class="topic">產品科別：',$cname; echo '<br><br>';
?>