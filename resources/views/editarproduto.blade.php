@extends('layout.app',["current"=>"produtos"])
@section('body')
    <div class="card">
        <div class="card-body">
            <form action="/produtos/editar/{{$prod -> id}}" method="POST">
                @csrf
                <div class="form-group">

                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Produto" value="{{$prod -> nome}}">

                    <label for="quantidadeEstoque">Quantidade Estoque</label>
                    <input type="number" class="form-control" name="quantidadeEstoque" id="quantidadeEstoque" value="{{$prod -> estoque}}"/>

                    <label for="valor">Preço</label>
                    <input type="number" class="form-control" name="valor" id="valor" value="{{$prod -> preco}}"/>

                    <label for="selecaoCategoria">Categoria</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="selecaoCategoria"
                            id="selecaoCategoria">
                        @foreach($cats as $cat)
                            <option {{($prod -> categoria_id) == ($cat -> id) ? 'selected' : ''}}>{{$cat -> name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <a type="cancel" class="btn btn-danger btn-sm" href="/produtos">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
