<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact(['produtos']));
    }

    public function create()
    {
        return view('produtos.new');
    }

    public function store(ProdutoRequest $request)
    {
        $produtoData = $request->all();
        $request->validated();
        $produto = new Produto();
        $produto->create($produtoData);
        flash('Produto criado com sucesso')->success();
        return redirect()->route('produto.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact(['produto']));
    }

    public function update(ProdutoRequest $request, $produto)
    {
        $produtoData = $request->all();
        $request->validated();
        $produto = Produto::findOrFail($produto);
        $produto->update($produtoData);
        flash('Produto alterado com sucesso')->success();
        return redirect()->route('produto.index');
    }

    public function destroy($id)
    {
        try {
            $produto = Produto::findOrFail($id);
            $produto->delete();
            flash('Produto removido com sucesso')->success();
            return redirect()->route('produto.index');
        } catch (\PDOException $e) {
            if (strpos($e->getMessage(), 'Integrity constraint violation'))
                flash('Produto já vinculado a uma estrutura')->error();
            return redirect()->back();
        }

    }
}
