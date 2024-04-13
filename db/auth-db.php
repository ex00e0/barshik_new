<?php
require ("connect-db.php");
$email = strip_tags(trim($_POST['email']));
$password = strip_tags(trim($_POST['password']));

$userEmail = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM users WHERE email_user='$email'"));        
//получение совпадений введенных данных с базой данных по логину
$userPass = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM users WHERE password_user='$password'"));
//получение совпадений введенных данных с базой данных по паролю

if(!isset($userEmail) && !isset($userPass)){     //если оба массива пустые
	echo "<script>alert('Такой пользователь не найден.'); location.href='../catalogue.php?auth=retry'; </script>";
	exit();
}
else if(!isset($userEmail) || !isset($userPass)){    //если только один из массивов пустой
	echo "<script>alert('Логин или пароль введены неверно'); location.href='../catalogue.php?auth=retry';</script>";
	exit();
}

session_start();
$_SESSION['user']=$userEmail['id_user'];
if ($userEmail['status']=='admin') {header('Location: ../admin/index.php');} 
else {header('Location: ../catalogue.php');}
?>