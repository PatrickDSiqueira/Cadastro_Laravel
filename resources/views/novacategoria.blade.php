@extends('layout.app',["current"=>"categorias"])
@section('body')
    <div class="card">
        <div class="card-body">
            <form action="/categorias" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Nome da Categoria</label>
                    <input class="form-control" type="text" name="nomeCategoria" id="nomeCategoria" placeholder="Categoria"  />
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <a type="cancel" class="btn btn-danger btn-sm" href="/categorias">Cancelar</a>
            </form>

        </div>
    </div>
@endsection
