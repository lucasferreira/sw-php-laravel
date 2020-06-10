<?php
namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursosController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

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
    $items = Curso::get();
    return view('cursos.index', array('items' => $items));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('cursos.create');
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

    return redirect()
      ->route('cursos.index')
      ->with('success', 'Curso cadastrado com sucesso!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Curso  $curso
   * @return \Illuminate\Http\Response
   */
  public function show(Curso $curso)
  {
    return view('cursos.show', ['curso' => $curso]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Curso  $curso
   * @return \Illuminate\Http\Response
   */
  public function edit(Curso $curso)
  {
    return view('cursos.edit', ['curso' => $curso]);
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

    return redirect()
      ->route('cursos.index')
      ->with('success', 'Curso alterado com sucesso!');
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

    return redirect()
      ->route('cursos.index')
      ->with('success', 'Curso deletado com sucesso!');
  }
}
