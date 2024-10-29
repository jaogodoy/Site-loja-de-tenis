<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Login</button>
</form>

<!-- Botão para a página de registro -->
<div style="margin-top: 10px;">
    <a href="{{ route('register') }}" class="btn btn-link">Não tem uma conta? Cadastre-se aqui</a>
</div>
