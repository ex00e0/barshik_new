<?php require "connect-db.php"; ?>
<?php
session_start();
$id = isset($_GET['product']) ? $_GET['product'] : false;
$id_user = $_SESSION['user'];
$query_cart_user = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM bin WHERE id_user = $id_user"));
if ($query_cart_user) {
    $arr = json_decode($query_cart_user[0][2]);
    $check = false;
    if (isset($arr->$id)) {$arr->$id++;}
    else {$check = true;}
    if ($check) {
        $arr->$id=1;
    }
    $json = json_encode($arr);
    $query = mysqli_query($connect, "UPDATE `bin` SET `into_bin`='$json' WHERE `id_user`= $id_user");
} else {
    $arr = [];
    $arr[$id]=1;
    $json = json_encode($arr);
    $query = mysqli_query($connect, "INSERT INTO `bin`(`id_user`, `into_bin`) VALUES ($id_user, '$json')");
}

if ($query) {echo "<script> alert('Успешно добавлено в корзину!'); 
                                    location.href='../catalogue.php'; </script>";} 
else {echo "<script> alert('Ошибка: ".mysqli_error($connect)."'); 
    location.href='../catalogue.php'; </script>";}
?>