<?php

namespace Drupal\hello_world\Controller;


use Drupal\Core\Controller\ControllerBase;

class HelloWorldController extends ControllerBase {
  public function hello(){
    $body = $this->config('hello_world.settings')->get('hello_world.body', $this->body);
    $build = array(
      '#title' =>  $this->config('hello_world.settings')->get('hello_world.page_title', 'Hello World!'),
      '#markup' => $body,
    );
    return $build;
  }
}