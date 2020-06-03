<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
  public function alunos()
  {
    return $this->hasMany('App\Aluno', 'curso_id');
  }
}
