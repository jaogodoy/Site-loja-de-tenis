<?php $__env->startSection('Conteudo'); ?>
    <style>
        .product-entry {
            width: 100%;
            height: 400px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s;
        }

        .product-entry:hover {
            transform: scale(1.05);
        }

        .prod-img img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .desc {
            padding: 15px;
            text-align: left;
        }

        .desc h2 {
            font-size: 1.2em;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .desc .price {
            color: #f39c12;
            font-weight: bold;
            font-size: 1.1em;
        }

        /* Responsividade */
        @media (max-width: 767px) {
            .desc h2, .desc .price {
                font-size: 1em;
            }

            .product-entry {
                height: auto;
            }
        }
    </style>

    <div class="colorlib-product">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                    <h2>Veja Todos os Produtos Masculinos</h2>
                </div>
            </div>
            <div class="row row-pb-md">
                <?php $__currentLoopData = $produtosMasculinos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 col-lg-3 mb-4 text-center">
                        <div class="product-entry border">
                            <a href="#" class="prod-img">
                                <?php if($produto->produto_imagem): ?>
                                    <img src="<?php echo e(asset('storage/' . $produto->produto_imagem)); ?>" class="img-fluid" alt="<?php echo e($produto->produto_nome); ?>">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('Home/images/default-image.jpg')); ?>" class="img-fluid" alt="Imagem não disponível">
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

<?php echo $__env->make('Home_template.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\João DEV\Desktop\JGTESTE\sitetenis-main\resources\views/Home_template/homem.blade.php ENDPATH**/ ?>