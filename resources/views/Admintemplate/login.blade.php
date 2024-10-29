<!-- resources/views/Admintemplate/login.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body>
    <h1>Login Admin</h1>
    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf
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
