

const pizzas = [
    { nome: "Calabresa", imagem: "../imagens/pizza_calabresa.jpg", texto: "Calabresa, queijo, azeitona" },
    { nome: "Pepperoni", imagem: "../imagens/portuguesa.jpg", texto: "Calabresa" },
    
];


document.addEventListener("DOMContentLoaded", () => {
    criarCardsDePizza();
});

function criarCardsDePizza() {
    const gridContainer = document.getElementById("grid-container");

    pizzas.forEach((pizza) => {
        const card = criarCard(pizza);
        gridContainer.appendChild(card);
        adicionarEventoClick(pizza);
    });
}

function criarCard(pizza) {
    const card = document.createElement("div");
    card.classList.add("card--gatos");
    
    const imagem = document.createElement("img");
    imagem.src = pizza.imagem;
    imagem.alt = pizza.nome;
    imagem.classList.add("card-img");
    
    const overlay = document.createElement("p");
    overlay.classList.add("overlay");
    overlay.setAttribute("id", pizza.nome);
    overlay.innerHTML = `<br> <br> ${pizza.nome} <br> <br> ${pizza.texto}`;
    
    card.appendChild(imagem);
    card.appendChild(overlay);
    
    return card;
}

function adicionarEventoClick(pizza) {
    const overlay = document.getElementById(pizza.nome);

    overlay.addEventListener("click", () => {
        criarPaginaEspecifica(pizza);
    });
}

function criarPaginaEspecifica(pizza) {
    const pizzaEspec = `
        <div class="site">
            <div class="divisao">
            <!-- <img src="${pizza.imagem}" alt="${pizza.nome}" class="pizza"> -->
                <div class="nome_txt"> 
                    <h2>${pizza.nome} Ingredientes:</h2>
                    <div class="texto">
                        <p>${pizza.texto}</p>
                    </div>
                </div>
            </div>
            <div>
                <button class="voltar" id="voltar">Voltar</button>
            </div>
            <div>
                <button class="adicionar" id="adicionar">comprar</button>
            </div>
        </div>
    `;

    document.getElementById("grid-container").innerHTML = pizzaEspec;
  
    btnVoltar();
    btnAdicionar();
}

function btnVoltar() {
    const btnVoltar = document.getElementById("voltar")

    btnVoltar.addEventListener("click", () => {
        document.getElementById("grid-container").innerHTML = "";
        criarCardsDePizza();
    });
}

function btnAdicionar() {
    const btnVoltar = document.getElementById("adicionar")

    btnVoltar.addEventListener("click", () => {
        document.getElementById("grid-container").innerHTML = "";
        criarCardsDePizza();
    });
}


