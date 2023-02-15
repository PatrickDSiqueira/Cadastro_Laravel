@extends('layout.app',["current"=>"categorias"])
@section('body')
    <div class="card">
        <div class="card-body">
            <form action="/produtos" method="POST">
                @csrf
                <div class="form-group">

                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Produto">

                    <label for="quantidadeEstoque">Quantidade Estoque</label>
                    <input type="number" class="form-control" name="quantidadeEstoque" id="quantidadeEstoque"/>

                    <label for="valor">Preço</label>
                    <input type="number" class="form-control" name="valor" id="valor"/>

                    <label for="selecaoCategoria">Categoria</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="selecaoCategoria"
                            id="selecaoCategoria">
                        <option selected name>Escolha a Categoria...</option>
                        @foreach($cats as $cat)
                            <option>{{$cat -> name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <a href="/produtos" class="btn btn-danger btn-sm">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
