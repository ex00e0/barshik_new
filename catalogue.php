<?php require ("header.php"); ?>
    <main id="mainCat">
        <div class="voidCat"></div>
        <?php
        $productsAll = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM products"));
        $b = 1;
        $forNew = 0;
        $indexArr = ceil(count($productsAll)/4);  
        $keyProduct = count($productsAll);
    function type3 ($b,$productsAll, $keyProduct, $forNew) {if ($b%5==0 || $b==1) {echo "<div class='rowCat'>
                                                                                         <div></div>";
        $s = 1;
        for ($new=$forNew;;$new++) { if($keyProduct==0) {break;} $item = $productsAll[$new];
                    echo "<div class='cardCat'>
                            <img src='images/$item[5]'>
                            <div class='cardCatR1'>Новинка</div>
                            <div class='cardCatR2'>$item[1]</div>
                            <div class='cardCatR3C1'>₽ $item[4]</div>
                            <div class='cardCatR3C2'>
                                <svg viewBox='0 0 22 21' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                    <path d='M11.1826 1.1582V19.8549' stroke='white' stroke-width='1.91761' stroke-linecap='round'/>
                                    <path d='M20.5312 10.5068L1.83451 10.5068' stroke='white' stroke-width='1.91761' stroke-linecap='round'/>
                                </svg>
                            </div>
                        </div>";
           $s++;
           $b++;
           $keyProduct--;
           $forNew++;
            if ($b%5==0) {$s = 0;
            break;    }  }
        echo "</div>";
        echo "<div class='voidCat'></div>";
        // if ($keyProduct!=0) {}      
          }
        return [$b, $keyProduct, $forNew];   }
        for ($er=0;$er<$indexArr;$er++) {$arrBKey = type3($b, $productsAll, $keyProduct, $forNew);
            $b = $arrBKey[0];
               $keyProduct = $arrBKey[1];
               $forNew = $arrBKey[2];}    
     ?>
        <!-- <div class="rowCat">
            <div></div>
            <div class='cardCat'>
                <img src='images/darkgreen.png'>
                <div class='cardCatR1'>Новинка</div>
                <div class='cardCatR2'>Крутая ягода</div>
                <div class='cardCatR3C1'>₽ 200</div>
                <div class='cardCatR3C2'>
                    <svg viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.1826 1.1582V19.8549" stroke="white" stroke-width="1.91761" stroke-linecap="round"/>
                        <path d="M20.5312 10.5068L1.83451 10.5068" stroke="white" stroke-width="1.91761" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
            <div class='cardCat'>
                <img src='images/darkgreen.png'>
                <div class='cardCatR1'>Новинка</div>
                <div class='cardCatR2'>Крутая ягода</div>
                <div class='cardCatR3C1'>₽ 200</div>
                <div class='cardCatR3C2'>
                    <svg viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.1826 1.1582V19.8549" stroke="white" stroke-width="1.91761" stroke-linecap="round"/>
                        <path d="M20.5312 10.5068L1.83451 10.5068" stroke="white" stroke-width="1.91761" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
            <div class='cardCat'>
                <img src='images/darkgreen.png'>
                <div class='cardCatR1'>Новинка</div>
                <div class='cardCatR2'>Крутая ягода</div>
                <div class='cardCatR3C1'>₽ 200</div>
                <div class='cardCatR3C2'>
                    <svg viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.1826 1.1582V19.8549" stroke="white" stroke-width="1.91761" stroke-linecap="round"/>
                        <path d="M20.5312 10.5068L1.83451 10.5068" stroke="white" stroke-width="1.91761" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="voidCat"></div> -->
    </main>
    <div class='modalShadow'></div>
    <div class='modal'>
        <div class='modalBody'>
            <svg class='modalClose' viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.89355 1.57422L13.8786 13.5593" stroke="black" stroke-width="1.91761" stroke-linecap="round"/>
                <path d="M13.8789 1.57422L1.89381 13.5593" stroke="black" stroke-width="1.91761" stroke-linecap="round"/>
            </svg>
        </div>
        <img src='images/formodal.png' class='modalImg'> 
        <div class='modalContent'>
            <div class='modalR1'>Крутая ягода</div>
            <div class='modalR2'>
                <svg class='modalR2C1' viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.60393 1.36214C6.89095 0.478784 8.14067 0.478783 8.42769 1.36214L9.4532 4.51834C9.58156 4.91339 9.9497 5.18086 10.3651 5.18086H13.6837C14.6125 5.18086 14.9987 6.36941 14.2473 6.91536L11.5625 8.866C11.2264 9.11015 11.0858 9.54293 11.2141 9.93798L12.2397 13.0942C12.5267 13.9775 11.5156 14.7121 10.7642 14.1662L8.07938 12.2155C7.74333 11.9714 7.28829 11.9714 6.95224 12.2155L4.26741 14.1662C3.51598 14.7121 2.50494 13.9775 2.79196 13.0942L3.81747 9.93798C3.94583 9.54293 3.80521 9.11015 3.46916 8.866L0.784342 6.91536C0.0329115 6.36941 0.419095 5.18086 1.34791 5.18086H4.66654C5.08192 5.18086 5.45006 4.91339 5.57842 4.51834L6.60393 1.36214Z" fill="#FFB447"/>
                </svg>
                <div class='modalR2C2'>5.0</div>
                <div class='modalR2C3'>(2343 Заказов)</div>
            </div>
            <div class='modalR3'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam itaque aperiam, non officiis, tempore sunt, rerum velit obcaecati ut unde culpa earum recusandae tempora pariatur nulla autem. Quasi, numquam fugiat?</div>
            <div class='modalR4OUT'></div>
            <div class='modalR4'>
                <div class='modalR4C1'>Акции</div>
                <svg viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.56543 8.77499L6.54558 10.89L12.156 4.89746" stroke="#0DB295" stroke-width="0.958807" stroke-linecap="round"/>
                    <circle cx="8.16078" cy="7.69399" r="6.71165" stroke="#0DB295" stroke-width="0.958807"/>
                </svg>
                <div class='modalR4C2-1'>Промокод TRYNEW применен! </div>
                <div class='modalR4C2-2'>Скидка 20% на заказ от 500 ₽</div>
                <div class='modalR4C3-1'>- 100 ₽</div>
                <div class='modalR4C3-2'>Убрать</div>
            </div>
            <div class='modalR5'>Объем</div>
            <div class='modalR6'>
                <div>0.3 л</div>
                <div>0.5 л</div>
                <div>0.8 л</div>
            </div>
            <div class='modalR7OUT'>
                <div class='modalR7C1-1'>Итого</div>
                <div class='modalR7C1-2'>500 ₽</div>
                <button class='modalR7C2'>В корзину</button>
            </div>
        </div>   
    </div>
<script src='js/scriptCat.js'></script>
<?php
        $reg = isset($_GET['reg'])?$_GET['reg']:false;
        if ($reg) {echo "<script>exitEnterButton.click();
                                fromAuthToReg.click(); </script>";}
        $auth = isset($_GET['auth'])?$_GET['auth']:false;
        if ($auth) {echo "<script>exitEnterButton.click();</script>";}
?>
</body>
</html>