/**
 * obj : Funcoes utilizados no main
 * 
 * 20/03/2222
 * 
 * version : 1.0
 * 
 * marcus-vinnicus
 */



/*funcao do modulo menu-burg(categorias-filtros)*/
const abrirmodal = () =>{

    document.getElementById('modal-container').classList.add('active');
    document.getElementById('drop-todomenu').classList.add('desativy');

}


const fechar = () =>{
    document.getElementById('modal-container').classList.remove('active');
    document.getElementById('drop-todomenu').classList.remove('desativy');
}

document.getElementById('menu-img').addEventListener('click', abrirmodal);
document.getElementById('modal-sair').addEventListener('click', fechar);


/**************************************************** */


/********CRIAÇÃO9 DE CARDS AUTO produtos   *********/
const dados = [
    {
        id: 1,
        nome: 'Call of Duty-Black ops 2',
        desconto:'250,29',
        preco: 170.29,
        detalhes: 'Call of Duty: Warzone é um jogo eletrônico free-to-play do gênero battle royale desenvolvido pela Infinity Ward e Raven Software e publicado pela Activision. Lançado em 10 de março de 2020 para Microsoft Windows, PlayStation 4 e Xbox One, o jogo faz parte do título Call of Duty: Modern Warfare',
        imagemcard: './imgs/Black_ops_2_cover.jpg',
        imgdetalhes:'',
    },
    {
    id: 1,
    nome: 'God of War',
    desconto:'',
    preco: 190.29,
    detalhes: 'Call of Duty: Warzone é um jogo eletrônico free-to-play do gênero battle royale desenvolvido pela Infinity Ward e Raven Software e publicado pela Activision. Lançado em 10 de março de 2020 para Microsoft Windows, PlayStation 4 e Xbox One, o jogo faz parte do título Call of Duty: Modern Warfare',
    imagemcard: './imgs/god-of-war-card.jpg',
    imgdetalhes:'',
},
{
    id: 1,
    nome: 'Dying light 2',
    desconto:'149,99',
    preco: 129.99,
    detalhes: 'Call of Duty: Warzone é um jogo eletrônico free-to-play do gênero battle royale desenvolvido pela Infinity Ward e Raven Software e publicado pela Activision. Lançado em 10 de março de 2020 para Microsoft Windows, PlayStation 4 e Xbox One, o jogo faz parte do título Call of Duty: Modern Warfare',
    imagemcard: './imgs/dyinglight2.jpg',
    imgdetalhes:'',
},
{
    id: 1,
    nome: 'Call of Duty Warozone',
    desconto:'299,99',
    preco: 150.29,
    detalhes: 'Call of Duty: Warzone é um jogo eletrônico free-to-play do gênero battle royale desenvolvido pela Infinity Ward e Raven Software e publicado pela Activision. Lançado em 10 de março de 2020 para Microsoft Windows, PlayStation 4 e Xbox One, o jogo faz parte do título Call of Duty: Modern Warfare',
    imagemcard: './imgs/warzone2.jpg',
    
},


]


const criarcard = (produto) =>{

 const card  = document.createElement('div');

 card.classList.add('cardproduto');

 card.innerHTML = `
 <div id="cardproduto">
 <div> <img src="${produto.imagemcard}" alt="">
     <h3>${produto.nome}</h3>
 </div>
 <p>${produto.desconto}</p>
 <div id="container-preco">
     <span id="preco">${produto.preco}</span>
     <span id="detalhes" aria-valuetext="detalhes">detalhes</span>
 </div>
</div>
</div>
 
 `

return card;

}



const carregarproduto = (produtos) =>{

    const container = document.querySelector('#div-produtos');

    const card = produtos.map(criarcard);

    container.replaceChildren(...card);
}

 carregarproduto(dados);


/********CRIAÇÃO9 DE CARDS AUTO  destaque*********/

