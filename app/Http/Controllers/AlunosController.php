<?php
namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AlunosController extends Controller
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
    $items = Aluno::get();
    return view('alunos.index', array('items' => $items));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $cursos = Curso::pluck('name', 'id');

    return view('alunos.create', array('cursos' => $cursos));
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

    if ($request->hasFile('avatar') && $request->file('avatar')->isValid())
    {
      $novoAluno->avatar = $request->avatar->store('alunos');
    }

    $novoAluno->save();

    return redirect()
      ->route('alunos.index')
      ->with('success', 'Aluno cadastrado com sucesso!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Aluno  $aluno
   * @return \Illuminate\Http\Response
   */
  public function show(Aluno $aluno)
  {
    return view('alunos.show', array('aluno' => $aluno));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Aluno  $aluno
   * @return \Illuminate\Http\Response
   */
  public function edit(Aluno $aluno)
  {
    $cursos = Curso::pluck('name', 'id');

    return view('alunos.edit', array('aluno' => $aluno, 'cursos' => $cursos));
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

    if ($request->hasFile('avatar') && $request->file('avatar')->isValid())
    {
      $aluno->avatar = $request->avatar->store('alunos');
    }

    $aluno->save();

    return redirect()
      ->route('alunos.index')
      ->with('success', 'Aluno alterado com sucesso!');
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

    return redirect()
      ->route('alunos.index')
      ->with('success', 'Aluno deletado com sucesso!');
  }

    /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Aluno  $aluno
   * @return \Illuminate\Http\Response
   */
  public function destroy_foto(Aluno $aluno)
  {
    if(!empty($aluno->avatar))
    {
      Storage::delete($aluno->avatar);

      $aluno->avatar = null;
      $aluno->save();
    }

    return redirect()->back();
  }
}
