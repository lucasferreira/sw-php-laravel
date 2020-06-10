<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
  protected $dates = array(
    'data_nascimento',
  );

  public function curso()
  {
    return $this->belongsTo('App\Curso', 'curso_id');
  }
}
