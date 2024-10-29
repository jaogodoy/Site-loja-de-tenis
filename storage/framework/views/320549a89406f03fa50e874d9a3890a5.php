<?php $__env->startSection("admin_template"); ?>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Categorias</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">categorias</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Lista de categorias
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Novo
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Opções</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($linha->id); ?></td>
                                <td><?php echo e($linha->categoria_nome); ?></td>
                                <td><?php echo e($linha->categoria_descricao); ?></td>
                                <td>
                                    <a href='<?php echo e(route('categoria_upd', ['id' => $linha->id])); ?>' class='btn btn-success'>
                                        <li class='fa fa-pencil'></li>
                                    </a>
                                    |
                                    <a href='<?php echo e(route('categoria_ex', ['id' => $linha->id])); ?>' class='btn btn-danger'>
                                        <li class='fa fa-trash'></li>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="/categoria">
                            <?php echo csrf_field(); ?>
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nova categoria</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="categoria_nome" name="categoria_nome"
                                        placeholder="Digite o nome da categoria">
                                    <label for="floatingInput">Categoria</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="categoria_descricao" name="categoria_descricao"
                                        placeholder="Digite ">
                                    <label for="floatingInput">Descrição</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make("Admintemplate.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\João DEV\Desktop\JGTESTE\sitetenis-main\resources\views/categoria/index.blade.php ENDPATH**/ ?>