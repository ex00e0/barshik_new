<?php
require ("db/connect-db.php"); 
function check_error ($error) {return "<script> alert('$error'); 
    location.href='../ordersUser.php'; </script>";}
$id_prod = isset($_GET["order"])?$_GET["order"]:false;
if ($id_prod) {$new_info = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM orders WHERE id_order=$id_prod")); }

if ($new_info) {$query_delete = mysqli_query($connect,"DELETE FROM orders WHERE id_order=$id_prod");
                $query_del_prod = mysqli_query($connect,"DELETE FROM order_row WHERE id_order=$id_prod");
                 if ($query_delete) {echo check_error("Заказ удален!"); }
                    else {echo check_error("Ошибка удаления заказа: ". mysqli_error($connect)); } }

?>