@extends("Admintemplate.index")

@section("admin_template")
<div class="container-fluid px-4">
    <h1 class="mt-4">Editar Produto</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Editar Produto</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Formulário para Editar Produto
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('produtos.update', $produto) }}">
                @csrf
                @method('POST')
                <input type="hidden" name="id" value="{{ $produto->id }}" />

                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Categoria</label>
                    <select name="categoria_id" id="categoria_id" class="form-select" required>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $categoria->id == $produto->categoria_id ? 'selected' : '' }}>{{ $categoria->categoria_nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="produto_nome" class="form-label">Nome do Produto</label>
                    <input type="text" class="form-control" id="produto_nome" name="produto_nome" value="{{ $produto->produto_nome }}" required maxlength="255">
                </div>
                <div class="mb-3">
                    <label for="produto_quantidade" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="produto_quantidade" name="produto_quantidade" value="{{ $produto->produto_quantidade }}" required>
                </div>
                <div class="mb-3">
                    <label for="produto_descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="produto_descricao" name="produto_descricao" rows="3">{{ $produto->produto_descricao }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
