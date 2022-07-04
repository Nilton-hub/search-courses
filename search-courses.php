#!/usr/bin/env php
<?php
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use cc\src\SearchCourses;

require __DIR__ . "/vendor/autoload.php";

$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
/*$response = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php');
$html = $response->getBody();*/
$crawler = new Crawler();
/*$crawler->addHtmlContent($html);
$courses = $crawler->filter('span.card-curso__nome');*/
$search = new SearchCourses($client, $crawler);
$courses = $search->search('/cursos-online-programacao/php');

foreach ($courses as $key => $course) {
    showCourses($course);
}
