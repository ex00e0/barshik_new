<?php require ("../headerAdm.php"); ?>
<?php require ("../../db/connect-db.php"); ?>
<main>
    <div class="voidAdm"></div>
    <div class='addGrid'>
        <div class="addHeadline">Добавление нового товара</div>
        <form action='checkAddProduct.php' method='post' enctype='multipart/form-data' id='formAdd'>
            <label for="">Фото</label>
            <div onclick='file.click()'>Выбрать фото</div>
            <input type="file" required style='display:none;' id='file' name='newImage'>
            <label for="">Название</label>
            <input type="text" required name='newHeadline'>
            <label for="">Описание</label>
            <input type="text" required name='newText'>
            <label for="">Категория</label>
            <select required name='newCategory'>
               <?php
                $cathegories = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM cathegories"));
                foreach ($cathegories as $cat) {echo "<option value='$cat[0]'>$cat[1]</option>";}
                ?>
            </select>
            <label for="">Цена (₽)</label>
            <input type="number" required name='newPrice'>
            <input type='submit' value='Отправить'>
        </form>
    </div>
</main>
</body>
</html>