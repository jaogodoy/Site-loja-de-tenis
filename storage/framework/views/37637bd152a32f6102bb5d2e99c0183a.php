<?php $__env->startSection('Conteudo'); ?>
    <style>
        .product-entry {
            width: 100%; /* Ajustar a largura do cartão para ocupar 100% do espaço da coluna */
            height: 400px; /* Altura padrão do cartão */
            border: 1px solid #ddd; /* Borda leve */
            border-radius: 8px; /* Cantos arredondados */
            overflow: hidden; /* Para evitar que o conteúdo saia do cartão */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
            margin-bottom: 20px; /* Espaçamento entre os cartões */
            transition: transform 0.3s; /* Transição suave para o hover */
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
    </style>

    <div class="colorlib-product">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                    <h2>Veja Todos os Produtos Femininos</h2> <!-- Atualizado o título -->
                </div>
            </div>
            <div class="row row-pb-md">
                <?php $__currentLoopData = $produtosFemininos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 col-lg-3 mb-4 text-center"> <!-- Mantendo a coluna com margem inferior -->
                        <div class="product-entry border">
                            <a href="#" class="prod-img">
                                <?php if($produto->produto_imagem): ?>
                                    <img src="<?php echo e(asset('storage/' . $produto->produto_imagem)); ?>" class="img-fluid" alt="<?php echo e($produto->produto_nome); ?>">
                                <?php else: ?>
                                    <img src="default-image.jpg" class="img-fluid" alt="Imagem não disponível"> <!-- Imagem padrão -->
                                <?php endif; ?>
                            </a>
                            <div class="desc">
                                <h2><a href="#"><?php echo e($produto->produto_nome); ?></a></h2>
                                <span class="price">R$ <?php echo e(number_format($produto->produto_preco, 2, ',', '.')); ?></span>

                                <!-- Formulário para o botão Comprar -->
                                <form action="<?php echo e(route('adicionar.carrinho', $produto->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-primary mt-2">Comprar</button>
                                </form>
                                <!-- Fim do Formulário -->
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#"><i class="ion-ios-arrow-back"></i></a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><i class="ion-ios-arrow-forward"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Home_template.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\João DEV\Desktop\JGTESTE\sitetenis-main\resources\views/Home_template/mulher.blade.php ENDPATH**/ ?>