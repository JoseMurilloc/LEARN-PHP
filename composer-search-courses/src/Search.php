<?php

namespace ComposerSearchCourses\SearchOfCourses;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Search 
{
  private $httpClient;
  private $crawler;

  public function __construct(ClientInterface $httpClient, Crawler $crawler)
  {
    $this->httpClient = $httpClient;
    $this->crawler = $crawler;
  }

  public function get(string $url) : array
  {
    $response = $this->httpClient->request(
      'GET', 
      $url
    );

    $html = $response->getBody();
    
    $this->crawler->addHtmlContent($html);

    $elementsCourses = $this->crawler->filter('card-curso__nome');
    $courses = [];

    

    foreach ($elementsCourses as $element) {
      $courses[] = $element->textContent;
    }
    return $courses;
  }
}