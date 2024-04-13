<?php require ("headerAdm.php"); ?>
<?php require ("../db/connect-db.php"); ?>   
<?php
$id_order = isset($_GET['order'])?$_GET['order']:false;
$order_row = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM order_row WHERE id_order=$id_order"));
$order_info = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM orders WHERE id_order=$id_order"));
$order_date = $order_info[0][2];
?>
<main>
    <div class="voidAdm"></div>
    <div class='rowAdmOrderInfoH'>
        <div></div>
        <div>Заказ № <?=$id_order ?> от <?=$order_date?></div>
    </div>
    <div class='rowAdmOrderInfo rowTH'>
        <div></div>
        <div>Фото</div>
        <div>Название</div>
        <div>Категория</div>
        <div>Цена</div>
        <div>Количество в заказе</div>
        <div>Стоимость</div>
    </div>
    
    
    <?php

    //  $cathegories = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM cathegories"));
    foreach ($order_row as $rows) {$products = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM products WHERE id_product=$rows[2]"));
            $cat = $products[0][3];
            $category = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM cathegories WHERE id_category=$cat"));
           echo "<div class='rowAdmOrderInfo rowTD'>
            <div></div>
            <img src='../images/".$products[0][5]."' class='imgProduct'>
            <div>".$products[0][1]."</div>
            <div>".$category[0][1]."</div> ";
            
            echo "<div>".$products[0][4]." ₽</div>
            <div>$rows[3]</div>";
            $sum = $rows[3]*$products[0][4];
            echo "<div>$sum ₽</div>";
            echo "</div>";}
    ?>
</main>
</body>
</html>