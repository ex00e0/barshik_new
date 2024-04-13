<?php
require ("../../db/connect-db.php"); 

$title = isset($_POST["newHeadline"])?($_POST["newHeadline"]):false;
$text = isset($_POST["newText"])?($_POST["newText"]):false;
$file = ($_FILES["newImage"]["size"]!=0)?($_FILES["newImage"]):false;
$category_id= isset($_POST["newCategory"])?($_POST["newCategory"]):false;
$price = isset($_POST["newPrice"])?($_POST["newPrice"]):false;
$id_prod= isset($_POST["id_prod"])?($_POST["id_prod"]):false;

$old_info = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM products WHERE id_product=$id_prod"));

function check_error ($error) {return "<script> alert('$error'); 
    location.href='../index.php'; </script>";}                              
$query_update = "UPDATE products SET ";
$check_update = false; 
if ($old_info["name_product"] != $title) {$query_update .= "name_product = '$title', "; 
                                   $check_update = true;}
if ($old_info["desc_product"] != $text) {$query_update .= "desc_product = '$text', ";
    $check_update = true;}
if ($old_info["id_cathegory_prod"] != $category_id) {$query_update .= "id_cathegory_prod = $category_id, ";
    $check_update = true;}
if ($old_info["price_product"] != $price) {$query_update .= "price_product = $price, ";
        $check_update = true;}
if ($file) {$query_update .= "image_product ='".$file['name']."', ";
    $check_update = true;
            move_uploaded_file($file["tmp_name"], "../../images/$file[name]");}

if ($check_update) {$query_update = substr($query_update, 0, -2); 
                    $query_update .= " WHERE id_product = $id_prod";
                    $result = mysqli_query($connect, $query_update);
                     if ($result) {echo check_error("Данные обновлены!");}
                     else echo check_error("Ошибка обновления!".mysqli_error($connect));}
else {echo check_error("Данные актуальны!");}
?>