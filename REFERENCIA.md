# Comandos Úteis para o Projeto Exemplo Laravel

Neste arquivo pretendo listar alguns comandos úteis para trabalhar com este e outros projetos em Laravel.

## Criando um novo projeto com Laravel e Composer

`composer create-project laravel/laravel nome-do-projeto-laravel "5.8.*"`

## Instalando as dependencias para trabalhar com JavaScript e CSS

`npm install`

## Rodando o compilador (Laravel Mix) de JavaScript e CSS do Laravel

`npm run development -- --watch`

O comando acima irá iniciar um agente no Terminal / Shell / CMD que irá monitorar as alterações dentro da pasta `resources` afim de compilar os arquivos e jogar dentro da pasta `public` a cada alteração no projeto.

## Configuração de banco de dados

As configurações de banco de dados devem ser feitas no arquivo `.env` que fica na raiz do projeto

## Criando um novo Model e também o script para criação de tabelas no banco de dados

`php artisan make:model Aluno --migration`

O comando acima irá criar um novo arquivo .php em `app/Aluno.php` representantando a tabela do banco `alunos`. Dentro de `database/migrations` você poderá editar o script de "migração" para que o banco de dados possa receber a nova tabela `alunos`.

## Rodando as migrações pendentes

`php artisan migrate`

O comando acima irá rodar todas últimas migrações criadas e por consequencia atualizar o banco com as novas tabelas ou modificações de campos em tabelas já existentes

## Adicionando um campo novo a uma tabela já existente

`php artisan make:migration add_campo_table_alunos --table=alunos`

Depois do comando acima edite o novo arquivo criado dentro de `database/migrations` e altere a tabela com novos campos, mais ou menos assim:

```php
class AddCampoTableAlunos extends Migration
{
  public function up()
  {
    Schema::table('alunos', function (Blueprint $table)
    {
      $table->string('novo_campo')->nullable();
    });
  }

  public function down()
  {
    Schema::table('alunos', function (Blueprint $table)
    {
      $table->dropColumn('novo_campo');
    });
  }
}
```

Após editar o arquivo de migração contendo a alteração na tabela, não se esqueça de rodar novamente:

`php artisan migrate`

## Criando um controller para CRUD baseado em um model/tabela

`php artisan make:controller AlunosController --resource --model=Aluno`

O parâmetro `--resource` indica que o controller terá as ações padrão de `index`, `show`, `create`, `store`, `edit`, `update` e `destroy`.

## Iniciando com Autenticação (Login e Senha)

Para preparar o Laravel para trabalhar com áreas restritas a base de login e senha, pode-se rodar os dois comandos abaixo:

`php artisan make:auth` e `php artisan migrate`

Os comandos acima irão iniciar em um projeto baseado em Laravel algumas views, controllers e tabelas no banco de dados relacionadas ao login e senha do projeto.

Recomendo também conferir se o `app/Http/Controllers/Controller.php` está com a seguinte estrutura:

```php
<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AppController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
```

No caso acima a coisa mais importante é o uso do `AuthorizesRequests` neste controller base.

O Laravel também espera encontrar um model _User_ em `app/User.php` com a seguinte base:

```php
<?php
namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
```

## Tornar pasta public de uploads disponíveis para o mundo

Rodar o comando abaixo apenas uma única vez em cada ambiente:

`php artisan storage:link`
