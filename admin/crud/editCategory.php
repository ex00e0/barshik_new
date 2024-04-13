<?php require ("../headerAdm.php"); ?>
<?php require ("../../db/connect-db.php"); 
$id_category = isset($_GET['category'])?$_GET['category']:false;
if ($id_category) {$product = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM cathegories WHERE id_category = $id_category")); }
?>
<main>
    <div class="voidAdm"></div>
    <div class='addGrid'>
        <div class="addHeadline">Редактирование категории</div>
        <form action='checkEditCategory.php' method='post' enctype='multipart/form-data' id='formAdd'>
            <label for="">Название</label>
            <input type="text" required name='newHeadline' value='<?=$product[0][1]?>'>
            <input type="hidden" required name='id_prod' value='<?=$product[0][0]?>'>
            <input type='submit' value='Изменить'>
        </form>
    </div>
</main>
</body>
</html>