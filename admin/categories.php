<?php require ("headerAdm.php"); ?>
<main>
    <div class="voidAdm"></div>
    <div class='rowAdmTovar'>
        <a href='crud/addCategory.php' class='addButton'>
            <div>Добавить категорию</div>
        </a>
    </div>
    <div class='rowAdmTovar rowTH'>
        <div></div>
        <div></div>
        <div>Название категории</div>
        <div>Товаров в категории</div>
        <div></div>
        <div></div>
        <div class='actionAdm'>Действия</div>
    </div>
    <?php
     $cathegories = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM cathegories"));
    foreach ($cathegories as $cat) {echo "<div class='rowAdmTovar rowTD'>
            <div></div>
            <div></div>
            <div>$cat[1]</div>
            <div>";
            $products = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM products WHERE id_cathegory_prod=$cat[0]"));
            echo "$products </div>
            <div>";
            echo "</div>
            <div></div>
            <a href='crud/editCategory.php?category=$cat[0]' class='editA'><img src='../images/pencil.png' class='editButton'></a>
            <a href='crud/deleteCategory.php?category=$cat[0]' class='deleteA'><img src='../images/delete-button.png' class='deleteButton'></a>
        </div>";}
    ?>
</main>
</body>
</html>