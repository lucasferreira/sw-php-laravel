@extends('layouts.default')

@section('content')
<div class="page-header">
  <a class="btn btn-primary pull-right" href="{{ route('alunos.create') }}" role="button">Adicionar Aluno</a>
  <h2>Alunos Cadastrados</h2>
</div>

<div class="table-responsive">
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Curso</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th style="width: 172px;">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $aluno)
      <tr>
        <td>{{ $aluno->curso()->first()->name }}</td>
        <td>{{ $aluno->name }}</td>
        <td>{{ $aluno->email }}</td>
        <td>
          <form action="{{ route('alunos.destroy', $aluno) }}" method="post">
            @method('DELETE')
            @csrf
            <div class="btn-group btn-group-xs" role="group" aria-label="Ações">
              <a class="btn btn-default" href="{{ route('alunos.show', $aluno) }}" role="button">Visualizar</a>
              <a class="btn btn-success" href="{{ route('alunos.edit', $aluno) }}" role="button">Editar</a>
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
