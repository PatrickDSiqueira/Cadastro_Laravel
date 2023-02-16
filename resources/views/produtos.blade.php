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
                </table>
            @endif
        </div>
        <div class="card-footer">
            <button href="/produtos/novo" class="btn btn-sm btn-primary" role="button" onclick="novoProduto()">Novo
                Produto
            </button>
        </div>
    </div>

    <div class="modal" role="dialog" tabindex="-1" id="dlgProdutos">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formProduto">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo Produto</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id">
                        <div class="form-group">
                            <label for="nomeProduto" class="control-label">Nome do Produto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nomeProduto" placeholder="Nome do Produto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="precoProduto" class="control-label">Preco do Produto</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="precoProduto"
                                       placeholder="Preco do Produto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantidadeProduto" class="control-label">Quantidade do Produto</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="quantidadeProduto"
                                       placeholder="Quantidade do Produto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categoriaProduto" class="control-label">Categoria do Produto</label>
                            <div class="input-group">
                                <select type="text" class="form-control" id="categoriaProduto" name="categoriaProduto"
                                        placeholder="Categoria do Produto">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn">Salvar</button>
                        <a type="cancel" href="/produtos" class="btn btn-secondary btn">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        function novoProduto() {
            $('#categoriaProduto').val('')
            $('#quantidadeProduto').val('')
            $('#precoProduto').val('')
            $('#id').val('')
            $('#nomeProduto').val('')
            $('#dlgProdutos').modal('show')
        }

        function chamarCategorias() {
            $.getJSON('api/categorias', function (data) {
                console.log(data)
                for (let i = 0; i < data.length; i++) {
                    opcao = "<option value='" + data.id + "'>" + data[i].name + "</option>";
                    $('#categoriaProduto').append(opcao);
                }
            })
        }

        $(function(){
            chamarCategorias();
        })
    </script>
@endsection
