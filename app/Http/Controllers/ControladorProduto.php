<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;
use App\Produto;


class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Categoria::all();
        $prods = Produto::all();
        return view("produtos", compact('prods', 'cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Categoria::all();
        return view('novoproduto', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd("teste");
        $categoriaModel = new Categoria();
        $nameCategoria = $request->input("selecaoCategoria");

        Produto::create([
            "nome" => $request->input('nomeProduto'),
            "estoque" => $request->input('quantidadeEstoque'),
            "preco" => $request->input('valor'),
            "categoria_id" => $categoriaModel->getIdCatedoriaByName($nameCategoria)]);
        return redirect('/produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = Categoria::all();
        $prod = Produto::find($id);
        if (isset($prod)) {
            return view('editarproduto', compact('prod', 'cats'));
        } else {
            return redirect('/produtos');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nameCategoria = $request->input('selecaoCategoria');
        $categoriaModel = new Categoria();
        $prod = Produto::find($id);

        if (isset($prod)) {
            $prod->nome = $request->input('nomeProduto');
            $prod->estoque = $request->input('quantidadeEstoque');
            $prod->preco = $request->input('valor');
            $prod->categoria_id = $categoriaModel->getIdCatedoriaByName($nameCategoria);
            $prod->save();
        }
        return redirect('produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Produto::find($id);
        if (isset($prod)) {
            $prod->delete();
        }
        return redirect('/produtos');
    }
}
