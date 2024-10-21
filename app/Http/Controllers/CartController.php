<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        // Obtenha o produto pelo ID
        $produto = Produto::find($id);

        if (!$produto) {
            return redirect()->back()->with('error', 'Produto não encontrado.');
        }

        // Adiciona o produto ao carrinho
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $produto->produto_nome,
                'price' => $produto->produto_preco,
                'quantity' => 1,
                'image' => $produto->produto_imagem,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }

    public function viewCart()
    {
        return view('carrinho', ['cart' => session()->get('cart')]);
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produto removido do carrinho!');
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        // Recebe os dados do id e da nova quantidade
        $id = $request->input('id');
        $quantity = $request->input('quantity');

        // Verifica se o produto existe no carrinho
        if (isset($cart[$id])) {
            // Atualiza a quantidade
            if ($quantity > 0) {
                $cart[$id]['quantity'] = $quantity;
            } else {
                // Remove o produto se a quantidade for 0 ou negativa
                unset($cart[$id]);
            }
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true]);
    }
}
