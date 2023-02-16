@extends('layout.app', ["current" => "produtos"])
@section('body')
    <div class="card border">
        <div class="card-body">
            <h5>Cadastro de Produtos</h5>
            @if(isset($prods))
                <table class="table table-bordered table-hover" id="tabelaProdutos">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Estoque</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
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
                        <button type="cancel" class="btn btn-secondary btn" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

        function novoProduto() {
            $('#categoriaProduto').val('')
            $('#quantidadeProduto').val('')
            $('#precoProduto').val('')
            $('#id').val('')
            $('#nomeProduto').val('')
            $('#dlgProdutos').modal('show')
        }

        function carregarProdutos() {
            $.getJSON('/api/produtos', function (data) {
                for (let i = 0; i < data.length; i++) {
                    linha = montarLinha(data[i]);
                    $('#tabelaProdutos>tbody').append(linha);
                }
            })
        }

        function carregarCategorias() {
            $.getJSON('/api/categorias', function (data) {
                for (let i = 0; i < data.length; i++) {
                    opcao = '<option value="'+ data[i].id +'">' + data[i].name + '</option>';
                    $('#categoriaProduto').append(opcao);
                }
            })
        }

        function montarLinha(produto) {
            var linha =
                "<tr>" +
                    "<td>" + produto.id + "</td>" +
                    "<td>" + produto.nome + "</td>" +
                    "<td>" + produto.estoque + "</td>" +
                    "<td>" + produto.preco + "</td>" +
                    "<td>" + produto.categoria_id + "</td>" +
                    "<td>" +
                        '<button class="btn btn-sm btn-primary" onClick="editar('+produto.id+')">Editar</button>' +
                        '<button class="btn btn-sm btn-danger" onClick="remover('+produto.id+')">Deletar</button>' +
                    "</td>"
                "</tr>";
            return linha;
        }

        function remover(id){
            $.ajax({
                type : "DELETE",
                url : "/api/produtos/"+id,
                context: this,
                success:function (){
                    linhas = $('#tabelaProdutos>tbody>tr');
                    e = linhas.filter(function (i, elemento){
                        return elemento.cells[0].textContent == id;
                    });
                    if (e){
                        e.remove();
                    }
            },
                error : function (error){
                    console.log(error);
                }


            })
        }

        function criarProduto() {
            prod = {
                nome: $("#nomeProduto").val(),
                preco: $("#precoProduto").val(),
                estoque: $("#quantidadeProduto").val(),
                categoria_id: $("#categoriaProduto").val()
            }
            $.post("/api/produtos",prod,function (data){
                produto = JSON.parse(data);
                linha = montarLinha(produto);
                $('#tabelaProdutos>tbody').append(linha);
            })
        }

        $("#formProduto").submit(function (event) {
            event.preventDefault()
            criarProduto()
            $("#dlgProdutos").modal('hide');
        })
        $(function () {
            carregarCategorias()
            carregarProdutos()
        })
    </script>
@endsection
