<?php
$data = $_POST['text'];
session_start();
$_SESSION['fise'] = $data;
$data1 = $data['filters'];
$data2 = $data['name'];
echo $data1;
?>
<script>
    let val = <?=$data1.$data2?>
    alert(val);
    $.ajax({
    url: 'index.php',         /* Куда отправить запрос */
    method: 'post',             /* Метод запроса (post или get) */
    dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
    data: {text: val},     /* Данные передаваемые в массиве */
    success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
	     /* В переменной data содержится ответ от index.php. */
    }
});
</script>