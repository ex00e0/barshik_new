<?php
require "connect-db.php";
$email = strip_tags(trim($_POST['email']));
$password = strip_tags(trim($_POST['password'])); 

// if(mb_strlen($login) == 0 || mb_strlen($pass) == 0){  //проверка на незаполненные поля
// 	echo "У вас есть незаполненные поля";
// 	exit();
// }
// if(mb_strlen($login) < 5 || mb_strlen($login) > 100){             //проверка на длину логина
// 	echo "Недопустимая длина логина";
// 	exit();
// }

$result1 = mysqli_query($connect, "SELECT * FROM users WHERE email_user = '$email'");
$user1 = mysqli_fetch_assoc($result1); 
if(!empty($user1)){echo "<script>alert('Данный логин уже используется!'); location.href='../catalogue.php?reg=retry'; </script>"; //проверка на существование данного логина
	exit();
}
$res = mysqli_query($connect,"INSERT INTO users (email_user, password_user, bonuses_active, status) VALUES('$email', '$password', 0, 'user')");

if ($res == 1) {session_start();
                $_SESSION['user']=mysqli_insert_id($connect);
                    echo "<script>alert('Вы успешно зарегистрировались!');
                    location.href='../account.php'</script>";}
// ввод данных в бд при успешной регистрации
?>