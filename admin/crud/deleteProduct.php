<?php
require ("../../db/connect-db.php"); 
function check_error ($error) {return "<script> alert('$error'); 
    location.href='../index.php'; </script>";}
$id_prod = isset($_GET["product"])?$_GET["product"]:false;
if ($id_prod) {$new_info = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM products WHERE id_product=$id_prod")); }

if ($new_info) {$query_delete = mysqli_query($connect,"DELETE FROM products WHERE id_product=$id_prod");
                 if ($query_delete) {echo check_error("Товар удален!"); }
                    else {echo check_error("Ошибка удаления товара: ". mysqli_error($connect)); } }

?>