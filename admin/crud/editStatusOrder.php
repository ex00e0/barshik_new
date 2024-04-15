<?php require ("../headerAdm.php"); ?>
<?php require ("../../db/connect-db.php"); 
$id_category = isset($_GET['order'])?$_GET['order']:false;
if ($id_category) {$product = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM orders WHERE id_order = $id_category")); }
$statuses = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM status_orders"));
?>
<main>
    <div class="voidAdm"></div>
    <div class='addGrid'>
        <div class="addHeadline">Редактирование статуса заказа</div>
        <form action='checkEditStatusOrder.php' method='post' enctype='multipart/form-data' id='formAdd'>
            <label for="">Статус</label>
            <select required name='newHeadline'>
                 <?php foreach ($statuses as $stat) {
                    if ($product[0][3] == $stat[1]) {echo "<option value='$stat[1]' selected>$stat[1]</option>";}
                                                           else {echo "<option value='$stat[1]'>$stat[1]</option>";} } ?>
            </select>
            <input type="hidden" required name='id_prod' value='<?=$product[0][0]?>'>
            <input type='submit' value='Изменить'>
        </form>
    </div>
</main>
</body>