const dadosdestaque = [
    {
        id: 1,
        nome: 'Call of Duty-Black ops 2',
        desconto:'250,29',
        preco: 170.29,
        detalhes: 'Call of Duty: Warzone é um jogo eletrônico free-to-play do gênero battle royale desenvolvido pela Infinity Ward e Raven Software e publicado pela Activision. Lançado em 10 de março de 2020 para Microsoft Windows, PlayStation 4 e Xbox One, o jogo faz parte do título Call of Duty: Modern Warfare',
        imagemcard: './imgs/Black_ops_2_cover.jpg',
        informacao:'jogo bom',
    },
    {
        id: 1,
        nome: 'Call of Duty Warozone',
        desconto:'299,99',
        preco: 190.29,
        detalhes: 'Call of Duty: Warzone é um jogo eletrônico free-to-play do gênero battle royale desenvolvido pela Infinity Ward e Raven Software e publicado pela Activision. Lançado em 10 de março de 2020 para Microsoft Windows, PlayStation 4 e Xbox One, o jogo faz parte do título Call of Duty: Modern Warfare',
        imagemcard: './imgs/warzone2.jpg',
        informacao:'um lixo',
        },

    {
        id: 1,
        nome: 'Dying light 2',
        desconto:'149,99',
        preco: 129.99,
        detalhes: 'Call of Duty: Warzone é um jogo eletrônico free-to-play do gênero battle royale desenvolvido pela Infinity Ward e Raven Software e publicado pela Activision. Lançado em 10 de março de 2020 para Microsoft Windows, PlayStation 4 e Xbox One, o jogo faz parte do título Call of Duty: Modern Warfare',
        imagemcard: './imgs/dyinglight2.jpg',
        informacao:' ruimmm',
    },

    {
    id: 1,
    nome: 'Super Mario',
    desconto:'189,00',
    preco: 150.29,
    detalhes: 'Call of Duty: Warzone é um jogo eletrônico free-to-play do gênero battle royale desenvolvido pela Infinity Ward e Raven Software e publicado pela Activision. Lançado em 10 de março de 2020 para Microsoft Windows, PlayStation 4 e Xbox One, o jogo faz parte do título Call of Duty: Modern Warfare',
    imagemcard: './imgs/mario.jpg',
    informacao:'melhor do mundo',
    },


]


const criarcarddestaques = (produto) =>{

 const card  = document.createElement('div');

 card.classList.add('carddestaque');

 card.innerHTML = `
 <div id="carddestaque">
 <div> <img src="${produto.imagemcard}" alt="">
     <h3>${produto.nome}</h3>
 </div>
 <p>${produto.desconto}</p>
 <div id="container-preco">
     <span id="preco">${produto.preco}</span>
     <span id="detalhes" aria-valuetext="detalhes">detalhes</span>
 </div>
</div>
</div>
 
 `

return card;

}



const carregardestaques = (produtos) =>{

    const container = document.querySelector('#div-destaques');

    const card = produtos.map(criarcarddestaques);

    container.replaceChildren(...card);
}

 carregardestaques(dadosdestaque);

/****************************/










/****** promocao */

const criarcardpromocao = (produto) =>{

    const card  = document.createElement('div');
   
    card.classList.add('cardpromocao');
   
    card.innerHTML = `
    <div id="cardpromocao">
    <div> <img src="${produto.imagemcard}" alt="">
        <h3>${produto.nome}</h3>
    </div>
    <p>${produto.desconto}</p>
    <div id="container-preco">
        <span id="preco">${produto.preco}</span>
        <span id="detalhes" aria-valuetext="detalhes">detalhes</span>
    </div>
   </div>
    `
   
   return card;
   
}


const carregarpromocao = (produtos) =>{

    const container = document.querySelector('.div-promocao');

    const card = produtos.map(criarcardpromocao);

    container.replaceChildren(...card);
}
  carregarpromocao(dadosdestaque);




// slide promocao //
//  $('#div-promocao').slick({
//     infinite: true,
//     slidesToShow: 1,
//     slidesToScroll: 3
//  });
























/**model detalhe**/ 

const criardetalhes = (produto) =>{

    const card  = document.createElement('div');
   
    card.classList.add('divdetalhes-card');
   
    card.innerHTML = `
    <div id="divdetalhes-card">
    <img src="/imgs/letra-x.png" alt="" id="img-fechar-detalhes">
    <div class="modal-detalhes">
        <header>
            <h1>${produto.nome}</h1>
        </header>
        <p>${produto.informacao}</p>
    </div>
</div>
    `
   
   return card;
   
}
   const carregardetalhes = (produtos) =>{

    const container = document.querySelector('.detalhes-modal');

    const card = produtos.map(criardetalhes);

    container.replaceChildren(...card);
}
 carregardetalhes(dadosdestaque);




/**ativacao do bnt detalhes*/
 const abrirdetalhes = () =>{

     document.getElementById('divdetalhes-card').classList.add('activy');
    

}
const fechardetalhes = () =>{

    document.getElementById('divdetalhes-card').classList.remove('activy');
}



// document.getElementById('detalhes').addEventListener('click', abrirdetalhes);
document.querySelectorAll('#detalhes').forEach(detalhe => detalhe.addEventListener('click',abrirdetalhes));
document.getElementById('img-fechar-detalhes').addEventListener('click', fechardetalhes);





