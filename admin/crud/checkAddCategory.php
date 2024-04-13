<?php require ("../../db/connect-db.php"); ?>
<?php
$newHeadline = isset($_POST["newHeadline"])?($_POST["newHeadline"]):false;

function check_error ($error) {return "<script> alert('$error'); 
    location.href='../categories.php'; </script>";}

$insert = "INSERT INTO cathegories (name_category) VALUES ('$newHeadline')";
    $result = mysqli_query($connect, $insert);
    if ($result) {echo check_error("Категория успешно добавлена");}
    else echo check_error("Произошла ошибка:". mysqli_error($connect)); 
?>