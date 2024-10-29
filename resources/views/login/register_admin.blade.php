<!-- resources/views/Admintemplate/register_admin.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Administrador</title>
</head>
<body>
    <h1>Registrar Administrador</h1>
    <form method="POST" action="{{ route('register.admin') }}">
        @csrf
        <input type="text" name="name" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Senha" required>
        <input type="password" name="password_confirmation" placeholder="Confirme a Senha" required>
        <button type="submit">Registrar Administrador</button>
    </form>

    <p>Já tem uma conta? <a href="{{ route('login') }}">Faça login aqui</a></p>
</body>
</html>
