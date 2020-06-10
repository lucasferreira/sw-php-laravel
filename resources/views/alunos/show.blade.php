@extends('layouts.default')

@section('content')
  <div class="page-header">
    <a class="btn btn-primary pull-right" href="{{ route('alunos.index') }}" role="button">Voltar</a>
    <h2>Visualizando Aluno</h2>
  </div>

  <p><strong>Curso do Aluno:</strong> {{ $aluno->curso()->first()->name }}</p>
  <p><strong>Nome do Aluno:</strong> {{ $aluno->name }}</p>
  <p><strong>E-mail do Aluno:</strong> <a href="mailto:{{ $aluno->email }}">{{ $aluno->email }}</a></p>
  @if($aluno->data_nascimento)
    <p><strong>Data de Nascimento:</strong> {{ $aluno->data_nascimento->format('d/m/Y') }}</p>
  @endif
  @if($aluno->avatar)
  <p><img style="max-width: 250px;" src="{{ asset('storage/' . $aluno->avatar) }}" alt="{{ $aluno->name }}" /></p>
  @endif
@endsection
