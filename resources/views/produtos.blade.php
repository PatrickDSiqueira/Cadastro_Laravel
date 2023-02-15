@extends('layout.app', ["current" => "produtos"])
@section('body')
    <div class="card border">
        <div class="card-body">
            <h5>Cadastro de Produtos</h5>
            @if(isset($prods))
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Estoque</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <body>
                    @foreach($prods as $prod)
                        <tr>
                            <td>{{$prod ->nome}}</td>
                            <td>{{$prod ->estoque}}</td>
                            <td>{{$prod ->preco}}
                            <td>
                                @foreach($cats as $cat)
                                    @if($cat -> id ==  $prod -> categoria_id)
                                        {{$cat ->name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="/produtos/editar/{{$prod->id}}" class="btn btn-sm btn-primary">Editar</a>
                                <a href="/produtos/apagar/{{$prod->id}}" class="btn btn-sm btn-danger">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                    </body>
                </table>
            @endif
        </div>
        <div class="card-footer">
            <a href="/produtos/novo" class="btn btn-sm btn-primary" role="button">Novo Produto</a>
        </div>
    </div>

@endsection
