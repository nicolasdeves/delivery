
function abrirCarrinho() {
    if (carrinho.length === 0) {
        alert('Seu carrinho está vazio!');
        return;
    }
    document.getElementById("cartSidebar").classList.add("open");
}

function fecharCarrinho() {
    document.getElementById("cartSidebar").classList.remove("open");
}

// adicionar itens ao carrinho
let carrinho = [];

function adicionarAoCarrinho(idProduto, nomeProduto, precoProduto, imagemProduto) {
    carrinho.push({ id: idProduto, nome: nomeProduto, preco: precoProduto, quantidade: 1, imagem: imagemProduto });
    atualizarCarrinho();
}

function atualizarCarrinho() {
    const cartItems = document.getElementById('cartItems');
    const cartTotal = document.getElementById('cartTotal');
    let totalPedido = document.getElementById('totalPedido');
    const totalEntrega = document.getElementById('totalEntrega');
    cartItems.innerHTML = '';

    let total = 0;

    carrinho.forEach((item, indice) => {
        //Criação do HTML de cada item do carrinho, cuida para não fazer merda
        const itemElement = `
        <hr>    
            <div class="cart-item">
                <img src="${item.imagem}" alt="Imagem do Produto" class="cart-item-img">
                <div class="cart-item-details">
                    <h4 class="cart-item-name">${item.nome}</h4>
                    <p class="cart-item-price">R$${item.preco}</p>
                    <p class="cart-item-quantidade">Quantidade: ${item.quantidade}</p>
                    <p class="cart-item-remove" onclick="removerDoCarrinho(${indice})" style="color: red; cursor: pointer;">Remover</p>
                </div>
            </div>
        `;
        cartItems.innerHTML += itemElement;
        total += item.preco * item.quantidade;
    });

    cartTotal.innerText = `R$${total.toFixed(2)}`;
    totalPedido.innerText = `R$${total.toFixed(2)}`;

    console.log("Total Pedido:");
    console.log(totalPedido.innerText);
}


function removerDoCarrinho(indice) {
    // Remove o item específico pelo índice
    carrinho.splice(indice, 1);
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

function finalizarPedido(endereco_selecionado, observacao) {
    const carrinhoData = carrinho;

    fetch('/delivery/finalizar-pedido', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            carrinho: carrinhoData,
            endereco: endereco_selecionado,
            observacao
        })
    })
        .then(response => response.json())
        .then(data => {
            carrinho = [];
            cartItems.innerHTML = '';
            cartTotal.innerText = 'R$0.00';
            alert('Pedido finalizado com sucesso!');
            location.reload();
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao finalizar o pedido!');
        });
}

