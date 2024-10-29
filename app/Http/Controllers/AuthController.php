<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\http\Controllers\AdminController;

class AuthController extends Controller
{
    // Método para registrar clientes
    public function register(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Criação do usuário
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'access_level' => 0, // Definir como cliente
        ]);

        // Autenticar o usuário
        Auth::login($user);

        // Redirecionar ou retornar uma resposta
        return redirect()->route('home')->with('success', 'Registro concluído com sucesso!');
    }

    // Método para registrar administradores
    public function registerAdmin(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Criação do administrador
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'access_level' => 1, // Definir como admin
        ]);

        // Autenticar o usuário
        Auth::login($user);

        // Redirecionar ou retornar uma resposta
        return redirect()->route('dashboard')->with('success', 'Registro de administrador concluído com sucesso!');
    }

    // Método para login
    public function login(Request $request)
    {
        // Validação dos dados
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Verificar as credenciais e autenticar o usuário
        if (Auth::attempt($credentials)) {
            // Login bem-sucedido
            $request->session()->regenerate();

            return redirect()->intended('dashboard')->with('success', 'Login bem-sucedido!');
        }

        // Se as credenciais estiverem erradas
        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    // Método para exibir a tela de login
    public function showLoginForm()
    {
        return view('login.login'); // Ajuste o caminho se necessário
    }

    // Método para exibir a tela de registro
    public function showRegisterForm()
    {
        return view('login.register'); // Ajuste o caminho se necessário
    }

    // Método para exibir a tela de registro do administrador
    public function showRegisterAdminForm()
    {
        return view('login.register_admin'); // Caminho para a view de registro de administrador
    }
    public function logout(Request $request)
{
    Auth::logout(); // Finaliza a sessão do usuário

    $request->session()->invalidate(); // Invalida a sessão
    $request->session()->regenerateToken(); // Regenera o token CSRF

    return redirect('/')->with('success', 'Você foi deslogado com sucesso!'); // Redireciona para a página inicial
}

public function loginAdmin(Request $request)
{
    // Validação das credenciais
    $credentials = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Verifique as credenciais e autentique o usuário
    if (Auth::attempt($credentials)) {
        // Login bem-sucedido
        $request->session()->regenerate();

        return redirect()->intended('dashboard')->with('success', 'Login como administrador bem-sucedido!');
    }

    // Se as credenciais estiverem erradas
    return back()->withErrors([
        'email' => 'As credenciais fornecidas estão incorretas.',
    ]);
}

public function showAdminLoginForm()
    {
        return view('Admintemplate.login'); // Aponte para a view correta para o login do admin
    }
}
