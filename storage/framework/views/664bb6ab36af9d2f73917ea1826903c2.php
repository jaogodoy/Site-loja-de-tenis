<!-- resources/views/Admintemplate/login.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body>
    <h1>Login Admin</h1>
    <form action="<?php echo e(route('admin.login.submit')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
<?php /**PATH C:\Users\João DEV\Desktop\JGTESTE\sitetenis-main\resources\views/Admintemplate/login.blade.php ENDPATH**/ ?>