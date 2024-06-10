const pizzas = [
    {   //O ID 2 É O ID DA PIZZA QUE TEMOS
        id: 1, nome: "Calabresa", preco:"R$20,00", imagem: "../imagens/pizza_calabresa.jpg", texto: "Calabresa, queijo, azeitona", ingredientes: [
            { id: 3, quantidade: 10 }, // O ID É O ID DO INGREDIENTE QUE TEM NO ESTOQUE 
            { id: 15, quantidade: 15 },
            { id: 6, quantidade: 5 },
        ],
        total : 20,
    },

    {

        id: 2, nome: "pepperoni", preco:"R$25,00", imagem: "../imagens/pepperoni.png", texto: "Pepperoni, mossarela , oregano", ingredientes: [
            { id: 5, quantidade: 10 },
            { id: 2, quantidade: 15 },
            { id: 20, quantidade: 2 },
        ],
        total : 25,
    },

    {
        id: 3, nome: "Marguerita", preco:"R$25,00", imagem: "../imagens/portuguesa.jpg", texto: "Tomate, mossarela, manjericao", ingredientes: [
            { id: 1, quantidade: 10 },
            { id: 2, quantidade: 15 },
            { id: 9, quantidade: 2 },
        ],
        total : 25,
    },

    {

        id: 4, nome: "Portuguesa", preco:"R$35,00", imagem: "../imagens/portuguesa.jpg", texto: "Tomate, queijo, presunto, ovo, ervilha, azeitona, oregano", ingredientes: [
            { id: 1, quantidade: 20 },
            { id: 15, quantidade: 15 },
            { id: 10, quantidade: 10 },
            { id: 11, quantidade: 7 },
            { id: 12, quantidade: 15 },
            { id: 6, quantidade: 10 },
            { id: 20, quantidade: 3 },
        ],
        total : 35,
    },

    {

        id: 5, nome: "Quatro Queijos", preco:"R$40,00", imagem: "../imagens/quatro_queijos.jpg", texto: "Mossarela, gorgonzola, parmesao, catupiry", ingredientes: [
            { id: 2, quantidade: 20 },
            { id: 13, quantidade: 20 },
            { id: 14, quantidade: 20 },
            { id: 4, quantidade: 20 },
        ],
        total : 40,
    },

    {
        id: 6, nome: "Frango com Catupiry", preco:"R$25,00", imagem: "../imagens/frango_catupiry.jpg", texto: "Frango, catupiry, milho, azeitona", ingredientes: [
            { id: 24, quantidade: 40 },
            { id: 4, quantidade: 15 },
            { id: 23, quantidade: 15 },
            { id: 6, quantidade: 10 },
        ],
        total : 25,
    },

    {
        id: 7, nome: "Baconn", preco:"R$30,00", imagem: "../imagens/bacon.jpg", texto: "Bacon, azeitona, oregano, ovos, mossarela", ingredientes: [
            { id: 16, quantidade: 50 },
            { id: 6, quantidade: 10 },
            { id: 20, quantidade: 5 },
            { id: 11, quantidade: 15 },
            { id: 2, quantidade: 20 },
        ],
        total : 30,
    },

    {
        id:8, nome: "Camarão", preco:"R$60,00", imagem: "../imagens/camarao.jpg", texto: "Camarão, mossarela, oregano", ingredientes: [
            { id: 17, quantidade: 50 },
            { id: 2, quantidade: 20 },
            { id: 20, quantidade: 5 },
        ],
        total : 60,
    },

    {
        id: 9, nome: "Chocolate com Banana", preco:"R$60,00", imagem: "../imagens/banana_chocolate.jpg", texto: "banana, chocolate, canela, creme de leite, mossarela", ingredientes: [
            { id: 19, quantidade: 25 },
            { id: 18, quantidade: 25 },
            { id: 21, quantidade: 10 },
            { id: 22, quantidade: 20 },
            { id: 2, quantidade: 15 },
        ],
        total : 60,
    }
    
    
    


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
    overlay.innerHTML = `<br> <br> ${pizza.nome} <br> <br> ${pizza.texto} <br> <br> ${pizza.preco} <br> <br>`;

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
async function removerIngredientes(pizza) {
    const response = await fetch("http://localhost/Pitissaria/php/remover_e_comprar_ingrediente.php", { 
        //http://localhost/GitHub/CrazyCats/Pitissaria/php/remover_e_comprar_ingrediente.php -> endereçamento Ricardo
        //http://127.0.0.1/Pitissaria/php/remover_e_comprar_ingrediente.php -> endereçamento Arthur //
        method: "PATCH",
        body: JSON.stringify(pizza),
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
                <div class="nome_txt"> 
                    <h2>${pizza.nome} Ingredientes</h2>
                    <div class="texto">
                        <p>${pizza.texto}</p>
                        <p>Preço: ${pizza.preco}</p>
                    </div>
                </div>
            </div>
            <div>
                <button class="voltar" id="voltar">Voltar</button>
            </div>
            <div>
                <button class="adicionar" id="adicionar">Comprar</button>
            </div>
        </div>
    `;

    document.getElementById("grid-container").innerHTML = pizzaEspec;
    
    // Adicione um evento de clique ao botão "Comprar"
    document.getElementById("adicionar").addEventListener("click", () => {
        // Use o SweetAlert para confirmar a compra
        Swal.fire({
            icon: 'question',
            title: 'Confirmar compra',
            text: 'Deseja realmente adicionar esta pizza ao carrinho?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Se o usuário confirmar a compra, remova os ingredientes
                removerIngredientes(pizza);
            }
        });
    });

    // Adicione o evento de clique ao botão "Voltar"
    btnVoltar();
}

function btnVoltar() {
    const btnVoltar = document.getElementById("voltar")

    btnVoltar.addEventListener("click", () => {
        // Use o SweetAlert para confirmar a ação do usuário
        Swal.fire({
            icon: 'warning',
            title: 'Tem certeza?',
            text: 'Você realmente deseja voltar para a seleção de pizzas?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, voltar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("grid-container").innerHTML = "";
                criarCardsDePizza();
            }
        });
    });
}