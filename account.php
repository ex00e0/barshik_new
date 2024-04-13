<?php require ("header.php"); ?>
<?php 
$user_id = $_SESSION['user'];
$user = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM users WHERE id_user=$user_id")); 
?>
<main>
    <div class="voidAdm"></div>
    <div class='addGrid'>
        <div class="addHeadline">Настройки данных профиля</div>
        <form action='db/checkEditAccount.php' method='post' enctype='multipart/form-data' id='formAccount'>
            <label for="">Фото</label>
            <div onclick='file.click()'>Выбрать новое фото</div>
            <input type="file" style='display:none;' id='file' name='newImage'>
            <label for="">Логин</label>
            <input type="text" required name='newHeadline' value='<?=$user[0][1]?>'>
            <label for="">Пароль</label>
            <input type="text" required name='newText' value='<?=$user[0][2]?>'>
            <input type='submit' value='Изменить'>
            <img src='images/userPhotos/<?=$user[0][4]?>' id='imgOldUser'>
            <div id='photoHeadline'>Текущее фото</div>
        </form>
    </div>
</main>
</body>
</html>