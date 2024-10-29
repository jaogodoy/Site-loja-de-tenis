<?php $__env->startSection('Conteudo'); ?>
    <h1>Processar Pagamento</h1>
    <p>Insira as informações do seu cartão para realizar o pagamento.</p>

    <form action="<?php echo e(route('pagamento.finalizar')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="nome">Nome no Cartão:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cartao">Número do Cartão:</label>
            <input type="text" name="cartao" class="form-control" maxlength="16" required>
        </div>
        <div class="form-group">
            <label for="data_validade">Data de Validade (MM/AA):</label>
            <input type="text" name="data_validade" class="form-control" maxlength="5" required>
        </div>
        <div class="form-group">
            <label for="cvv">CVV:</label>
            <input type="text" name="cvv" class="form-control" maxlength="3" required>
        </div>
        <button type="submit" class="btn btn-primary">Finalizar Pagamento</button>
    </form>

    <?php if(session('success')): ?>
        <div class="alert alert-success mt-3">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Home_template.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\João DEV\Desktop\JGTESTE\sitetenis-main\resources\views/Home_template/pagamento.blade.php ENDPATH**/ ?>