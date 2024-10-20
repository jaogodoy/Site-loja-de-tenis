<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::where("produto_ativo", "1")->with('categoria')->get();
        $categorias = Categoria::where("categoria_ativo", "1")->get();

        return view('produtos.index', compact('produtos', 'categorias'));
    }

    public function salvarNovoProduto(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'produto_nome' => 'required|string|max:30',
            'produto_quantidade' => 'required|integer',
            'produto_descricao' => 'nullable|string',
        ]);

        Produto::create($request->all());

        // Alterado o nome da rota para 'produtos.index'
        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function detalhesProduto(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    public function formularioAlterar(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function salvarAlterarProduto(Request $request, Produto $produto)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'produto_nome' => 'required|string|max:255',
            'produto_quantidade' => 'required|integer',
            'produto_descricao' => 'nullable|string',
        ]);

        $produto->update($request->all());

        // Corrigido para mensagem de atualização
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso!');
    }
}
