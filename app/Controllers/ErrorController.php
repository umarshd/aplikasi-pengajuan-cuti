<?php

namespace App\Controllers;

class ErrorController extends BaseController
{
  public function error403()
  {
    return view('403');
  }
}
