<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{

  public function hello()
  {

    return view('app');
  }

  public function hello2()
  {

    return view('app2');
  }
}
