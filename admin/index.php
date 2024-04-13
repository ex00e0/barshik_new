<?php require ("headerAdm.php"); ?>
<?php require ("../db/connect-db.php"); ?>
<script>
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
</script>
<main>
    <div class="voidAdm"></div>
    <div class='rowAdmTovar'>
        <a href='crud/addProduct.php' class='addButton'>
            <div>Добавить товар</div>
        </a>
    </div>
    <div class='rowAdmTovar rowTH'>
        <div></div>
        <div>Фото</div>
        <div>Название</div>
        <div>Описание</div>
        <div>Категория</div>
        <div>Цена</div>
        <div class='actionAdm'>Действия</div>
    </div>
    
    <?php
    $products = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM products"));
     $cathegories = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM cathegories"));
    foreach ($products as $prod) {echo "<div class='rowAdmTovar rowTD'>
            <div></div>
            <img src='../images/$prod[5]' class='imgProduct'>
            <div>$prod[1]</div>
            <div>$prod[2]</div>
            <div>";
            foreach ($cathegories as $cat) {if ($prod[3]==$cat[0]) {echo $cat[1];}} 
            echo "</div>
            <div>$prod[4] ₽</div>
            <a href='crud/editProduct.php?product=$prod[0]' class='editA'><img src='../images/pencil.png' class='editButton'></a>
            <a href='crud/deleteProduct.php?product=$prod[0]' class='deleteA'><img src='../images/delete-button.png' class='deleteButton'></a>
        </div>";}
    ?>
</main>
</body>
</html>