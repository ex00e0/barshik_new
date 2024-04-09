<div class='modalShadow'></div>
<div id='modalAuth'>
    <svg id='authClose' viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.89355 1.57422L13.8786 13.5593" stroke="black" stroke-width="1.91761" stroke-linecap="round"/>
        <path d="M13.8789 1.57422L1.89381 13.5593" stroke="black" stroke-width="1.91761" stroke-linecap="round"/>
    </svg>
    <div class='authHeadline'>Вход</div>
    <form class='authForm' action='<?php if ($_SERVER['PHP_SELF']=='/admin/index.php' || $_SERVER['PHP_SELF']=='/admin/categories.php' || $_SERVER['PHP_SELF']=='/admin/orders.php') echo '../db/auth-db.php'; else echo 'db/auth-db.php';?>' method='post'>
        <input type="email" name='email' required placeholder='Электронная почта'>
        <input type="text" name='password' required placeholder='Пароль'>
        <input type='submit' value='Войти' class='authButton'>
    </form>
    <div class='authSwitch'>Еще нет аккаунта? <span id='authA'> Создать аккаунт</span></div>
</div>
<div id='modalReg'>
    <svg id='regClose' viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.89355 1.57422L13.8786 13.5593" stroke="black" stroke-width="1.91761" stroke-linecap="round"/>
        <path d="M13.8789 1.57422L1.89381 13.5593" stroke="black" stroke-width="1.91761" stroke-linecap="round"/>
    </svg>
    <div class='authHeadline'>Регистрация</div>
    <form class='authForm' action='<?php if ($_SERVER['PHP_SELF']=='/admin/index.php' || $_SERVER['PHP_SELF']=='/admin/categories.php' || $_SERVER['PHP_SELF']=='/admin/orders.php') echo '../db/reg-db.php'; else echo 'db/reg-db.php';?>' method='post'>
        <input type="email" name='email' required placeholder='Электронная почта'>
        <input type="text" name='password' required placeholder='Пароль'>
        <input type='submit' value='Зарегистрироваться' class='authButton'>
    </form>
    <div class='authSwitch'>Есть аккаунт? <span id='regA'> Войти в аккаунт</span></div>
</div>