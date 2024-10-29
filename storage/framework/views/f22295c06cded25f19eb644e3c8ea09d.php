<?php $__env->startSection('Conteudo'); ?>
    <div class="container mt-4">
        <h1 class="mb-4">Carrinho de Compras</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <?php if(empty($carrinho)): ?>
            <div class="alert alert-info">Seu carrinho está vazio.</div>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $precoTotal = 0; // Inicializa o preço total
                    ?>

                    <?php $__currentLoopData = $carrinho; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <img src="<?php echo e(asset('storage/' . $item['imagem'])); ?>"
                                     alt="Imagem de <?php echo e($item['nome']); ?>"
                                     class="img-thumbnail"
                                     width="50">
                            </td>
                            <td><?php echo e($item['nome']); ?></td>
                            <td>
                                <form action="<?php echo e(route('atualizar.carrinho', $id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="input-group">
                                        <input type="number"
                                               name="quantidade"
                                               value="<?php echo e($item['quantidade']); ?>"
                                               min="1"
                                               class="form-control">
                                        <button type="submit" class="btn btn-primary">Atualizar</button>
                                    </div>
                                </form>
                            </td>
                            <td>R$ <?php echo e(number_format($item['preco'], 2, ',', '.')); ?></td>
                            <td>
                                <form action="<?php echo e(route('remover.carrinho', $id)); ?>" method="POST" onsubmit="return confirm('Você tem certeza que deseja remover este item?');">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-danger">Remover</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            // Adiciona o preço do item multiplicado pela quantidade ao preço total
                            $precoTotal += $item['preco'] * $item['quantidade'];
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <h5 class="mt-4">Preço Total: R$ <?php echo e(number_format($precoTotal, 2, ',', '.')); ?></h5>
                <a href="<?php echo e(route('processar.pagamento')); ?>" class="btn btn-success">Finalizar Compra</a>
                <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary">Continuar Comprando</a>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Home_template.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\João DEV\Desktop\JGTESTE\sitetenis-main\resources\views/Home_template/carrinho.blade.php ENDPATH**/ ?>