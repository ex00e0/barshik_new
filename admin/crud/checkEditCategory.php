<?php
require ("../../db/connect-db.php"); 

$title = isset($_POST["newHeadline"])?($_POST["newHeadline"]):false;
$id_prod= isset($_POST["id_prod"])?($_POST["id_prod"]):false;

$old_info = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM cathegories WHERE id_category=$id_prod"));

function check_error ($error) {return "<script> alert('$error'); 
    location.href='../categories.php'; </script>";}                              
$query_update = "UPDATE cathegories SET ";
$check_update = false; 
if ($old_info["name_category"] != $title) {$query_update .= "name_category = '$title', "; 
                                   $check_update = true;}

if ($check_update) {$query_update = substr($query_update, 0, -2); 
                    $query_update .= " WHERE id_category = $id_prod";
                    $result = mysqli_query($connect, $query_update);
                     if ($result) {echo check_error("Данные обновлены!");}
                     else echo check_error("Ошибка обновления!".mysqli_error($connect));}
else {echo check_error("Данные актуальны!");}
?>