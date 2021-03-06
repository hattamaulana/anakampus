<?php namespace App\Kernel;

/*
| -----------------------------
| Route Loader
| Directory App/Kernel/Router
| -----------------------------
*/

use App\Kernel\Request\Interfaces\RequestInterface;

class Router 
{
  private $request;
  private $supportedHttpMethods = array(
    "GET",
    "POST"
  );

  function __construct(RequestInterface $request) 
  {
   $this->request = $request;
  }
  
  function __call($name, $args) 
  {
    list($route, $method) = $args;
    if(! in_array(strtoupper($name), $this->supportedHttpMethods)) 
      $this->invalidMethodHandler();

    $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
  }
  
  /**
   * Set Route Format
   * 
   * @return String
   */
  private function formatRoute($route) 
  {
    if (rtrim($route, '/') === '') {
      return '/';
    }

    return $route;
  }

  /**
   * Handle 405 Method Not Allowed Error
   */
  private function invalidMethodHandler() 
  {
    header("{$this->request->serverProtocol} 405 Method Not Allowed");
  }

  /**
   * Handle 404 Not Found Error.
   * Redirect To File >>> in Route /404
   */
  private function defaultRequestHandler() 
  {
    // header("Location: /404");
    header("{$this->request->serverProtocol} 404 Method Not Allowed");
  }
  
  function resolve() 
  {
    $methodDictionary = $this->{strtolower($this->request->requestMethod)};
    $formatedRoute = $this->formatRoute($this->request->requestUri);
    // $formatedRoute = preg_split("/\:/", $formatedRoute);
    // $formatedRoute = $formatedRoute[0];

    if(! array_key_exists($formatedRoute, $methodDictionary)) {
      $this->defaultRequestHandler();
      return;
    }

    $method    = $methodDictionary[$formatedRoute];
    $method    = preg_split("/\@/", $method);
    $method[0] = "\App\Controllers\\". $method[0];

    call_user_func_array($method, array($this->request));
  }

  function __destruct() 
  {
    $this->resolve();
  }
}