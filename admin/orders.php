<?php require ("headerAdm.php"); ?>
<?php require ("../db/connect-db.php"); ?>
<!-- <script>
    let search = '';
    $("#navSearch").on("keyup", function() {search = $("#navSearch").val(); 
        $.ajax({
        url: "search.php", 
        type: "POST",
        data: {
            value:  $('#navSearch').val()
         }, 
        success: function(result){
      $("main").html(result);
    }});
                                        } );
</script> -->
<main>
    <div class="voidAdm"></div>
    <div class='rowAdmTovar'>
        <a href='crud/addProduct.php' class='addButton'>
            <div>Добавить товар</div>
        </a>
    </div>
    <div class='rowAdmOrder rowTH'>
        <div></div>
        <div>№</div>
        <div>Дата размещения</div>
        <div>Статус</div>
        <div>Стоимость</div>
        <div>Подробности</div>
        <div class='orderTHAction'>История</div>
        <div class='orderTHAction'>Статус</div>
        <div class='orderTHAction'></div>
    </div>
    
    <?php
    $products = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM orders"));
    //  $cathegories = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM cathegories"));
    foreach ($products as $prod) {echo "<div class='rowAdmOrder rowTD'>
            <div></div>
            <div>$prod[0]</div>
            <div>$prod[2]</div>
            <div>$prod[3]</div> ";
            // foreach ($cathegories as $cat) {if ($prod[3]==$cat[0]) {echo $cat[1];}} 
            echo "<div>$prod[4] ₽</div>
            <div><a href='ordersInfo.php?order=$prod[0]' class='orderInfoA'>Подробнее..</a></div>
            <a href='crud/editProduct.php?order=$prod[0]' class='orderButton2'><img src='../images/clock-time.png' class='editButton'></a>
            <a href='crud/editProduct.php?order=$prod[0]' class='orderButton'><img src='../images/pencil.png' class='editButton'></a>
            <a href='crud/deleteProduct.php?order=$prod[0]' class='orderButton'><img src='../images/delete-button.png' class='deleteButton'></a>
        </div>";}
    ?>
</main>
</body>
</html>