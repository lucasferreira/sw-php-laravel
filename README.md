# Projeto Exemplo Laravel - SW-SATC

Projeto iniciado em sala de aula visando demonstrar alguns elementos básicos de como estrutura um "micro-projeto" com Laravel.

## Requisitos

Caso você não use Docker, o _setup_ de sua máquina irá exigir o seguinte:

- PHP no mínimo versão 7.1.3
- MySQL
- Apache ou NGINX devidamente configurados

Sendo que se você tem o XAMPP com versões mais recentes do PHP instalado, irá conseguir rodar sem problemas.

## Rodando com Docker

Este projeto acompanha arquivos de configuração de um conjunto de containers em Docker com o _setup_ necessário para que este projeto rode.

Sendo um passo _opcional_ vocês caso queiram rodar no ambiente PHP de sua máquina (Ex.: XAMPP) podem pular este passo.

Caso você queria tentar usar o Docker, primeiro será necessário instala-lo e configura-lo em sua máquina, siga os procedimentos deste site https://docs.docker.com/docker-for-windows/install/

Após instalado e devidamente configurado, acessando a pasta deste projeto laravel com seu Terminal/Shell/CMD, digite o seguinte comando (uma única vez):

```bash
docker-compose build
```

Depois do container customizado compilado/instalado, podemos rodar oficialmente o docker e levantarmos o "endereço" em que o projeto irá rodar:

```bash
docker-compose up
```

## Instalando Dependências

Para instalar as dependências do Laravel, executem o comando abaixo em seu Terminal/Shell/CMD:

```bash
composer install
```

O comando acima será necessário apenas uma vez, pois o _composer_ do PHP irá baixar todas as necessidades do Laravel e depositar automaticamente na pasta `vendor`.

Caso você queria trabalhar com JS e CSS (LESS/SASS) de forma "inteligente" nesse projeto, também será necessário rodar o comando abaixo:

```bash
npm install
```

O comando acima irá baixar todas as dependências de Node/Javascript necessárias para que o Laravel Mix funcione. Ao iniciar o seu desenvolvimento, recomendo deixar o Laravel Mix ligado e trabalhando, para tal rode o comando abaixo em uma janela do Termina/Shell/CMD iniciada na raiz do seu projeto laravel:

```bash
npm run watch
```

## Configurando o projeto

A única necessidade de configuração de projeto exemplo será revisar as informações de configuração do banco de dados. No arquivo `.env` presente na raiz, revise os seguintes blocos:

```
DB_CONNECTION=mysql
DB_HOST=sw-mysql
DB_PORT=3306
DB_DATABASE=satc
DB_USERNAME=root
DB_PASSWORD=123456
```

Caso você esteja usando o XAMPP, acesse o phpMyAdmin de sua máquina e crie uma base de dados chamada `satc`, depois no arquivo `.env` do laravel coloque o `DB_HOST` como `localhost` e revise o resto das configurações.

## Criando as tabelas

Este projeto acompanha uma série de scripts de migração (database/migrations) responsáveis por criar nossa estrutura inicial do banco de dados. Após criar a database `satc` vazia, para criarmos as tabelas, precisaremos acessar o Terminal/Shell/CMD e rodar o seguinte comando:

```bash
php artisan migrate
```

Se o comando acima for completado com sucesso poderemos conferir no phpMyAdmin se as tabelas `cursos` e `alunos` foram criadas com sucesso.

## Rodando o projeto

Se o seu projeto está rodando com base no Docker, o endereço de acesso do projeto será:

http://localhost:8000

Se o seu projeto está rodando no XAMPP (ou outro setup semelhante baseado em Apache) será algo mais ou menos assim:

http://localhost/sw-php-laravel/public
