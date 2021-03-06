<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use \Symfony\Component\Routing\Annotation\Route;

class HelloWorldController 
{
  
  /**
   * @Route("/hello")
   */
  public function helloWorldAction(Request $request): Response 
  {
    return new JsonResponse(
      [
        'message' => 'Hello World',
        'pathInfo' => $request->getPathInfo(),
        'query' => $request->query->all(),
      ]
    );
  }
}