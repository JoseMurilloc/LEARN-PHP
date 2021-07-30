<?php
require 'vendor/autoload.php';

use ComposerSearchCourses\SearchOfCourses\Search;
use GuzzleHttp\Client;

use Symfony\Component\DomCrawler\Crawler;

$client = new Client();
$crawler = new Crawler();

$search = new Search($client, $crawler);

$courses = $search->get(
  'https://www.alura.com.br/cursos-online-programacao/php'
);

foreach ($courses as $couse) {
  echo $couse . PHP_EOL;
}
