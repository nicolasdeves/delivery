    <div class="modal fade" id="modalConfirmacao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar pedido</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="usuario" class="form-label">Rua:</label>
                        <input type="text" class="form-control" id="usuario" value={{ $usuario->nome }} readonly>
                    </div>

                    <div class="mb-3">
                        <label for="enderecoSelect" class="form-label">Selecione seu endereço:</label>
                        <select id="enderecoSelect" class="form-control" onchange="preencherEndereco()">
                            <option value="">Selecione um endereço</option>
                            @foreach ($enderecos as $endereco)
                                <option value="{{ json_encode($endereco) }}">{{ $endereco['nome'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="rua" class="form-label">Rua:</label>
                        <input type="text" class="form-control" id="rua" placeholder="Digite sua rua">
                    </div>

                    <div class="mb-3">
                        <label for="numero" class="form-label">Número:</label>
                        <input type="text" class="form-control" id="numero" placeholder="Digite seu número">
                    </div>

                    <div class="mb-3">
                        <label for="bairro" class="form-label">Bairro:</label>
                        <input type="text" class="form-control" id="bairro" placeholder="Digite seu bairro">
                    </div>

                    <div class="mb-3">
                        <label for="cep" class="form-label">CEP:</label>
                        <input type="text" class="form-control" id="cep" placeholder="Digite seu CEP">
                    </div>

                    <div class="mb-3">
                        <label for="complemento" class="form-label">Complemento:</label>
                        <input type="text" class="form-control" id="complemento"
                            placeholder="Digite seu complemento">
                    </div>

                    <div class='mb-3'>
                        <label for="observacoes" class="form-label">Observações:</label>
                        <textarea class="form-control" id="observacoes" rows="3"></textarea>
                    </div>


                    {{-- <p> <strong> Taxa de entrega: <span id="taxaEntrega">R$0,00</span> </strong> </p> --}}
                    <p> <strong> Total do pedido: <span id="totalPedido">R$0,00</span> </strong> </p>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary finalizar-compra-btn"
                        onclick="confirmarPedido()">Salvar endereço e realizar pedido</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        let endereco = null;
        let observacao = null;

        function preencherEndereco() {
            const select = document.getElementById('enderecoSelect');
            endereco = JSON.parse(select.value);
            observacao = document.getElementById('observacoes').value;

            console.log(endereco)
            console.log(document.getElementById('complemento').value)

            if (endereco) {
                document.getElementById('rua').value = endereco.rua;
                document.getElementById('numero').value = endereco.numero;
                document.getElementById('bairro').value = endereco.bairro;
                document.getElementById('cep').value = endereco.cep;
                document.getElementById('complemento').value = endereco.complemento;
            } else {
                document.getElementById('rua').value = '';
                document.getElementById('numero').value = '';
                document.getElementById('bairro').value = '';
                document.getElementById('cep').value = '';
                document.getElementById('complemento').value = '';
            }
        }

        function confirmarPedido() {

            endereco.rua = document.getElementById('rua').value;
            endereco.numero = document.getElementById('numero').value;
            endereco.bairro = document.getElementById('bairro').value;
            endereco.cep = document.getElementById('cep').value;
            endereco.complemento = document.getElementById('complemento').value;

            finalizarPedido(endereco, observacao)
        }
    </script>

    <script src="{{ asset('js/carrinho.js') }}"></script>

    <script>
        // Função para sincronizar o total do carrinho com o total do pedido no modal
        function atualizarTotalPedido() {
            const cartTotal = document.getElementById('cartTotal').innerText;
            document.getElementById('totalPedido').innerText = cartTotal;
        }

        // Evento para atualizar o total do pedido quando o modal de confirmação abre
        const modalConfirmacao = document.getElementById('modalConfirmacao');
        modalConfirmacao.addEventListener('show.bs.modal', atualizarTotalPedido);
    </script>
