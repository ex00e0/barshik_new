<?php require ("header.php"); ?>
<main>
<div class="voidAdm"></div>
    <div class='rowAdmOrder rowTH'>
        <div></div>
        <div>№</div>
        <div>Дата заказа</div>
        <div>Статус</div>
        <div>Сумма</div>
        <div>Подробности</div>
        <div class='orderTHAction'></div>
        <div class='orderTHAction'>Отзыв</div>
        <div class='orderTHAction'>Удалить</div>
    </div>
<?php
    $id_user = $_SESSION['user'];
    $queProd = "SELECT * FROM orders WHERE id_user=$id_user";
    $products = mysqli_fetch_all(mysqli_query($connect, $queProd));
    //  $cathegories = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM cathegories"));
    foreach ($products as $prod) {$status = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM status_orders WHERE id_status=$prod[3]"));
        echo "<div class='rowAdmOrder rowTD'>
            <div></div>
            <div>$prod[0]</div>
            <div>$prod[2]</div>
            <div>".$status[0][1]."</div> ";
            // foreach ($cathegories as $cat) {if ($prod[3]==$cat[0]) {echo $cat[1];}} 
            echo "<div>$prod[4] ₽</div>
            <div><a href='orderInfoUser.php?order=$prod[0]' class='orderInfoA'>Подробнее..</a></div>
            <div></div>
            <a href='crud/editStatusOrder.php?order=$prod[0]' class='orderButton'><img src='../images/pencil.png' class='editButton'></a>
            <a href='deleteOrderUser.php?order=$prod[0]' class='orderButton'><img src='../images/delete-button.png' class='deleteButton'></a>
        </div>";}
?>
</main>
<script src='js/scriptCat.js'></script>
<?php
        $reg = isset($_GET['reg'])?$_GET['reg']:false;
        if ($reg) {echo "<script>exitEnterButton.click();
                                fromAuthToReg.click(); </script>";}
        $auth = isset($_GET['auth'])?$_GET['auth']:false;
        if ($auth) {echo "<script>exitEnterButton.click();</script>";}
?>
</body>
</html>