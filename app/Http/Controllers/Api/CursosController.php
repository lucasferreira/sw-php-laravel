<?php
namespace App\Http\Controllers\Api;

use App\Curso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CursosController extends Controller
{
  private function validator(Request $request)
  {
    // validation rules.
    $rules = array(
      'name' => 'required|string|max:255',
    );

    // custom validation error messages.
    $messages = array(
        'name.required' => 'Por favor informe um nome de curso válido'
    );

    $labels = array(
      "name" => "nome",
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
    $cursos = Curso::get();
    return response()->json(['cursos' => $cursos]);
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

    $novoCurso = new Curso();
    $novoCurso->name = $request->name;
    $novoCurso->descricao = $request->descricao;
    $novoCurso->save();

    return response()->json(['curso' => $novoCurso]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Curso  $curso
   * @return \Illuminate\Http\Response
   */
  public function show(Curso $curso)
  {
    return response()->json(['curso' => $curso]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Curso  $curso
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Curso $curso)
  {
    $this->validator($request);

    $curso->name = $request->name;
    $curso->descricao = $request->descricao;
    $curso->save();

    return response()->json(['curso' => $curso]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Curso  $curso
   * @return \Illuminate\Http\Response
   */
  public function destroy(Curso $curso)
  {
    $curso->delete();

    return response()->json(['success' => true]);
  }
}
