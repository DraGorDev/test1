<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
  /*
  * Display a listing of the resource
  *
  * @return Response
  */
  public function phonebook() {
      return view('phoneBook/phoneUsers');
  }
}
