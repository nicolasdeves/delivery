
function abrirCarrinho() {
    document.getElementById("cartSidebar").classList.add("open");
}

function fecharCarrinho() {
    document.getElementById("cartSidebar").classList.remove("open");
}

// adicionar itens ao carrinho
let carrinho = [];

function adicionarAoCarrinho(nomeProduto, precoProduto, imagemProduto) {
    carrinho.push({ nome: nomeProduto, preco: precoProduto, quantidade: 1, imagem: imagemProduto });
    atualizarCarrinho();
}

function atualizarCarrinho() {
    const cartItems = document.getElementById('cartItems');
    const cartTotal = document.getElementById('cartTotal');
    cartItems.innerHTML = '';

    let total = 0;

    carrinho.forEach(item => {
        //Criação do HTML de cada item do carrinho (Cuida para não bugar essa poha)
        const itemElement = `
        <hr>
            <div class="cart-item">
                <img src="${item.imagem}" alt="Imagem do Produto" class="cart-item-img">
                <div class="cart-item-details">
                    <h4 class="cart-item-name">${item.nome}</h4>
                    <p class="cart-item-price">R$${item.preco.toFixed(2)}</p>
                    <p class="cart-item-quantidade">Quantidade: ${item.quantidade}</p>
                    <p class="cart-item-remove" onclick="removerDoCarrinho('${item.nome}')">Remover</p>
                </div>
            </div>
        `;
        cartItems.innerHTML += itemElement;
        total += item.preco * item.quantidade;
    });

    cartTotal.innerText = `R$${total.toFixed(2)}`;
}

function removerDoCarrinho(nomeProduto) {
    //Remove o item do carrinho pelo nome, como o nome vai ser único, não tem problema
    carrinho = carrinho.filter(item => item.nome !== nomeProduto);
    atualizarCarrinho();
}

function calcularTotal() {
    let total = 0;
    document.querySelectorAll(".cart-item-price").forEach(function (item) {
        let preco = parseFloat(item.textContent.replace('R$', ''));
        total += preco;
    });
    document.getElementById("cartTotal").textContent = "R$" + total.toFixed(2);
}
