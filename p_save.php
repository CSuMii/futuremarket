<?php
$name = $_POST['name'];
$buy = $_POST['buy'];
$sale = $_POST['sale'];
$num = $_POST['num'];
$unit = $_POST['unit'];

echo '產品名稱：',$name; echo '<br>';
echo '產品進價：',$buy;  echo '<br>';
echo '產品售價：',$sale; echo '<br>';
echo '產品數量：',$num;  echo '<br>';
echo '產品單價：',$unit; echo '<br>';
?>