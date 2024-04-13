<?php
require ("connect-db.php"); 
session_start();
$user_id = $_SESSION['user'];
$title = isset($_POST["newHeadline"])?($_POST["newHeadline"]):false;
$text = isset($_POST["newText"])?($_POST["newText"]):false;
$file = ($_FILES["newImage"]["size"]!=0)?($_FILES["newImage"]):false;

$old_info = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM users WHERE id_user=$user_id"));

function check_error ($error) {return "<script> alert('$error'); 
    location.href='../account.php'; </script>";}                              
$query_update = "UPDATE users SET ";
$check_update = false; 
if ($old_info["email_user"] != $title) {$query_update .= "email_user = '$title', "; 
                                   $check_update = true;}
if ($old_info["password_user"] != $text) {$query_update .= "password_user = '$text', ";
    $check_update = true;}
if ($file) {$query_update .= "user_photo ='".$file['name']."', ";
    $check_update = true;
    move_uploaded_file($file["tmp_name"], "../images/userPhotos/$file[name]");}

if ($check_update) {$query_update = substr($query_update, 0, -2); 
                    $query_update .= " WHERE id_user = $user_id";
                    $result = mysqli_query($connect, $query_update);
                     if ($result) {echo check_error("Данные обновлены!");}
                     else echo check_error("Ошибка обновления!".mysqli_error($connect));}
else {echo check_error("Данные актуальны!");}
?>