@extends('layouts.default')

@section('content')
<div class="page-header">
  <a class="btn btn-primary pull-right" href="{{ route('alunos.index') }}" role="button">Voltar</a>
  <h2>Novo Aluno</h2>
</div>

<form action="{{ route('alunos.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <fieldset>
    <div class="form-group @if ($errors->has('curso_id')) has-error @endif">
      <label class="control-label" for="curso_id">Curso do Aluno</label>
      <select class="form-control" id="curso_id" name="curso_id">
        @foreach ($cursos as $id => $curso)
        <option value="{{ $id }}">{{ $curso }}</option>
        @endforeach
      </select>
      @if ($errors->has('curso_id'))
      <span class="invalid-feedback help-block" role="alert">
          <strong>{{ $errors->first('curso_id') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group @if ($errors->has('name')) has-error @endif">
      <label class="control-label" for="name">Nome do Aluno</label>
      <input type="text" class="form-control" id="name" name="name">
      @if ($errors->has('name'))
      <span class="invalid-feedback help-block" role="alert">
          <strong>{{ $errors->first('name') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group @if ($errors->has('email')) has-error @endif">
      <label class="control-label" for="email">E-mail do Aluno</label>
      <input type="email" class="form-control" id="email" name="email">
      @if ($errors->has('email'))
      <span class="invalid-feedback help-block" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group @if ($errors->has('data_nascimento')) has-error @endif">
      <label class="control-label" for="data_nascimento">Data de Nascimento</label>
      <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
      @if ($errors->has('data_nascimento'))
      <span class="invalid-feedback help-block" role="alert">
          <strong>{{ $errors->first('data_nascimento') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group @if ($errors->has('avatar')) has-error @endif">
      <label class="control-label" for="avatar">Foto do Aluno</label>
      <input type="file" class="form-control" id="avatar" name="avatar">
      @if ($errors->has('avatar'))
      <span class="invalid-feedback help-block" role="alert">
          <strong>{{ $errors->first('avatar') }}</strong>
      </span>
      @endif
    </div>
    <button type="submit" class="btn btn-success">Cadastrar</button>
  </fieldset>
</form>
@endsection
