@extends('layouts.default')

@section('content')
<div class="page-header">
  <a class="btn btn-primary pull-right" href="{{ route('users.create') }}" role="button">Adicionar Usuário</a>
  <h2>Usuários do Sistema</h2>
</div>

<div class="table-responsive">
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Nome</th>
        <th>E-mail de Acesso</th>
        <th style="width: 110px;">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          <form action="{{ route('users.destroy', $user) }}" method="post">
            @method('DELETE')
            @csrf
            <div class="btn-group btn-group-xs" role="group" aria-label="Ações">
              <a class="btn btn-success" href="{{ route('users.edit', $user) }}" role="button">Editar</a>
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
