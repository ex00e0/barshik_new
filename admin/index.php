<?php require ("headerAdm.php"); ?>
<?php require ("../db/connect-db.php"); ?>

<main>
    <div class="voidAdm"></div>
    <div class='rowAdmTovar'>
        <div id='gridFilter'>
            <div id='labelFilter'> Показывать: </div>
            <select id='selectFilter'>
                <option value="">все</option>
                <?php
                $categ = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM cathegories"));
                foreach ($categ as $catcat) {echo "<option value='$catcat[0]'>$catcat[1]</option>";}
                ?>
            </select>
         </div>    
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
<?php require ("search.php"); ?>
<script>


$(document).ready(function() {
  $('#navSearch').on('keyup', getDishes);
  $('#selectFilter').on('change', getDishes);
});

var getDishes = function(){
  let request_data = {'filters': $("#selectFilter").val(), 'name': $('#navSearch').val() };  
  console.log(request_data);
  $.ajax({
                                    url: "search.php", 
                                    type: "POST",
                                    data: { value: request_data
                                    }, 
                                    success: function(result){
                                $("main").html(result);
                                }}); }

                                $formdata = filter_input_array(INPUT_POST);
$filters = $formdata['filters'];
    // let search = 0;
    // let filter = 0;
    // $("#selectFilter").change( function () {filter =  $("#selectFilter").val();} );
    // $("#navSearch").on("keyup", function() {search =  $("#selectFilter").val();} );
    </script>
</body>
</html>