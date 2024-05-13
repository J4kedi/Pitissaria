

const pizzas = [
    { id: 2, nome: "Calabresa", imagem: "../imagens/pizza_calabresa.jpg", texto: "Calabresa, queijo, azeitona", id_ingredientes: [3,5] },
    { id: 1, nome: "Pepperoni", imagem: "../imagens/portuguesa.jpg", texto: "Calabresa, queijo, pimentão, tomate", id_ingredientes: [3,5,6,7]},
    
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
async function removerIngredientes(id_ingredientes, id) {
    const response = await fetch("http://localhost/GitHub/CrazyCats/Pitissaria/php/remover_e_comprar_ingrediente.php", {
        method: "PATCH",
        body: JSON.stringify({
            id_ingredientes: id_ingredientes, // Corrigindo passagem de argumento
            id: id
        }),
        headers: {
            "Content-Type": "application/json"
        }
    });
    console.log(await response.json());
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
    document.getElementById("adicionar").addEventListener("click", () => removerIngredientes(pizza.id_ingredientes, pizza.id));

    var botao = document.getElementById('adicionar');
    // Adiciona um evento de clique ao botão
    botao.addEventListener('click', function() {
        // Redireciona para a página desejada
        window.location.href = '../HTML/pizzas_prontas.php';
    });
    btnVoltar();
}

function btnVoltar() {
    const btnVoltar = document.getElementById("voltar")

    btnVoltar.addEventListener("click", () => {
        document.getElementById("grid-container").innerHTML = "";
        criarCardsDePizza();
    });
}