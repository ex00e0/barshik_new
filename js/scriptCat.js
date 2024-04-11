//модальное окно 1 товара
let modalClose = document.getElementsByClassName("modalClose")[0];
let cardCatR3C2 = document.getElementsByClassName("cardCatR3C2");
let modalShadow = document.getElementsByClassName("modalShadow")[1];
let modal = document.getElementsByClassName("modal")[0];
let scrollHeight = document.body.scrollHeight;
modalShadow.style.height=`${scrollHeight}px`; 
modalClose.addEventListener("click", function () {modalShadow.style.display='none';
                                                modal.style.display='none';} );
for (let i=0;i<cardCatR3C2.length;i++) {cardCatR3C2[i].addEventListener("click", function () {modalShadow.style.display='block';
                                                                                            modal.style.display='grid';} );}

//для авторизации
let modalShadowAuth = document.getElementsByClassName("modalShadow")[0];
let fromAuthToReg = document.getElementById("authA");
let fromRegToAuth = document.getElementById("regA");
let modalAuth = document.getElementById("modalAuth");
let modalReg = document.getElementById("modalReg");
let regClose = document.getElementById("regClose");
let authClose = document.getElementById("authClose");
let exitEnterButton = document.getElementById('exitEnterButton');
exitEnterButton.addEventListener('click', function () {modalAuth.style.display='grid';
                                                        modalShadowAuth.style.display='block';} );
fromAuthToReg.addEventListener('click', function () {modalAuth.style.display='none';
                                                     modalReg.style.display='grid';} );
fromRegToAuth.addEventListener('click', function () {modalReg.style.display='none';
                                                     modalAuth.style.display='grid';} );
regClose.addEventListener('click', function () {modalReg.style.display='none';
                                                modalShadowAuth.style.display='none';} );  
authClose.addEventListener('click', function () {modalAuth.style.display='none';
                                                modalShadowAuth.style.display='none';} );                                      