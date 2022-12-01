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

echo '<center><h1>產品資訊</h1></center>';
echo '<form action="p_save.php" method="post">
<div class="topic">請輸入產品名稱：　<input type ="text" name="name" value=""> <br><br>
請輸入產品進價：　<input type ="num" name="buy" value="">   <br><br>
請輸入產品售價：　<input type ="num" name="sale" value="">  <br><br>
請輸入產品數量：　<input type ="num" name="num" value="">   <br><br>
請輸入產品單價：　<input type ="text" name="unit" value=""> <br><br></div>

<div class="topic">產品類別：
<Select name="cate＂>
<select>
            <option>請選擇產品類別</option>
            <!-- 不確定是否有資料表 -->
            <optgroup label="食品">
                <option>生鮮食品</option>
                <option>冷凍食品</option>
                <option>本土食品</option>
                <option>健康食品</option>
                <option>當季蔬果</option>
                <option>烘培類</option>
                <option>零食區</option>
                <option>熟食</option>
            </optgroup>       

            <optgroup label="飲品">
                <option>現打果汁</option>
                <option>沖泡類</option>
                <option>飲品</option>
            </optgroup>

            <optgroup label="兌換卷">
                <option>商品抵用卷</option>
                <option>餐飲抵用卷</option>
            </optgroup>       
            
            <optgroup label="其它">
                <option>茶醣類</option>
                <option>加工品</option>
                <option>日用品</option>
                <option>精品區</option>                
            </optgroup>  
        </select>
    </div> <br>

    <div class="topic">分類代號：
        <select>
            <option>請選擇分類代號</option>
            <!-- 待匯入資料表 -->
        </select>
    </div> <br>

    <div class="topic">物品科別：
        <select>
            <option>請選擇物品科別</option>
            <!-- 待匯入資料表 -->
        </select>　<br><br>

    進貨日期： <input type="date" id="instockdate" name="in-stock" value="0000-00-00" min="2022-01-01"> <br><br>
    到期日期： <input type="date" id="expdate" name="exp-stock"    value="0000-00-00" min="2022-01-01"> <br><br>
    保存天數： <select><option>請選擇保存天數</option></select> <br><br>

<input type ="submit" value="儲存產品資料">
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