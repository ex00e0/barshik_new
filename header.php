<?php session_start(); ?>
<?php require ("db/connect-db.php"); ?>
<?php if(isset($_SESSION['user'])) {$user_id = $_SESSION['user'];
                                $user = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM users WHERE id_user=$user_id")); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BARSHIK</title>
</head>
<body>
    <?php require ("authModal.php");?>
    <nav id="navCat">
        <div id="navCat1">FIZZ BOOOM</div> 
        <svg id='navSearchIcon' viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M23.0026 22.3898L17.9845 17.3628L23.0026 22.3898ZM20.7654 10.6444C20.7654 13.1661 19.7636 15.5846 17.9805 17.3677C16.1974 19.1508 13.7789 20.1526 11.2572 20.1526C8.73547 20.1526 6.31703 19.1508 4.5339 17.3677C2.75077 15.5846 1.74902 13.1661 1.74902 10.6444C1.74902 8.12268 2.75077 5.70424 4.5339 3.92111C6.31703 2.13798 8.73547 1.13623 11.2572 1.13623C13.7789 1.13623 16.1974 2.13798 17.9805 3.92111C19.7636 5.70424 20.7654 8.12268 20.7654 10.6444V10.6444Z" stroke="#AAAAAA" stroke-width="1.91761" stroke-linecap="round"/>
        </svg>   
        <form id='formSearch'>
            <input id="navSearch">
        </form>        
        <div id="navCat2">
            <div>О нас</div>
            <div>Контакты</div>
            <div><a href='catalogue.php'>Продукты</a></div>
        </div>
        <div id="navCat3">
            <?php if (isset($_SESSION['user'])) { ?>
            <a href='cart.php'>
                <svg viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.73877 1.61213C0.73877 1.41378 0.820846 1.22356 0.966942 1.0833C1.11304 0.943051 1.31119 0.864258 1.5178 0.864258H3.85489C4.02867 0.864304 4.19743 0.920125 4.33436 1.02284C4.47128 1.12556 4.5685 1.26928 4.61055 1.43114L5.24157 3.85574H23.3307C23.4451 3.85584 23.558 3.88012 23.6615 3.92686C23.765 3.9736 23.8566 4.04165 23.9296 4.12617C24.0026 4.2107 24.0553 4.30962 24.0841 4.41592C24.1128 4.52222 24.1167 4.63328 24.0957 4.74121L21.7586 16.7071C21.7252 16.8785 21.6304 17.0333 21.4907 17.1447C21.3511 17.2562 21.1752 17.3172 20.9936 17.3174H6.97102C6.7894 17.3172 6.61354 17.2562 6.47386 17.1447C6.33417 17.0333 6.23943 16.8785 6.20601 16.7071L3.87047 4.76365L3.24725 2.36H1.5178C1.31119 2.36 1.11304 2.2812 0.966942 2.14095C0.820846 2.0007 0.73877 1.81047 0.73877 1.61213ZM5.57188 5.35148L7.61761 15.8217H20.347L22.3927 5.35148H5.57188ZM8.52908 17.3174C7.70263 17.3174 6.91003 17.6326 6.32565 18.1936C5.74126 18.7546 5.41296 19.5155 5.41296 20.3089C5.41296 21.1023 5.74126 21.8632 6.32565 22.4242C6.91003 22.9852 7.70263 23.3004 8.52908 23.3004C9.35553 23.3004 10.1481 22.9852 10.7325 22.4242C11.3169 21.8632 11.6452 21.1023 11.6452 20.3089C11.6452 19.5155 11.3169 18.7546 10.7325 18.1936C10.1481 17.6326 9.35553 17.3174 8.52908 17.3174ZM19.4355 17.3174C18.6091 17.3174 17.8165 17.6326 17.2321 18.1936C16.6477 18.7546 16.3194 19.5155 16.3194 20.3089C16.3194 21.1023 16.6477 21.8632 17.2321 22.4242C17.8165 22.9852 18.6091 23.3004 19.4355 23.3004C20.262 23.3004 21.0546 22.9852 21.639 22.4242C22.2233 21.8632 22.5516 21.1023 22.5516 20.3089C22.5516 19.5155 22.2233 18.7546 21.639 18.1936C21.0546 17.6326 20.262 17.3174 19.4355 17.3174ZM8.52908 18.8131C8.9423 18.8131 9.3386 18.9707 9.6308 19.2512C9.92299 19.5317 10.0871 19.9122 10.0871 20.3089C10.0871 20.7056 9.92299 21.086 9.6308 21.3665C9.3386 21.647 8.9423 21.8046 8.52908 21.8046C8.11586 21.8046 7.71956 21.647 7.42736 21.3665C7.13517 21.086 6.97102 20.7056 6.97102 20.3089C6.97102 19.9122 7.13517 19.5317 7.42736 19.2512C7.71956 18.9707 8.11586 18.8131 8.52908 18.8131ZM19.4355 18.8131C19.8487 18.8131 20.245 18.9707 20.5372 19.2512C20.8294 19.5317 20.9936 19.9122 20.9936 20.3089C20.9936 20.7056 20.8294 21.086 20.5372 21.3665C20.245 21.647 19.8487 21.8046 19.4355 21.8046C19.0223 21.8046 18.626 21.647 18.3338 21.3665C18.0416 21.086 17.8775 20.7056 17.8775 20.3089C17.8775 19.9122 18.0416 19.5317 18.3338 19.2512C18.626 18.9707 19.0223 18.8131 19.4355 18.8131Z" fill="#AAAAAA"/>
                </svg>
            </a>
            <a href='ordersUser.php'>
                <svg viewBox="0 0 18 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.68359 9.67516C5.68359 9.48444 5.75936 9.30153 5.89422 9.16668C6.02907 9.03182 6.21198 8.95605 6.4027 8.95605H12.1555C12.3463 8.95605 12.5292 9.03182 12.664 9.16668C12.7989 9.30153 12.8747 9.48444 12.8747 9.67516C12.8747 9.86588 12.7989 10.0488 12.664 10.1836C12.5292 10.3185 12.3463 10.3943 12.1555 10.3943H6.4027C6.21198 10.3943 6.02907 10.3185 5.89422 10.1836C5.75936 10.0488 5.68359 9.86588 5.68359 9.67516Z" fill="#AAAAAA"/>
                    <path d="M0.649414 3.20357C0.649414 2.4407 0.952465 1.70907 1.4919 1.16963C2.03133 0.630199 2.76296 0.327148 3.52584 0.327148L15.0315 0.327148C15.7944 0.327148 16.526 0.630199 17.0655 1.16963C17.6049 1.70907 17.9079 2.4407 17.9079 3.20357V22.6194C17.9079 22.7495 17.8725 22.8771 17.8057 22.9887C17.7388 23.1003 17.6429 23.1916 17.5283 23.253C17.4136 23.3144 17.2844 23.3436 17.1545 23.3373C17.0246 23.3311 16.8987 23.2898 16.7905 23.2177L9.27868 19.1692L1.7669 23.2177C1.65861 23.2898 1.53281 23.3311 1.40288 23.3373C1.27295 23.3436 1.14377 23.3144 1.0291 23.253C0.914427 23.1916 0.818554 23.1003 0.751691 22.9887C0.684829 22.8771 0.649481 22.7495 0.649414 22.6194V3.20357ZM3.52584 1.76536C3.1444 1.76536 2.77858 1.91689 2.50887 2.1866C2.23915 2.45632 2.08763 2.82213 2.08763 3.20357V21.2761L8.8803 17.7065C8.99832 17.628 9.13692 17.5861 9.27868 17.5861C9.42045 17.5861 9.55905 17.628 9.67707 17.7065L16.4697 21.2761V3.20357C16.4697 2.82213 16.3182 2.45632 16.0485 2.1866C15.7788 1.91689 15.413 1.76536 15.0315 1.76536H3.52584Z" fill="#AAAAAA"/>
                </svg>
            </a>
            <a href=''>
                <svg viewBox="0 0 19 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.73 15.8418C17.3358 14.6452 17.1344 13.3935 17.1332 12.1336V9.02063C17.1619 7.0481 16.458 5.13504 15.1576 3.65155C13.8617 2.16572 12.0631 1.21036 10.1064 0.968561C9.02509 0.856381 7.92509 0.968561 6.88119 1.32224C5.83729 1.65723 4.88687 2.21657 4.08603 2.96288C3.28119 3.68994 2.6397 4.57943 2.20389 5.57264C1.76591 6.56546 1.53731 7.63791 1.53237 8.72304V12.1508C1.53008 13.4055 1.32866 14.6518 0.935628 15.8434L0.00390625 18.5996L0.750218 19.6248H6.21123C6.21123 20.4443 6.54621 21.2452 7.12425 21.8248C7.70073 22.4013 8.50314 22.7378 9.32423 22.7378C10.1438 22.7378 10.9446 22.4028 11.5227 21.8248C12.1007 21.2467 12.4372 20.4443 12.4372 19.6248H17.8983L18.643 18.5996L17.73 15.8418ZM10.4227 20.745C10.2793 20.8913 10.1085 21.0077 9.91996 21.0876C9.73145 21.1676 9.52899 21.2095 9.32423 21.2109C9.1191 21.2095 8.91628 21.1674 8.72749 21.0872C8.53869 21.007 8.36765 20.8902 8.22424 20.7435C8.07774 20.6003 7.96103 20.4295 7.88081 20.241C7.80059 20.0524 7.75845 19.8499 7.75682 19.6451H10.8714C10.8779 19.8495 10.8414 20.053 10.7644 20.2425C10.6874 20.4319 10.5715 20.6031 10.4242 20.745H10.4227ZM1.82995 18.0808L2.408 16.3451C2.85876 14.9929 3.09174 13.5777 3.09822 12.1523V8.72304C3.09822 7.84585 3.28519 6.98891 3.63887 6.20521C3.99255 5.40436 4.4958 4.69545 5.14863 4.11741C5.80146 3.52223 6.56646 3.0735 7.386 2.81331C8.22424 2.53286 9.09987 2.43937 9.95681 2.53286C11.5274 2.73937 12.9673 3.51563 14.0031 4.71414C15.0392 5.91415 15.5962 7.45419 15.5674 9.03932V12.171C15.5674 13.5873 15.7918 15.0036 16.2576 16.3638L16.8357 18.0979H1.83151V18.0792L1.82995 18.0808Z" fill="#AAAAAA"/>
                </svg>
            </a>
            <?php } ?>
        </div>
        <?=isset($_SESSION['user'])?"<a href='db/exit-db.php' id='exitA'>Выйти</a>":"<div id='exitEnterButton'>Войти</div>";?>
        <?=isset($_SESSION['user'])?"<a href='account.php' id='userPhotoA'><img src='images/userPhotos/".$user[0][4]."' id='userPhoto'></a>":"";?>
    </nav>