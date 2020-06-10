@extends('layouts.default')

@section('content')
<div class="page-header">
  <a class="btn btn-primary pull-right" href="{{ route('users.index') }}" role="button">Voltar</a>
  <h2>Novo Usuário do Sistema</h2>
</div>

<form action="{{ route('users.store') }}" method="post">
  @csrf
  <fieldset>
    <div class="form-group @if ($errors->has('name')) has-error @endif">
      <label class="control-label" for="name">Nome do Usuário</label>
      <input type="text" class="form-control" id="name" name="name">
      @if ($errors->has('name'))
      <span class="invalid-feedback help-block" role="alert">
          <strong>{{ $errors->first('name') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group @if ($errors->has('email')) has-error @endif">
      <label class="control-label" for="email">E-mail de Acesso</label>
      <input type="email" class="form-control" id="email" name="email">
      @if ($errors->has('email'))
      <span class="invalid-feedback help-block" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group @if ($errors->has('password')) has-error @endif">
      <label class="control-label" for="password">Senha de Acesso</label>
      <input type="password" class="form-control" id="password" name="password">
      @if ($errors->has('password'))
      <span class="invalid-feedback help-block" role="alert">
          <strong>{{ $errors->first('password') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group">
      <label class="control-label" for="password_confirmation">Repita a Senha</label>
      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>
    <br />
    <button type="submit" class="btn btn-success">Cadastrar Usuário</button>
  </fieldset>
</form>
@endsection
