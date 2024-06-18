
<?php require ("headerAdm.php"); ?>
<?php require ("../db/connect-db.php"); ?>
<?php  
// $filter = $_SESSION['fise']['filters'];
// $search = $_SESSION['fise']['name'];
$post = isset($_GET['post'])?(($_GET['post'] == "0")?false:$_GET['post']):false;
$filter = isset($_GET['post'])?(($_GET['filter'] == "0")?false:$_GET['filter']):false;
// $formdata = filter_input_array(INPUT_POST);
// var_dump($formdata);

?>
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
let navS = document.getElementById("navSearch");
let text = "<?php if($post) echo $post; else echo ""; ?>";
navS.value = text;
$(document).ready(function() {
  $('#navSearch').on('keyup', getDishes);
  $('#selectFilter').on('change', getDishes);
});

var getDishes = function(){
    let request_data = [$("#selectFilter").val(), $('#navSearch').val()];
//   let request_data = {'filters': $("#selectFilter").val(), 'name': $('#navSearch').val() };  
//   console.log(request_data);
$.ajax({
    url: 'search.php',         /* Куда отправить запрос */
    method: 'post',             /* Метод запроса (post или get) */
    dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
    data: {text: request_data},     /* Данные передаваемые в массиве */
    success: function(data){
        $("main").html(data);
           /* функция которая будет выполнена после успешного запроса.  */
	     /* В переменной data содержится ответ от index.php. */
    }
});
// $.ajax({
//         type: "POST",
//         url: 'sp.php',
//         contentType: false,
//         processData: false,
//         data: request_data,
//         success: function(data){
//         },
//     });
//   $.ajax({
//                                     url: "", 
//                                     type: 'text',
//                                     method: "POST",
//                                     data: { filters: request_data }, 
//                                     success: (response)=>{
//             console.log('Запрос успешно отправился, получаем ответ', response);
           
//         }  
//     }); 
}
// $.ajax({
//                     url: '',
//                     method: 'POST',
//                     data: {"num" : request_data}
//                 }).done(function(data){
//                     console.log(data); 
//                 });
//             }
                               
    // let search = 0;
    // let filter = 0;
    // $("#selectFilter").change( function () {filter =  $("#selectFilter").val();} );
    // $("#navSearch").on("keyup", function() {search =  $("#selectFilter").val();} );
</script>
</body>
</html>