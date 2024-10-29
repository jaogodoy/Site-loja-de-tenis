<?php $__env->startSection('admin_template'); ?>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Produtos</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">produtos</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Lista de produtos
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
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Categoria</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Gênero</th>
                            <th>Imagem</th> <!-- Nova coluna para imagem -->
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($linha->id); ?></td>
                                <td><?php echo e($linha->produto_nome); ?></td>
                                <td><?php echo e($linha->produto_descricao); ?></td>
                                <td><?php echo e($linha->categoria->categoria_nome); ?></td>
                                <td><?php echo e($linha->produto_quantidade); ?></td>
                                <td>R$ <?php echo e(number_format($linha->produto_preco, 2, ',', '.')); ?></td>
                                <td><?php echo e(ucfirst($linha->produto_genero)); ?></td>
                                <td>
                                    <?php if($linha->produto_imagem): ?>
                                        <img src="<?php echo e(asset('storage/' . $linha->produto_imagem)); ?>" alt="<?php echo e($linha->produto_nome); ?>" style="width: 50px; height: auto;">
                                    <?php else: ?>
                                        <span>No Image</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal<?php echo e($linha->id); ?>">
                                        <i class='fa fa-pencil'></i>
                                    </a>
                                    |
                                    <a href='<?php echo e(route('produto_excluir', ['produto' => $linha->id])); ?>' class='btn btn-danger'
                                       onclick="event.preventDefault(); document.getElementById('delete-form<?php echo e($linha->id); ?>').submit();">
                                        <i class='fa fa-trash'></i>
                                    </a>
                                    <form id="delete-form<?php echo e($linha->id); ?>" action="<?php echo e(route('produto_excluir', ['produto' => $linha->id])); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal de Edição -->
                            <div class="modal fade" id="editModal<?php echo e($linha->id); ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo e($linha->id); ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="<?php echo e(route('produto_update', ['produto' => $linha->id])); ?>" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel<?php echo e($linha->id); ?>">Editar produto</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" id="categoria_id" name="categoria_id" required>
                                                        <option value="">Selecione uma categoria</option>
                                                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $linha->categoria_id ? 'selected' : ''); ?>>
                                                                <?php echo e($item->categoria_nome); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <label for="categoria_id">Categoria</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="produto_nome" name="produto_nome" value="<?php echo e($linha->produto_nome); ?>" placeholder="Digite o nome do produto" required>
                                                    <label for="produto_nome">Nome do produto</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="produto_descricao" name="produto_descricao" value="<?php echo e($linha->produto_descricao); ?>" placeholder="Digite a descrição">
                                                    <label for="produto_descricao">Descrição</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="produto_quantidade" name="produto_quantidade" value="<?php echo e($linha->produto_quantidade); ?>" placeholder="Digite a quantidade" required>
                                                    <label for="produto_quantidade">Quantidade</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="number" step="0.01" class="form-control" id="produto_preco" name="produto_preco" value="<?php echo e($linha->produto_preco); ?>" placeholder="Digite o preço" required>
                                                    <label for="produto_preco">Preço</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <select class="form-select" id="produto_genero" name="produto_genero" required>
                                                        <option value="masculino" <?php echo e($linha->produto_genero == 'masculino' ? 'selected' : ''); ?>>Masculino</option>
                                                        <option value="feminino" <?php echo e($linha->produto_genero == 'feminino' ? 'selected' : ''); ?>>Feminino</option>
                                                    </select>
                                                    <label for="produto_genero">Gênero</label>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="produto_imagem" class="form-label">Imagem do Produto</label>
                                                    <input type="file" class="form-control" id="produto_imagem" name="produto_imagem" accept="image/*">
                                                    <?php if($linha->produto_imagem): ?>
                                                        <img src="<?php echo e(asset('storage/' . $linha->produto_imagem)); ?>" alt="<?php echo e($linha->produto_nome); ?>" style="width: 150px; height: auto; margin-top: 10px;">
                                                    <?php endif; ?>
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal para Adicionar Novo Produto -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="<?php echo e(route('novo_produto')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Novo produto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="categoria_id" name="categoria_id" required>
                                    <option value="">Selecione uma categoria</option>
                                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->categoria_nome); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <label for="categoria_id">Categoria</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="produto_nome" name="produto_nome" placeholder="Digite o nome do produto" required>
                                <label for="produto_nome">Nome do produto</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="produto_descricao" name="produto_descricao" placeholder="Digite a descrição">
                                <label for="produto_descricao">Descrição</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="produto_quantidade" name="produto_quantidade" placeholder="Digite a quantidade" required>
                                <label for="produto_quantidade">Quantidade</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" step="0.01" class="form-control" id="produto_preco" name="produto_preco" placeholder="Digite o preço" required>
                                <label for="produto_preco">Preço</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" id="produto_genero" name="produto_genero" required>
                                    <option value="masculino">Masculino</option>
                                    <option value="feminino">Feminino</option>
                                </select>
                                <label for="produto_genero">Gênero</label>
                            </div>

                            <div class="mb-3">
                                <label for="produto_imagem" class="form-label">Imagem do Produto</label>
                                <input type="file" class="form-control" id="produto_imagem" name="produto_imagem" accept="image/*" required>
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admintemplate.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\João DEV\Desktop\JGTESTE\sitetenis-main\resources\views/produtos/index.blade.php ENDPATH**/ ?>