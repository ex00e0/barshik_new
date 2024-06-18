<?php require ("headerAdm.php"); ?>
<?php require ("../db/connect-db.php"); ?>
<?php  
$post = isset($_GET['post'])?(($_GET['post'] == "0")?false:$_GET['post']):false;
$filter = isset($_GET['post'])?(($_GET['filter'] == "0")?false:$_GET['filter']):false;
?>
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
    <div id='gridFilter'>
            <div id='labelFilter'> Показывать: </div>
            <select id='selectFilter'>
                <option value="">все</option>
                <?php
                $categ = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM status_orders"));
                foreach ($categ as $catcat) {echo "<option value='$catcat[1]' ";
                    if ($catcat[1]==$filter) {echo 'selected';}
                    echo ">$catcat[1]</option>";}
                ?>
            </select>
         </div>    
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
    $queProd = "SELECT * FROM orders";
    if ($post && $filter) {$queProd.=" WHERE id_order LIKE '%$post%' AND status_order='$filter'";}
    else if ($post) {$queProd.=" WHERE id_order LIKE '%$post%'";}
    else if ($filter) {$queProd.=" WHERE status_order='$filter'";}
    $products = mysqli_fetch_all(mysqli_query($connect, $queProd));
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
            <a href='crud/editStatusOrder.php?order=$prod[0]' class='orderButton'><img src='../images/pencil.png' class='editButton'></a>
            <a href='crud/deleteOrder.php?order=$prod[0]' class='orderButton'><img src='../images/delete-button.png' class='deleteButton'></a>
        </div>";}
    ?>
</main>
<script>
let navS = document.getElementById("navSearch");
let text = "<?php if($post) echo $post; else echo ""; ?>";
navS.value = text;
$(document).ready(function() {
  $('#navSearch').on('keyup', getDishes);
  $('#selectFilter').on('change', getDishes);
});

var getDishes = function(){
  let request_data = {'filters': $("#selectFilter").val(), 'name': $('#navSearch').val() };  
//   console.log(request_data);
$.ajax({
    url: 'searchOrders.php',         /* Куда отправить запрос */
    method: 'post',             /* Метод запроса (post или get) */
    dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
    data: {text: request_data},     /* Данные передаваемые в массиве */
    success: function(data){
        $("main").html(data);
           /* функция которая будет выполнена после успешного запроса.  */
	     /* В переменной data содержится ответ от index.php. */
    }
});
}
</script>
</body>
</html>