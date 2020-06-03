@extends('layouts.default')

@section('content')
<div class="page-header">
  <a class="btn btn-primary pull-right" href="{{ route('cursos.index') }}" role="button">Voltar</a>
  <h2>Visualizando Curso</h2>
</div>

<p><strong>Nome do Curso:</strong> {{ $curso->name }}</p>
<p><strong>Descrição:</strong> {!! nl2br($curso->descricao) !!}</p>
@endsection
