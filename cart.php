<?php require "header.php"; ?>
<?php
require "db/connect-db.php";
$id_user = $_SESSION['user'];
?>

    
    <?php
    $sum = 0;
    $query_cart_user = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM bin WHERE id_user = $id_user"));
    if ($query_cart_user) {
        echo "<div class='rowAdmCart rowTH'>
        <div></div>
        <div><b>Фото</b></div>
        <div><b>Название</b></div>
        <div><b>Категория</b></div>
        <div><b>Цена</b></div>
        <div><b>Количество</b></div>
        <div><b>Общая стоимость</b></div>
        <div class='actionCart'>Действия</div>
    </div>";
    $arr = json_decode($query_cart_user[0][2]);
    $all_products =  mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM products"));
    $count = count(get_object_vars($arr));
        foreach ($all_products as $prod) {
            $id = $prod[0];
            if (isset($arr->$id)) {
                $product =  mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM products WHERE id_product=$id"));
                $cat = $product[3];
                $category =  mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM cathegories WHERE id_category=$cat"));
                echo "<div class='rowAdmCart rowTD'>
                     <div></div>
                    <img src='images/".$product[5]."' style='height:100%;'>
                     <div>$product[1]</div>
                     <div>$category[1]</div>
                     <div>$product[4] ₽</div> 
                     <div>".$arr->$id."</div>
                     <div>".($arr->$id)*$product[4]." ₽</div> 
                     <a href='db/edit-cart.php?product=$prod[0]&edit=minus' class='cartA'><img src='images/minus.png' class='editButton'></a>
                     <a href='db/edit-cart.php?product=$prod[0]&edit=plus' class='cartA'><img src='images/plus.png' class='deleteButton'></a>
                     </div> ";
                $sum+=($arr->$id)*$product[4];
             
            }
        }
        echo "<div class='rowAdmCart rowTD'>
    <div></div>
   <div><b>Сумма: </b></div>
    <div><b><font face='montserrat black'>$sum ₽</font></b></div>
    <div></div> 
    <div></div>
    <div></div>  
    <button class='cartDelete'>
        <a href='db/edit-cart.php?edit=delete' style='text-decoration:none; color:white;'>Удалить</a>
    </button>
    <button class='cartBuy'>
        <a href='db/edit-cart.php?edit=buy&sum=$sum' style='text-decoration:none; color:white;'>Купить</a>
    </button>
    </div> ";
}
  else {echo "<div class='rowAdmCart rowTD'><div></div><div style='width:250%;'>Нет товаров!</div></div>";}  
    ?>
</body>
</html>