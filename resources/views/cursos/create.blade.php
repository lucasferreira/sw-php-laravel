@extends('layouts.default')

@section('content')
<div class="page-header">
  <a class="btn btn-primary pull-right" href="{{ route('cursos.index') }}" role="button">Voltar</a>
  <h2>Novo Curso</h2>
</div>

<form action="{{ route('cursos.store') }}" method="post">
  @csrf
  <fieldset>
    <div class="form-group @if ($errors->has('name')) has-error @endif">
      <label class="control-label" for="name">Nome do Curso</label>
      <input type="text" class="form-control" id="name" name="name">
      @if ($errors->has('name'))
      <span class="invalid-feedback help-block" role="alert">
          <strong>{{ $errors->first('name') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group">
      <label class="control-label" for="descricao">Descrição (opcional)</label>
      <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Cadastrar</button>
  </fieldset>
</form>
@endsection
