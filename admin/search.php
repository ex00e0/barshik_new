
 <?php 
 $data = $_POST['text'];
 $post = isset($data['name'])?$data['name']:false;   
$filter = isset($data['filters'])?$data['filters']:false; 
?>
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
                foreach ($categ as $catcat) {echo "<option value='$catcat[0]' ";
                    if ($catcat[0]==$filter) {echo 'selected';}
                    echo ">$catcat[1]</option>";}
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
    $queProd = "SELECT * FROM products";
    if ($post && $filter) {$queProd.=" WHERE name_product LIKE '%$post%' AND id_cathegory_prod=$filter";}
    else if ($post) {$queProd.=" WHERE name_product LIKE '%$post%'";}
    else if ($filter) {$queProd.=" WHERE id_cathegory_prod=$filter";}
    $products = mysqli_fetch_all(mysqli_query($connect, $queProd));
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
<script>
let post = '<?php if ($post == "") {echo "0";}
                       else echo "$post"; ?>';
let filter = <?php if ($filter == "") {echo '0';} else echo $filter; ?>;
$(document).ready(function() {
  $('#navSearch').on('keyup', loc(post, filter));
  $('#selectFilter').on('change', loc(post, filter));
});
var loc = function (post, filter) {
   
    filter =  $("#selectFilter").val();
    post =  $("#navSearch").val();
   
    location.href=`index.php?post=${post}&filter=${filter}`;
}
</script>
</body>
</html>