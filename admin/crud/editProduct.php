<?php require ("../headerAdm.php"); ?>
<?php require ("../../db/connect-db.php"); 
$id_product = isset($_GET['product'])?$_GET['product']:false;
if ($id_product) {$product = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM products WHERE id_product = $id_product")); }
?>
<main>
    <div class="voidAdm"></div>
    <div class='addGrid'>
        <div class="addHeadline">Редактирование товара</div>
        <form action='checkEditProduct.php' method='post' enctype='multipart/form-data' id='formAdd'>
            <label for="">Фото</label>
            <div onclick='file.click()'>Выбрать новое фото</div>
            <input type="file" style='display:none;' id='file' name='newImage'>
            <label for="">Название</label>
            <input type="text" required name='newHeadline' value='<?=$product[0][1]?>'>
            <label for="">Описание</label>
            <input type="text" required name='newText' value='<?=$product[0][2]?>'>
            <label for="">Категория</label>
            <select required name='newCategory'>
               <?php
                $cathegories = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM cathegories"));
                foreach ($cathegories as $cat) {if ($cat[0]==$product[0][3]) {echo "<option value='$cat[0]' selected>$cat[1]</option>";} 
                else {echo "<option value='$cat[0]'>$cat[1]</option>";}}
                ?>
            </select>
            <label for="">Цена (₽)</label>
            <input type="number" required name='newPrice' value='<?=$product[0][4]?>'>
            <input type="hidden" required name='id_prod' value='<?=$product[0][0]?>'>
            <input type='submit' value='Изменить'>
            <img src='../../images/<?=$product[0][5]?>' id='imgOld'>
        </form>
    </div>
</main>
</body>
</html>