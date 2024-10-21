@extends('Home_template.index')

@section('Conteudo')
    <style>
        .colorlib-product h2 {
            margin-bottom: 20px; /* Espaçamento inferior para o título */
        }

        .product-entry {
            width: 100%; /* Ajusta a largura do cartão para ocupar 100% do espaço da coluna */
            height: 450px; /* Altura padrão do cartão */
            border: 1px solid #ddd; /* Borda leve */
            border-radius: 8px; /* Cantos arredondados */
            overflow: hidden; /* Para evitar que o conteúdo saia do cartão */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
            margin-bottom: 20px; /* Espaçamento entre os cartões */
            transition: transform 0.3s; /* Transição suave para o hover */
            display: flex; /* Flexbox para organizar os itens */
            flex-direction: column; /* Direção das colunas */
            justify-content: space-between; /* Distribuição do espaço */
        }

        .product-entry:hover {
            transform: scale(1.05); /* Efeito de zoom no hover */
        }

        .prod-img img {
            width: 100%; /* Faz com que a imagem ocupe toda a largura do cartão */
            height: 200px; /* Altura fixa para as imagens */
            object-fit: cover; /* Mantém a proporção da imagem e cobre todo o espaço */
        }

        .desc {
            padding: 15px; /* Espaçamento interno para a descrição do produto */
        }

        .desc h2 {
            font-size: 1.2em; /* Tamanho da fonte do nome do produto */
            margin: 0; /* Remove margens padrão */
        }

        .desc .price {
            color: #f39c12; /* Cor da fonte do preço */
            font-weight: bold; /* Negrito no preço */
            font-size: 1.1em; /* Tamanho da fonte do preço */
        }

        .total-wrap {
            margin-top: 30px; /* Espaçamento superior para o total */
            border-top: 1px solid #ddd; /* Linha superior para separação */
            padding-top: 20px; /* Espaçamento superior interno */
        }

        .grand-total p {
            font-size: 1.2em; /* Tamanho da fonte do total */
            color: #f39c12; /* Cor do total */
        }

        .quantity-controls {
            display: flex; /* Alinha os botões de quantidade */
            align-items: center; /* Alinha verticalmente os itens */
            justify-content: center; /* Centraliza horizontalmente os itens */
            margin: 10px 0; /* Espaço acima e abaixo dos controles de quantidade */
        }

        .quantity-input {
            width: 60px; /* Largura do campo de quantidade */
            text-align: center; /* Centraliza o texto dentro do campo */
            margin: 0 5px; /* Espaço entre o campo e os botões */
        }

        .btn-quantity {
            margin: 0 5px; /* Espaço entre os botões */
        }
    </style>

    <div class="colorlib-product">
        <div class="container">
            <h2>Seu Carrinho</h2>
            @if (session()->has('cart') && count(session('cart')) > 0)
                <div class="row">
                    @foreach (session('cart') as $id => $item)
                        <div class="col-md-3 col-lg-3 mb-4 text-center">
                            <div class="product-entry border">
                                <a href="#" class="prod-img">
                                    <img src="{{ asset('storage/' . $item['image']) }}" class="img-fluid" alt="{{ $item['name'] }}">
                                </a>
                                <div class="desc">
                                    <h2><a href="#">{{ $item['name'] }}</a></h2>
                                    <span class="price">R$ {{ number_format($item['price'], 2, ',', '.') }}</span>
                                    <div class="quantity-controls">
                                        <button type="button" class="btn btn-secondary btn-quantity" onclick="updateQuantity({{ $id }}, -1)">-</button>
                                        <span id="quantity-{{ $id }}" class="quantity-input">{{ $item['quantity'] }}</span>
                                        <button type="button" class="btn btn-secondary btn-quantity" onclick="updateQuantity({{ $id }}, 1)">+</button>
                                    </div>
                                    <form action="{{ route('remover.carrinho', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mt-2">Remover</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="total-wrap">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <div class="total">
                                <div class="grand-total">
                                    <p><span><strong>Total:</strong></span> <span id="total-value">R$ {{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], session('cart'))), 2, ',', '.') }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <p>Seu carrinho está vazio.</p>
            @endif
        </div>
    </div>

    <script>
        function updateQuantity(id, change) {
            let quantityElement = document.getElementById('quantity-' + id);
            let currentQuantity = parseInt(quantityElement.innerText);

            currentQuantity += change;

            // Verifica se a quantidade é maior que 0
            if (currentQuantity < 1) {
                currentQuantity = 1; // Mantém a quantidade mínima em 1
            }

            quantityElement.innerText = currentQuantity;

            // Atualiza o total em tempo real
            updateTotal();

            // Chama a função para atualizar a quantidade no servidor
            updateServer(id, currentQuantity);
        }

        function updateTotal() {
            let total = 0;

            @foreach (session('cart') as $id => $item)
                let quantity = parseInt(document.getElementById('quantity-{{ $id }}').innerText);
                let price = {{ $item['price'] }};
                total += quantity * price;
            @endforeach

            document.getElementById('total-value').innerText = 'R$ ' + total.toFixed(2).replace('.', ',');
        }

        function updateServer(id, quantity) {
            axios.post('/update-cart', { id: id, quantity: quantity })
                .then(response => {
                    // Sucesso ao atualizar o servidor
                })
                .catch(error => {
                    console.error('Erro ao atualizar a quantidade:', error);
                });
        }
    </script>
@endsection
