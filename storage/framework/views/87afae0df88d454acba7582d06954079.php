<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registro de Admin</title>
</head>
<body>
    <h2>Registro de Admin</h2>
    <form action="<?php echo e(route('admin.register')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required>
        <br>

        <label for="password_confirmation">Confirme a Senha:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
        <br>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>
<?php /**PATH C:\Users\João DEV\Desktop\JGTESTE\sitetenis-main\resources\views/Admintemplate/register.blade.php ENDPATH**/ ?>