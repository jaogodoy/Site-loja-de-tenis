<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admintemplate.index'); // Acesse a view de admin
    }

    // Outros métodos para gerenciar categorias, produtos, etc.
}
