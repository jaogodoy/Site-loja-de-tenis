<form method="POST" action="<?php echo e(route('login')); ?>">
    <?php echo csrf_field(); ?>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Login</button>
</form>

<!-- Botão para a página de registro -->
<div style="margin-top: 10px;">
    <a href="<?php echo e(route('register')); ?>" class="btn btn-link">Não tem uma conta? Cadastre-se aqui</a>
</div>
<?php /**PATH C:\Users\João DEV\Desktop\JGTESTE\sitetenis-main\resources\views/login/login.blade.php ENDPATH**/ ?>