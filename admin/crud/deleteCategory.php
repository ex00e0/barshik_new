<?php
require ("../../db/connect-db.php"); 
function check_error ($error) {return "<script> alert('$error'); 
    location.href='../categories.php'; </script>";}
$id_prod = isset($_GET["category"])?$_GET["category"]:false;
if ($id_prod) {$new_info = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM cathegories WHERE id_category=$id_prod")); }

if ($new_info) {$query_delete = mysqli_query($connect,"DELETE FROM cathegories WHERE id_category=$id_prod");
                $query_del_prod = mysqli_query($connect,"DELETE FROM products WHERE id_category_prod=$id_prod");
                 if ($query_delete) {echo check_error("Категория и продукты категории удалены!"); }
                    else {echo check_error("Ошибка удаления категории: ". mysqli_error($connect)); } }

?>