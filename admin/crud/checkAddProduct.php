<?php require ("../../db/connect-db.php"); ?>
<?php
$newHeadline = isset($_POST["newHeadline"])?($_POST["newHeadline"]):false;
$newText = isset($_POST["newText"])?($_POST["newText"]):false;
$newImage = isset($_FILES["newImage"]["tmp_name"])?($_FILES["newImage"]):false;
$newCategory = isset($_POST["newCategory"])?($_POST["newCategory"]):false;
$newPrice = isset($_POST["newPrice"])?($_POST["newPrice"]):false;

function check_error ($error) {return "<script> alert('$error'); 
    location.href='../index.php'; </script>";}

if (substr($newImage["type"], 0, 5) != "image") {echo check_error('Пришла не картинка');} 
else {$insert = "INSERT INTO products (name_product, desc_product, id_cathegory_prod, price_product, image_product) VALUES ('$newHeadline', '$newText',$newCategory,$newPrice,'$newImage[name]')";
    $result = mysqli_query($connect, $insert);
    if ($result) {move_uploaded_file($newImage["tmp_name"], "../../images/$newImage[name]");
        echo check_error("Продукт успешно добавлен");}
    else echo check_error("Произошла ошибка:". mysqli_error($connect)); }
?>