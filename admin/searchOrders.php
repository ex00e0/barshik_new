<?php 
 $data = $_POST['text'];
 $post = isset($data['name'])?$data['name']:false;   
$filter = isset($data['filters'])?$data['filters']:false; 
?>
 <?php require ("../db/connect-db.php"); ?>
<main>
    <div class="voidAdm"></div>
    <div class='rowAdmTovar'>
    <div id='gridFilter'>
            <div id='labelFilter'> Показывать: </div>
            <select id='selectFilter'>
                <option value="">все</option>
                <?php
                $categ = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM status_orders"));
                foreach ($categ as $catcat) {echo "<option value='$catcat[1]' ";
                    if ($catcat[1]==$filter) {echo 'selected';}
                    echo ">$catcat[1]</option>";}
                ?>
            </select>
         </div>    
    </div>
    <div class='rowAdmOrder rowTH'>
        <div></div>
        <div>№</div>
        <div>Дата размещения</div>
        <div>Статус</div>
        <div>Стоимость</div>
        <div>Подробности</div>
        <div class='orderTHAction'>История</div>
        <div class='orderTHAction'>Статус</div>
        <div class='orderTHAction'></div>
    </div>
    
    <?php
    $queProd = "SELECT * FROM orders";
    if ($post && $filter) {$queProd.=" WHERE id_order LIKE '%$post%' AND status_order='$filter'";}
    else if ($post) {$queProd.=" WHERE id_order LIKE '%$post%'";}
    else if ($filter) {$queProd.=" WHERE status_order = '$filter'";}
    $products = mysqli_fetch_all(mysqli_query($connect, $queProd));
    //  $cathegories = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM cathegories"));
    foreach ($products as $prod) {echo "<div class='rowAdmOrder rowTD'>
            <div></div>
            <div>$prod[0]</div>
            <div>$prod[2]</div>
            <div>$prod[3]</div> ";
            // foreach ($cathegories as $cat) {if ($prod[3]==$cat[0]) {echo $cat[1];}} 
            echo "<div>$prod[4] ₽</div>
            <div><a href='ordersInfo.php?order=$prod[0]' class='orderInfoA'>Подробнее..</a></div>
            <a href='crud/editProduct.php?order=$prod[0]' class='orderButton2'><img src='../images/clock-time.png' class='editButton'></a>
            <a href='crud/editStatusOrder.php?order=$prod[0]' class='orderButton'><img src='../images/pencil.png' class='editButton'></a>
            <a href='crud/deleteOrder.php?order=$prod[0]' class='orderButton'><img src='../images/delete-button.png' class='deleteButton'></a>
        </div>";}
    ?>
</main>
<script>
let post = '<?php if ($post == "") {echo "0";}
                       else echo "$post"; ?>';
let filter = '<?php if ($filter == "") {echo '0';} else echo "$filter"; ?>';
$(document).ready(function() {
  $('#navSearch').on('keyup', loc(post, filter));
  $('#selectFilter').on('change', loc(post, filter));
});
var loc = function (post, filter) {
   
    filter =  $("#selectFilter").val();
    post =  $("#navSearch").val();
   
    location.href=`orders.php?post=${post}&filter=${filter}`;
}
</script>
</body>
</html>