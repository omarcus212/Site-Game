/**
 * obj : Funcoes utilizados no header
 * 
 * 20/03/2222
 * 
 * version : 1.0
 * 
 * marcus-vinnicus
 */


//////////// slide banner ///////////
 const slidemanula = document.getElementById('slidebanner');
 const radio1 = document.getElementById('radio1');
 const radio2 = document.getElementById('radio2');
 const radio3 = document.getElementById('radio3');
 const radio4 = document.getElementById('radio4');


 function img1() {

    slidemanula.src = './imgs/warzone2.jpg';

}

const img2 = () => {

    slidemanula.src = './imgs/ff.jpg'

}

const img3 = () => {

    slidemanula.src = './imgs/payday.jpg'
}

const img4 = () => {

    slidemanula.src = './imgs/horizon.jpg';
    
}




radio1.addEventListener('click', img1);
radio2.addEventListener('click', img2);
radio3.addEventListener('click', img3);
radio4.addEventListener('click', img4);




/////////////////////////