<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login de Cliente</title>
</head>
<body>
    <h2>Login de Cliente</h2>
    <form action="<?php echo e(route('client.login.submit')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required>
        <br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>

<?php /**PATH C:\Users\João DEV\Desktop\JGTESTE\sitetenis-main\resources\views/Home_template/login.blade.php ENDPATH**/ ?>