@extends('layouts.default')

@section('content')
<div class="page-header">
  <a class="btn btn-primary pull-right" href="{{ route('cursos.index') }}" role="button">Voltar</a>
  <h2>Editando Curso</h2>
</div>

<form action="{{ route('cursos.update', $curso) }}" method="post">
  @csrf
  @method('PUT')
  <fieldset>
    <div class="form-group @if ($errors->has('name')) has-error @endif">
      <label class="control-label" for="name">Nome do Curso</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ old("name", $curso->name) }}">
      @if ($errors->has('name'))
      <span class="invalid-feedback help-block" role="alert">
          <strong>{{ $errors->first('name') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group">
      <label class="control-label" for="descricao">Descrição (opcional)</label>
      <textarea class="form-control" id="descricao" name="descricao" rows="3">{{ old("descricao", $curso->descricao) }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Alterar Curso</button>
  </fieldset>
</form>
@endsection
