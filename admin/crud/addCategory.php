<?php require ("../headerAdm.php"); ?>
<?php require ("../../db/connect-db.php"); ?>
<main>
    <div class="voidAdm"></div>
    <div class='addGrid'>
        <div class="addHeadline">Добавление новой категории</div>
        <form action='checkAddCategory.php' method='post' enctype='multipart/form-data' id='formAdd'>
            <label for="">Название</label>
            <input type="text" required name='newHeadline'>
            <input type='submit' value='Отправить'>
        </form>
    </div>
</main>
</body>
</html>