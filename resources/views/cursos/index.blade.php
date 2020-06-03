@extends('layouts.default')

@section('content')
<div class="page-header">
  <a class="btn btn-primary pull-right" href="{{ route('cursos.create') }}" role="button">Adicionar Curso</a>
  <h2>Cursos Cadastrados</h2>
</div>

<div class="table-responsive">
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th style="width: 172px;">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $curso)
      <tr>
        <td>{{ $curso->name }}</td>
        <td>{{ $curso->descricao }}</td>
        <td>
          <form action="{{ route('cursos.destroy', $curso) }}" method="post">
            @method('DELETE')
            @csrf
            <div class="btn-group btn-group-xs" role="group" aria-label="Ações">
              <a class="btn btn-default" href="{{ route('cursos.show', $curso) }}" role="button">Visualizar</a>
              <a class="btn btn-success" href="{{ route('cursos.edit', $curso) }}" role="button">Editar</a>
              <button class="btn btn-danger" type="submit">Deletar</button>
            </div>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
