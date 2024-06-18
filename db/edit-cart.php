<?php require "connect-db.php"; ?>
<?php
session_start();
$product = isset($_GET['product']) ? $_GET['product'] : false;
$edit = isset($_GET['edit']) ? $_GET['edit'] : false;
$sum = isset($_GET['sum']) ? $_GET['sum'] : false;
$id_user = $_SESSION['user'];
$query_cart_user = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM bin WHERE id_user = $id_user"));
if ($product and ($edit=="minus" || $edit=="plus")) {
    if ($query_cart_user) {
        $arr = json_decode($query_cart_user[0][2]);
        if ($edit == "minus") {
            if ($arr->$product==1) {unset($arr->$product);
                                    $count = count(get_object_vars($arr));
                                    if ($count != 0 ) {
                                    $json = json_encode($arr);
                                    $query = mysqli_query($connect, "UPDATE `bin` SET `into_bin`='$json' WHERE `id_user`= $id_user");
                                    if ($query) {echo "<script> alert('Товар удален!'); 
                                        location.href='../cart.php'; </script>";} 
                                    else {echo "<script> alert('Ошибка: ".mysqli_error($connect)."'); 
                                        location.href='../cart.php'; </script>";}
                                    }
                                    else {$query = mysqli_query($connect, "DELETE FROM bin WHERE `id_user`= $id_user");
                                        if ($query) {echo "<script> alert('Товаров нет больше, поэтому корзина удалена!'); 
                                            location.href='../cart.php'; </script>";} 
                                        else {echo "<script> alert('Ошибка: ".mysqli_error($connect)."'); 
                                            location.href='../cart.php'; </script>";} }
                                    
                                    }
            else {$arr->$product--;
                $json = json_encode($arr);
                $query = mysqli_query($connect, "UPDATE `bin` SET `into_bin`='$json' WHERE `id_user`= $id_user");
                if ($query) {echo "<script> alert('Количество товара уменьшено!'); 
                    location.href='../cart.php'; </script>";} 
                else {echo "<script> alert('Ошибка: ".mysqli_error($connect)."'); 
                    location.href='../cart.php'; </script>";}
                }
        }

        if ($edit == "plus") {
            if ($arr->$product==7) {unset($arr->$product);
                $json = json_encode($arr);
                $query = mysqli_query($connect, "UPDATE `bin` SET `into_bin`='$json' WHERE `id_user`= $id_user");
                if ($query) {echo "<script> alert('Больше добавить не получится!'); 
                    location.href='../cart.php'; </script>";} 
                else {echo "<script> alert('Ошибка: ".mysqli_error($connect)."'); 
                    location.href='../cart.php'; </script>";}
                }
            else {$arr->$product++;
                $json = json_encode($arr);
                $query = mysqli_query($connect, "UPDATE `bin` SET `into_bin`='$json' WHERE `id_user`= $id_user");
                if ($query) {echo "<script> alert('Количество товара увеличено!'); 
                location.href='../cart.php'; </script>";} 
                else {echo "<script> alert('Ошибка: ".mysqli_error($connect)."'); 
                location.href='../cart.php'; </script>";}
            }
        }

       

    } 
    
}
if ($edit == "delete") {
    $query = mysqli_query($connect, "DELETE FROM bin WHERE `id_user`= $id_user");
                                if ($query) {echo "<script> alert('Корзина удалена!'); 
                                    location.href='../cart.php'; </script>";} 
                                else {echo "<script> alert('Ошибка: ".mysqli_error($connect)."'); 
                                    location.href='../cart.php'; </script>";}
}

if ($edit == "buy" and $sum) {
    $query = mysqli_query($connect, "DELETE FROM bin WHERE `id_user`= $id_user");
    $query2 = mysqli_query($connect, "INSERT INTO orders (id_user, sum_order) VALUES ($id_user, $sum)");
    $id_order = mysqli_insert_id($connect);
    $arr = json_decode($query_cart_user[0][2]);
    $all_products =  mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM products"));
    foreach ($all_products as $prod) {
         $id = $prod[0];
         if (isset($arr->$id)) {
            $product =  mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM products WHERE id_product=$id"));
            $amount = $arr->$id;
            $query3 = mysqli_query($connect, "INSERT INTO order_row (id_order, id_product, amount_products) VALUES ($id_order, $id, $amount)"); } }
    
    echo "<script> alert('Заказ оформлен!'); 
                    location.href='../ordersUser.php'; </script>";
}
?>