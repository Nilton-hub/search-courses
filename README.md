O buscador de curoso de PHP da Alura
====================================

Este leve component permite listar todos os cursos de PHP da Alura

Instalação
----------

Instalação via composer
```
composer require niltonduarte/buscador-cursos-alura
```
ou adicione o trecho abaixo dentro do composer require
```
"niltonduarte/search-alura-courses": "v1.0"
```

Uso Básico
----------

Aqui está um exemplo de uso básico:

```php
<?php
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use cc\src\SearchCourses;

require __DIR__ . "/vendor/autoload.php";

$baseUrl = 'https://www.alura.com.br/'; // Define a url base do site da Alura como sendo uma url fixa.
$client = new Client(['base_uri' => $baseUrl]); // Instancia a classe Client e informa essa url.

$search = new SearchCourses($client, new Crawler());
$courses = $search->search('/cursos-online-programacao/php');

foreach ($courses as $key => $course) {
    showCourses($course);
}
```

Usando a Linha de Comando
-------------------------
execute o seguinte no seu terminal:
```ch
vendor\bin\search-courses
```
O resultado será a lista de todos os cursos da Alura.

repositório:
------------
https://github.com/Nilton-hub/buscador-cursos-alura.git
#