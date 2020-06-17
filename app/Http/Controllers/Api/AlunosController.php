<?php
namespace App\Http\Controllers\Api;

use App\Aluno;
use App\Curso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlunosController extends Controller
{
  private function validator(Request $request)
  {
    // validation rules.
    $rules = array(
      'name' => 'required|string|max:255',
      'email' => 'required|email|string|max:255',
    );

    // custom validation error messages.
    $messages = array(
      'name.required' => 'Por favor informe um nome de aluno válido',
      'email.required' => 'Por favor informe um e-mail de aluno válido',
      'email.email' => 'Por favor informe um e-mail de aluno válido',
    );

    $labels = array(
      "name" => "nome",
      "email" => "e-mail",
    );

    // validate the request.
    $request->validate($rules, $messages, $labels);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $alunos = Aluno::with('Curso')->get();
    return response()->json(['alunos' => $alunos]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validator($request);

    $novoAluno = new Aluno();
    $novoAluno->name = $request->name;
    $novoAluno->email = $request->email;
    $novoAluno->curso_id = $request->curso_id;
    $novoAluno->save();

    $aluno = $novoAluno->where('id', $novoAluno->id)->with('Curso')->first();

    return response()->json(['aluno' => $aluno]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Aluno  $aluno
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $aluno = Aluno::where('id', $id)->with('Curso')->first();

    return response()->json(['aluno' => $aluno]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Aluno  $aluno
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Aluno $aluno)
  {
    $this->validator($request);

    $aluno->name = $request->name;
    $aluno->email = $request->email;
    $aluno->curso_id = $request->curso_id;
    $aluno->data_nascimento = $request->data_nascimento;
    $aluno->save();

    $aluno = $aluno->where('id', $aluno->id)->with('Curso')->first();

    return response()->json(['aluno' => $aluno]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Aluno  $aluno
   * @return \Illuminate\Http\Response
   */
  public function destroy(Aluno $aluno)
  {
    $aluno->delete();

    return response()->json(['success' => true]);
  }
}
